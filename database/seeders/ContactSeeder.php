<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder {
    public function run(): void {
        DB::table('contacts')->insert([
            [
                'firstName'    => 'Vaughan',
                'lastName'     => 'Norris',
                'phone_number' => '+1 (319) 231-9087',
                'Message'      => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
                'status'       => 'active',
                'created_at'   => now(),
                'updated_at'   => now(),
                'deleted_at'   => null,
            ],
            [
                'firstName'    => 'Malcolm',
                'lastName'     => 'Burgess',
                'phone_number' => '+1 (168) 459-6898',
                'Message'      => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
                'status'       => 'active',
                'created_at'   => now(),
                'updated_at'   => now(),
                'deleted_at'   => null,
            ],
            [
                'firstName'    => 'Zeph',
                'lastName'     => 'Moore',
                'phone_number' => '+1 (992) 767-3248',
                'Message'      => 'Lorem ipsum dolor sit amet consectetur. Semper tempor ut eleifend gravida.',
                'status'       => 'active',
                'created_at'   => now(),
                'updated_at'   => now(),
                'deleted_at'   => null,
            ],
        ]);
    }
}
