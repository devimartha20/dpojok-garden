<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateReservationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-reservation-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update reservation statuses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();

        // Update reservations to 'aktif' where the time is exactly now
        Reservation::where('status', 'menunggu')
            ->whereDate('date', $now->toDateString())
            ->whereTime('start_time', '<=', $now->toTimeString())
            ->whereTime('end_time', '>', $now->toTimeString())
            ->update(['status' => 'aktif']);

        // Update reservations to 'selesai' where the time is in the past
        Reservation::where('status', 'menunggu')
            ->where(function ($query) use ($now) {
                $query->whereDate('date', '<', $now->toDateString())
                    ->orWhere(function ($query) use ($now) {
                        $query->whereDate('date', $now->toDateString())
                            ->whereTime('end_time', '<=', $now->toTimeString());
                    });
            })
            ->update(['status' => 'selesai']);

        // Log the message to the file
        Log::info('Reservation statuses updated successfully.');

        // Output the message to the console
        $this->info('Reservation statuses updated successfully.');
    }
}
