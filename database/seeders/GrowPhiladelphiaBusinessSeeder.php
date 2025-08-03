<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrowPhiladelphiaBusinessSeeder extends Seeder {
    public function run(): void {
        DB::table('grow_philadelphia_businesses')->insert([
            'id'              => 1,
            'title'           => 'Grow Your Philadelphia Business with Brown Box Hub',
            'description'     => '<p>Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.</p>',
            'image'           => null,
            'sub_description' => json_encode([
                'mail_notifications'                     => 'Receive instant alerts when new mail or packages arrive at your address.',
                'flexible_pickup_and_forwarding_options' => 'Pick up your items at your convenience or have them forwarded to your preferred location.',
                'personal_doorman_experience'            => 'Enjoy the convenience of a trusted partner managing your mail and packages.',
            ]),
            'status'          => 'active',
            'created_at'      => '2024-12-14 03:04:42',
            'updated_at'      => '2024-12-14 03:04:42',
            'deleted_at'      => null,
        ]);
    }
}
