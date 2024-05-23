<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        // Update reservations to 'aktif' where the time is exactly now
        Reservation::where('status', 'menunggu')
            ->where('date', $now->toDateString())
            ->where('start_time', '<=', $now->toTimeString())
            ->where('end_time', '>', $now->toTimeString())
            ->update(['status' => 'aktif']);

        // Update reservations to 'selesai' where the time is in the past
        Reservation::where('status', 'menunggu')->where('status', 'aktif')
            ->where(function($query) use ($now) {
                $query->where('date', '<', $now->toDateString())
                      ->orWhere(function($query) use ($now) {
                          $query->where('date', $now->toDateString())
                                ->where('end_time', '<=', $now->toTimeString());
                      });
            })
            ->update(['status' => 'selesai']);

        $this->info('Reservation statuses updated successfully.');
    }
}
