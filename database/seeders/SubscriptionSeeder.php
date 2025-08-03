<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder {
    public function run(): void {
        DB::table('subscriptions')->insert([
            [
                'id'          => 1,
                'name'        => 'Basic',
                'description' => '<p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.&nbsp;</p>',
                'price'       => 25.00,
                'deadline'    => 'monthly',
                'status'      => 'active',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'name'        => 'Standard',
                'description' => '<p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.&nbsp;</p>',
                'price'       => 40.00,
                'deadline'    => 'monthly',
                'status'      => 'active',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                'deleted_at'  => null,
            ],
            [
                'id'          => 3,
                'name'        => 'Premium',
                'description' => '<p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.&nbsp;</p>',
                'price'       => 55.00,
                'deadline'    => 'monthly',
                'status'      => 'active',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                'deleted_at'  => null,
            ],
        ]);
    }
}
