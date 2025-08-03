<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablishPhiladelphiaPresenceSeeder extends Seeder {
    public function run(): void {
        DB::table('establish_philadelphia_presences')->insert([
            'id'              => 1,
            'title'           => 'Establish Your Philadelphia Presence with Brown Box Hub',
            'description'     => '<p>Start your new business in Philadelphia with a virtual mailbox from Fishbox.</p>',
            'thumbnail_image' => null,
            'video'           => null,
            'sub_description' => json_encode([
                'secure_mail_&_package_handling' => 'Never worry about lost or stolen packages with our safe storage solutions.',
                'privacy_protection'             => 'Keep your home address private and use ours for all business correspondence.',
                'convenient_mail_management'     => 'Get notifications for new mail, with options for pickup or forwarding.',
            ]),
            'status'          => 'active',
            'created_at'      => '2024-12-14 04:58:34',
            'updated_at'      => '2024-12-14 04:58:34',
            'deleted_at'      => null,
        ]);
    }
}
