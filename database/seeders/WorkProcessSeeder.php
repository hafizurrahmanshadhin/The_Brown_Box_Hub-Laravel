<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkProcessSeeder extends Seeder {
    public function run(): void {
        DB::table('work_processes')->insert([
            'id'              => 1,
            'title'           => 'The Brown Box Hub is your Personal doorman.',
            'description'     => '<p>The Brown Box Hub is your personal doorman, ensuring that your mail and packages are secure and ready for pickup whenever you are. Say goodbye to missed or stolen deliveries—experience peace of mind with a service designed to keep your items safe and accessible.</p>',
            'image'           => null,
            'sub_description' => json_encode([
                'order_online' => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
                'get_notified' => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
                'pick_up'      => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
            ]),
            'status'          => 'active',
            'created_at'      => '2024-12-14 00:45:02',
            'updated_at'      => '2024-12-14 00:45:02',
            'deleted_at'      => null,
        ]);
    }
}
