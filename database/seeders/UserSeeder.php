<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        DB::table('users')->insert([
            [
                'id'                   => 1,
                'firstName'            => 'admin',
                'lastName'             => 'admin',
                'email'                => 'admin@admin.com',
                'email_verified_at'    => Carbon::now(),
                'phone_number'         => '0123456789',
                'password'             => Hash::make('12345678'),
                'terms_and_conditions' => true,
                'avatar'               => null,
                'address'              => null,
                'google_id'            => null,
                'facebook_id'          => null,
                'apple_id'             => null,
                'otp_verified_at'      => null,
                'role'                 => 'admin',
                'status'               => 'active',
                'remember_token'       => null,
                'created_at'           => '2024-12-05 05:11:22',
                'updated_at'           => '2024-12-05 10:11:22',
                'deleted_at'           => null,
            ],
            [
                'id'                   => 2,
                'firstName'            => 'user',
                'lastName'             => 'user',
                'email'                => 'user@user.com',
                'email_verified_at'    => Carbon::now(),
                'phone_number'         => '1234567890',
                'password'             => Hash::make('12345678'),
                'terms_and_conditions' => true,
                'avatar'               => null,
                'address'              => null,
                'google_id'            => null,
                'facebook_id'          => null,
                'apple_id'             => null,
                'otp_verified_at'      => null,
                'role'                 => 'user',
                'status'               => 'active',
                'remember_token'       => null,
                'created_at'           => '2024-12-05 06:11:22',
                'updated_at'           => '2024-12-05 11:11:22',
                'deleted_at'           => null,
            ],
            [
                'id'                   => 3,
                'firstName'            => 'Hafizur Rahman',
                'lastName'             => 'Shadhin',
                'email'                => 'shadhin666@gmail.com',
                'email_verified_at'    => Carbon::now(),
                'phone_number'         => '01719922812',
                'password'             => Hash::make('12345678'),
                'terms_and_conditions' => true,
                'avatar'               => null,
                'address'              => null,
                'google_id'            => null,
                'facebook_id'          => null,
                'apple_id'             => null,
                'otp_verified_at'      => null,
                'role'                 => 'admin',
                'status'               => 'active',
                'remember_token'       => null,
                'created_at'           => '2024-12-05 06:11:22',
                'updated_at'           => '2024-12-05 11:11:22',
                'deleted_at'           => null,
            ],
        ]);
    }
}
