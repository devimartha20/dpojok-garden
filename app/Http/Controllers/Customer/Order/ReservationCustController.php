<?php

namespace App\Http\Controllers\Customer\Order;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;

class ReservationCustController extends Controller
{
    public function index(){
        $cust = Customer::where('user_id', Auth::user()->id)->first();
        $reservations = Reservation::where('customer_id', $cust->id)->orderBy('updated_at', 'desc');
        return view('user.pelanggan.reservation.index', compact('reservations'));
    }

    public function create(){
        return view('user.pelanggan.reservation.create');
    }

    public function show($id){
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();
        return view('user.pelanggan.reservation.detail', compact('reservation', 'order'));
    }

    public function payment($id){
        $reservation = Reservation::findOrFail($id);
        $order = Order::where('reservation_id', $reservation->id)->first();

        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }
        return view('user.pelanggan.reservation.pay', compact('reservation', 'order'));
    }

    public function checkAvailability(){

    }

    function findCombinations($seats, $target, $deviation, $notAllowedTables) {
        // Sort seats by table ID to ensure consistent output
        usort($seats, function($a, $b) {
            return strcmp($a['table_id'], $b['table_id']);
        });
    
        // Initialize an array to store combinations
        $combinations = [];
    
        // Helper function to recursively find combinations
        $findCombination = function($index, $currentSeats, $currentSum, $notAllowedTables) use (&$findCombination, &$combinations, $seats, $target, $deviation) {
            // If the current sum is within the target +/- deviation and the combination total amount is more than the target, add the combination
            if ($currentSum >= $target && $currentSum >= $target - $deviation && $currentSum <= $target + $deviation) {
                $combinations[] = $currentSeats;
            }
    
            // Return if index exceeds array bounds or if the sum exceeds the target + deviation
            if ($index >= count($seats) || $currentSum > $target + $deviation) {
                return;
            }
    
            // If the current seat's table is in the notAllowedTables, try including it alone
            if (in_array($seats[$index]['table_id'], $notAllowedTables)) {
                $newSeats = [$seats[$index]]; // Start a new combination with this seat
                $findCombination($index + 1, $newSeats, $seats[$index]['number'], $notAllowedTables);
            } else {
                // Try including the current seat if it doesn't make the sum exceed the target + deviation
                if ($currentSum + $seats[$index]['number'] <= $target + $deviation) {
                    $newSeats = $currentSeats;
                    $newSeats[] = $seats[$index];
                    $findCombination($index + 1, $newSeats, $currentSum + $seats[$index]['number'], $notAllowedTables);
                }
            }
    
            // Try excluding the current seat
            $findCombination($index + 1, $currentSeats, $currentSum, $notAllowedTables);
        };
    
        // Start the recursion
        $findCombination(0, [], 0, $notAllowedTables);
    
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
}
