<?php

namespace Database\Seeders;

use App\Models\Worktime;
use DateTime;
use Illuminate\Database\Seeder;

class WorktimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 7; $i++){
            Worktime::create([
                'day' => $i,
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
                'rest_start_time' => null,
                'rest_end_time' => null,
                'rest_duration_min' => 0,
                'working_duration_min' => $this->calculateWorkingDuration('10:00:00', '22:00:00', 0),
                'total_duration_min' => $this->calculateTotalDuration('10:00:00', '22:00:00'),
            ]);
        }

    }

    /**
     * Calculate the working duration in minutes excluding rest duration.
     *
     * @param string $start_time
     * @param string $end_time
     * @param int $rest_duration_min
     * @return int
     */
    private function calculateWorkingDuration(string $start_time, string $end_time, int $rest_duration_min): int
    {
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $interval = $start->diff($end);
        $working_minutes = ($interval->h * 60) + $interval->i - $rest_duration_min;
        return $working_minutes;
    }

    /**
     * Calculate the total duration in minutes.
     *
     * @param string $start_time
     * @param string $end_time
     * @return int
     */
    private function calculateTotalDuration(string $start_time, string $end_time): int
    {
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $interval = $start->diff($end);
        $total_minutes = ($interval->h * 60) + $interval->i;
        return $total_minutes;
    }
}
