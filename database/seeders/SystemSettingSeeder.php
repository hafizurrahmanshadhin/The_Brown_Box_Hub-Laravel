<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder {
    public function run(): void {
        DB::table('system_settings')->insert([
            [
                'id'             => 1,
                'title'          => 'Admin_Dashboard_Dosix',
                'system_name'    => 'Admin_Dashboard_Dosix',
                'email'          => 'info@support.com',
                'phone_number'   => '01915696677',
                'calendly_link'  => 'https://calendly.com/latricesalvador/brown-box-package-hub-clone',
                'address'        => 'Mohammadpur, Dhaka, Bangladesh',
                'copyright_text' => '©Brown Box Hub',
                'description'    => '<p>The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.</p>',
                'logo'           => null,
                'favicon'        => null,
                'status'         => 'active',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
                'deleted_at'     => null,
            ],
        ]);
    }
}
