<?php

namespace App\Livewire;

use App\Models\Admin\Customer;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\Admin\Table;
use App\Models\Reservation;
use App\Models\ReservationSetting;
use App\Models\ReservationTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateReservation extends Component
{
    public $date, $start_time, $end_time, $guests, $reservation_price = 0, $order_price = 0, $total_price = 0, $deviation = 0;
    public $search, $available = false;

    public $orderNo, $pemesan, $catatan, $packing, $reservationNo, $combinations, $bestCombinations, $selected_table;
    public $products = [], $productOrders = [], $total_all = 0;

    public function mount()
    {
        $this->orderNo = $this->generateOrderNo();
        $this->reservationNo = $this->generateReservationNo();
        $this->packing = 'dine_in';
        $this->loadProducts();
    }

    public function checkOverlap($date, $startTime, $endTime)
    {
        $overlappingReservations = DB::table('reservations')
            ->where('date', $date)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                      ->orWhereBetween('end_time', [$startTime, $endTime])
                      ->orWhere(function ($query) use ($startTime, $endTime) {
                          $query->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                      });
            })
            ->get();

        return $overlappingReservations;
    }

    public function getOverlappingTableIds($date, $startTime, $endTime)
    {
        $overlappingReservations = $this->checkOverlap($date, $startTime, $endTime);

        if ($overlappingReservations->isEmpty()) {
            return [];
        }

        $reservationIds = $overlappingReservations->pluck('id');

        $tableIds = DB::table('reservation_tables')
            ->whereIn('reservation_id', $reservationIds)
            ->pluck('table_id')
            ->filter()
            ->unique();

        return $tableIds;
    }

    public function getAvailableTableIds($date = null, $startTime = null, $endTime = null)
    {
        $date = $date ?? $this->date;
        $startTime = $startTime ?? $this->start_time;
        $endTime = $endTime ?? $this->end_time;

        $overlappingTableIds = $this->getOverlappingTableIds($date, $startTime, $endTime);

        // dd($overlappingTableIds);

        $availableTableIds = DB::table('tables')
            ->whereNotIn('id', $overlappingTableIds)
            ->pluck('id');

        return $availableTableIds;
    }

    public function checkAvailability()
    {
        $this->validate([
            'date' => 'required|date|after_or_equal:tomorrow',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'guests' => 'required|integer|min:1',
        ]);

        $availableTables = $this->getAvailableTableIds();

        // dd($availableTables);

        if ($availableTables->isEmpty()) {
            $this->available = false;
            return;
        }

        $seats = [];
        $notAllowedTables = [];

        foreach ($availableTables as $tableId) {
            $availableTable = Table::find($tableId);
            $seats[] = ['table_id' => $availableTable->id, 'number' => $availableTable->jumlah_kursi];
            if (!$availableTable->join_allowed) {
                $notAllowedTables[] = $availableTable->id;
            }
        }

        $combinations = $this->findCombinations($seats, $this->guests, $this->deviation, $notAllowedTables);
        $bestCombination = $this->findBestCombination($combinations);

        $this->available = !empty($combinations) && !empty($bestCombination);
        $this->combinations = $combinations;
        $this->bestCombinations = $bestCombination;

        // dd($availableTables ,$this->combinations, $this->bestCombination);
    }


    function findCombinations($seats, $target, $deviation, $notAllowedTables) {
        // Sort seats by table ID to ensure consistent output
        usort($seats, function($a, $b) {
            return strcmp($a['table_id'], $b['table_id']);
        });

        // Initialize an array to store combinations
        $combinations = [];

        // Helper function to recursively find combinations
        $findCombination = function($index, $currentSeats, $currentSum) use (&$findCombination, &$combinations, $seats, $target, $deviation, $notAllowedTables) {
            // If the current sum is within the target +/- deviation and the combination total amount is more than the target, add the combination
            if ($currentSum >= $target && $currentSum >= $target - $deviation && $currentSum <= $target + $deviation) {
                $combinations[] = $currentSeats;
            }

            // Return if index exceeds array bounds or if the sum exceeds the target + deviation
            if ($index >= count($seats) || $currentSum > $target + $deviation) {
                return;
            }

            // Try including the current seat if it doesn't make the sum exceed the target + deviation
            if (!in_array($seats[$index]['table_id'], $notAllowedTables) && ($currentSum + $seats[$index]['number'] <= $target + $deviation)) {
                $newSeats = $currentSeats;
                $newSeats[] = $seats[$index];
                $findCombination($index + 1, $newSeats, $currentSum + $seats[$index]['number']);
            }

            // Try excluding the current seat
            $findCombination($index + 1, $currentSeats, $currentSum);
        };

        // Start the recursion
        $findCombination(0, [], 0);

        // Return unique combinations
        return array_map('unserialize', array_unique(array_map('serialize', $combinations)));
    }

    function findBestCombination($combinations) {
        // Sort combinations by the number of seats and deviation in ascending order
        usort($combinations, function($a, $b) {
            // Compare the number of seats
            $seatsComparison = count($a) <=> count($b);
            if ($seatsComparison !== 0) {
                return $seatsComparison;
            }

            // If the number of seats is the same, compare deviations
            $deviationA = array_sum(array_column($a, 'number'));
            $deviationB = array_sum(array_column($b, 'number'));

            return $deviationA <=> $deviationB;
        });

        // Return the combination with the least number of seats and least deviation
        return !empty($combinations) ? $combinations[0] : [];
    }

    public function calculateReservationPrice()
    {
        // Fetch reservation settings
        $reservationSettings = DB::table('reservation_settings')->first();

        if (!$reservationSettings) {
            // If settings are not found, return 0 or handle it as needed
            return 0;
        }

        // Calculate reservation duration in minutes
        $duration = $this->calculateDurationInMinutes($this->start_time, $this->end_time);

        // Calculate total price based on reservation duration and price per period
        $totalPrice = $this->calculateReservationTotalPrice($duration, $reservationSettings, $this->guests);

        $this->reservation_price = $totalPrice;

        return $totalPrice;
    }

    function calculateDurationInMinutes($startTime, $endTime)
    {
        // Convert start and end time to Carbon objects
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);

        // Calculate duration in minutes
        $duration = $end->diffInMinutes($start);

        return $duration;
    }

    function calculateReservationTotalPrice($duration, $reservationSettings, $guests)
    {
        // Harga per periode dan pengaturan lainnya
        $pricePerPeriod = $reservationSettings->price;
        $period = $reservationSettings->period;
        // $seatDeviation = $reservationSettings->seat_deviation;
        $periodUnit = $reservationSettings->period_unit;

        // Konversi periode reservasi ke menit berdasarkan unit periode
        switch ($periodUnit) {
            case 'minutes':
                $reservationPeriodInMinutes = $period;
                break;
            case 'hours':
                $reservationPeriodInMinutes = $period * 60;
                break;
            case 'days':
                $reservationPeriodInMinutes = $period * 24 * 60;
                break;
            default:
                $reservationPeriodInMinutes = $period;
                break;
        }

        // Hitung harga berdasarkan durasi dan harga per periode
        $periodsCount = ceil($duration / $reservationPeriodInMinutes);
        $basePrice = $periodsCount * $pricePerPeriod;

        // Hitung harga total berdasarkan jumlah tamu dan deviasi kursi
        $totalPrice = $basePrice * $guests;

        return $totalPrice;
    }

    //ORDER

    public function generateOrderNo()
    {
        $currentDateTime = new \DateTime();
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        $userId = auth()->user()->id;
        $lastOrder = Order::latest()->first();
        $lastOrderId = $lastOrder ? $lastOrder->id : 0;

        return 'ORDER-1' . $year . $month . $day . $hour . $minute . $second . $userId . ($lastOrderId + 1);
    }

    public function generateReservationNo()
    {
        $currentDateTime = new \DateTime();
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        $userId = auth()->user()->id;
        $lastReservation = Reservation::latest()->first();
        $lastReservationId = $lastReservation ? $lastReservation->id : 0;

        return 'RESERVATION-1' . $year . $month . $day . $hour . $minute . $second . $userId . ($lastReservationId + 1);
    }

    public function loadProducts()
    {
        if (!empty($this->search)) {
            $this->products = Product::where('nama', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->products = Product::all();
        }
    }

    public function addToOrder(Product $product)
    {
        if ($product->stok > 0) {
            // Existing code for adding product to order...
            $existingProductIndex = null;
            foreach ($this->productOrders as $index => $productOrder) {
                if ($productOrder['product'] === $product->id) {
                    $existingProductIndex = $index;
                    break;
                }
            }

            if ($existingProductIndex !== null) {
                $newQuantity = $this->productOrders[$existingProductIndex]['jumlah'] + 1;
                if ($newQuantity > $product->stok) {
                    session()->flash('error', 'Jumlah pesanan melebihi stok yang tersedia.');
                    return;
                }
                $this->productOrders[$existingProductIndex]['jumlah'] += 1;
                $this->productOrders[$existingProductIndex]['total_harga'] = $this->productOrders[$existingProductIndex]['jumlah'] * $this->productOrders[$existingProductIndex]['harga_jual'];
            } else {
                $this->productOrders[] = [
                    'product' => $product->id,
                    'jumlah' => 1,
                    'stok' => $product->stok,
                    'nama' => $product->nama,
                    'harga_jual' => $product->harga_jual,
                    'total_harga' => $product->harga_jual,
                    'catatan' => '',
                ];
            }

            $this->calculateOrderPrice();
        }
    }

    public function save()
    {
        $this->validate([
            'orderNo' => 'required',
            'productOrders' => 'required|array|min:1',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'productOrders.*.product' => 'required',
            'productOrders.*.jumlah' => 'required|numeric|min:1',
            'selected_table' => 'required',
        ], [
            'orderNo.required' => 'Nomor pesanan harus diisi.',
            'date.after_or_equal' => 'Tanggal harus di masa depan atau hari ini.',
            'start_time.after_or_equal' => 'Waktu mulai harus di masa depan.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'productOrders.required' => 'Harus ada minimal satu produk yang dipesan.',
            'productOrders.*.product.required' => 'Produk harus dipilih untuk setiap pesanan.',
            'productOrders.*.jumlah.required' => 'Jumlah harus diisi untuk setiap pesanan.',
            'productOrders.*.jumlah.numeric' => 'Jumlah harus berupa angka untuk setiap pesanan.',
            'productOrders.*.jumlah.min' => 'Jumlah minimal adalah 1 untuk setiap pesanan.',
        ]);

        $reservation = Reservation::create([
            'no_reservasi' => $this->reservationNo,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'guests'=> $this->guests,
            'status' => 'menunggu_pembayaran',
            'note' => $this->catatan,
            'price' => $this->calculateReservationPrice(),
        ]);

        foreach($this->combinations[$this->selected_table] as $table){
            ReservationTable::create([
                'reservation_id' => $reservation->id,
                'table_id' => $table['table_id'],
                'seats' => $this->guests,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
            ]);
        }

        $customer = Customer::where('user_id', Auth::user()->id)->first();

        $total_price = $this->calculateTotalPrice();

        $payment = Payment::create([
            'no_payment' => time() . '-' . $this->orderNo,
            'status' => 'belum_lunas',
            'total_bayar' => $total_price,
        ]);

        $order = Order::create([
            'no_pesanan' => $this->orderNo,
            'pemesan' => $customer->nama,
            'customer_id' => $customer->id,
            'total_harga' => $total_price,
            'jumlah_pesanan' => collect($this->productOrders)->sum('jumlah'),
            'progress' => 'menunggu_pembayaran',
            'status' => 'belum_lunas',
            'tipe' => 'in_store',
            'payment_id' => $payment->id,
            'packing' => $this->packing,
            'reservation_id' => $reservation->id,
        ]);

        foreach ($this->productOrders as $productOrder) {
            DetailOrder::create([
                'order_id' => $order->id,
                'product_id' => $productOrder['product'],
                'jumlah' => $productOrder['jumlah'],
                'total_harga' => $productOrder['total_harga'],
                'harga' => $productOrder['harga_jual'],
                'catatan' => $productOrder['catatan'],
            ]);
        }

        session()->flash('success', 'Reservasi berhasil disimpan, silahkan lakukan pembayaran!');
        return redirect(route('customer.reservation.pay', $reservation->id));
    }

    public function removeProduct($index)
    {
        array_splice($this->productOrders, $index, 1);
        $this->calculateOrderPrice();
    }

    public function calculateOrderPrice()
    {
        foreach ($this->productOrders as $index => $productOrder) {
            $this->productOrders[$index]['total_harga'] = $productOrder['harga_jual'] * $productOrder['jumlah'];
        }
        $this->order_price = array_sum(array_column($this->productOrders, 'total_harga'));
        return $this->order_price;
    }

    public function calculateTotalPrice(){
        $this->total_price = $this->calculateOrderPrice() +  $this->calculateReservationPrice();
        return $this->total_price;

    }

    public function updatedSearch()
    {
        $this->loadProducts();
    }

    public function updatedProductOrders($field)
    {
        if (strpos($field, 'productOrders.') === 0 && strpos($field, '.jumlah') !== false) {
            $index = explode('.', $field)[1];
            if (!is_numeric($this->productOrders[$index]['jumlah']) || $this->productOrders[$index]['jumlah'] <= 0) {
                session()->flash('error', 'Jumlah harus berupa angka positif.');
                return;
            }
            $this->productOrders[$index]['total_harga'] = $this->productOrders[$index]['harga_jual'] * $this->productOrders[$index]['jumlah'];
            $this->calculateOrderPrice();
        }
    }

    public function render()
    {
        return view('livewire.create-reservation', [
            'products' => $this->products,
            'total_price' => $this->total_price,
        ]);
    }
}
