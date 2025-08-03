<?php

namespace Database\Seeders;

use Database\Seeders\ClientsFeedbackSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\DynamicPageSeeder;
use Database\Seeders\EstablishPhiladelphiaPresenceSeeder;
use Database\Seeders\FAQSeeder;
use Database\Seeders\GrowPhiladelphiaBusinessSeeder;
use Database\Seeders\SocialMediaSeeder;
use Database\Seeders\SubscriptionFeatureSeeder;
use Database\Seeders\SubscriptionSeeder;
use Database\Seeders\SystemSettingSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\WorkProcessSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            UserSeeder::class,
            SystemSettingSeeder::class,
            DynamicPageSeeder::class,
            SocialMediaSeeder::class,
            FAQSeeder::class,
            ContentSeeder::class,
            ClientsFeedbackSeeder::class,
            ContactSeeder::class,
            WorkProcessSeeder::class,
            GrowPhiladelphiaBusinessSeeder::class,
            EstablishPhiladelphiaPresenceSeeder::class,
            SubscriptionSeeder::class,
            SubscriptionFeatureSeeder::class,
        ]);
    }
}
