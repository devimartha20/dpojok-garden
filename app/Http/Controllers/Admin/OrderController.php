<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('user.kasir.order.order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($OfflineorOnline = 0)
    {
        // Get current date and time
        $currentDateTime = new DateTime();
        // Format date and time components
        $year = $currentDateTime->format('Y');
        $month = $currentDateTime->format('m');
        $day = $currentDateTime->format('d');
        $time = $currentDateTime->format('His'); // Hours, minutes, seconds
        $hour = $currentDateTime->format('H');
        $minute = $currentDateTime->format('i');
        $second = $currentDateTime->format('s');
        // Get authenticated employee ID (assuming you have a function to retrieve this)
        $userId = auth()->user()->id;
        // Get the last order ID
        $lastOrderId = Order::latest()->first()->id;

        // Generate order number by concatenating components
        $orderNo = 'ORDER-'.$OfflineorOnline .$year . $month . $day . $hour. $minute. $second . $userId . ($lastOrderId + 1);
        return view('user.kasir.order.create', compact('orderNo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
