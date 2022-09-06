<?php

namespace Database\Seeders;

use App\Models\status\PmStatus;
use Illuminate\Database\Seeder;

class PMStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrs = [
            'Welcome call',
            'Site Survey',
            'Design',
            'Permitting',
            'Meter Spot Requested',
            'Ready for Roofing',
            'Ready for Inspection',
            'Design Corrections',
            'Permit Re-submittal',
            'Corrections needed',
            'Ready for Re-inspection',
            'Collections',
            'PTO Finalization',
            'Monitoring Set-up',
            'Done',
            'Service-call'
        ];

        foreach ($arrs as $arr) {
            PmStatus::create(['title' => $arr]);
        }
    }
}
