<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionFeatureSeeder extends Seeder {
    public function run(): void {
        DB::table('subscription_features')->insert([
            [
                'id'              => 1,
                'subscription_id' => 1,
                'feature_name'    => 'Unlimited Pickup',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 2,
                'subscription_id' => 1,
                'feature_name'    => 'Automatic Notification',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 3,
                'subscription_id' => 1,
                'feature_name'    => 'Dedicated support',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 4,
                'subscription_id' => 1,
                'feature_name'    => 'Cancel Anytime',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 5,
                'subscription_id' => 2,
                'feature_name'    => 'Unlimited Pickup',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 6,
                'subscription_id' => 2,
                'feature_name'    => 'Automatic Notification',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 7,
                'subscription_id' => 2,
                'feature_name'    => 'Dedicated support',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 8,
                'subscription_id' => 2,
                'feature_name'    => 'Cancel Anytime',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 9,
                'subscription_id' => 3,
                'feature_name'    => 'Unlimited Pickup',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 10,
                'subscription_id' => 3,
                'feature_name'    => 'Automatic Notification',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 11,
                'subscription_id' => 3,
                'feature_name'    => 'Dedicated support',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
            [
                'id'              => 12,
                'subscription_id' => 3,
                'feature_name'    => 'Cancel Anytime',
                'status'          => 'active',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
                'deleted_at'      => null,
            ],
        ]);
    }
}
