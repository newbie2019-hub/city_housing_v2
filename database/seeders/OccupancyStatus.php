<?php

namespace Database\Seeders;

use App\Models\OccupancyStatus as ModelsOccupancyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupancyStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Visiting',
            'Abbandoned',
            'Occupied by Awardee',
            'Occupied by a Memember',
            'Occupied by a Other',
            'For further verification of occ status/monitoring',
        ];

        foreach ($statuses as $status) {
            ModelsOccupancyStatus::create(['status' => $status]);
        }
    }
}
