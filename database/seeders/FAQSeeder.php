<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder {
    public function run(): void {
        DB::table('f_a_q_s')->insert([
            [
                'id'         => 1,
                'question'   => 'What is the Brown Box Hub?',
                'answer'     => 'The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.',
                'status'     => 'active',
                'created_at' => '2024-09-13 03:52:56',
                'updated_at' => '2024-09-13 03:52:56',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'question'   => 'How does the Brown Box Hub work?',
                'answer'     => 'The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.',
                'status'     => 'active',
                'created_at' => '2024-09-13 03:52:56',
                'updated_at' => '2024-09-13 03:52:56',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'question'   => 'What types of packages can I send to the Brown Box Hub?',
                'answer'     => 'The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.',
                'status'     => 'active',
                'created_at' => '2024-09-13 03:52:56',
                'updated_at' => '2024-09-13 03:52:56',
                'deleted_at' => null,
            ],
            [
                'id'         => 4,
                'question'   => 'How do I sign up for the Brown Box Hub?',
                'answer'     => 'The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.',
                'status'     => 'active',
                'created_at' => '2024-09-13 03:52:56',
                'updated_at' => '2024-09-13 03:52:56',
                'deleted_at' => null,
            ],
            [
                'id'         => 5,
                'question'   => 'Are there any fees or membership plans?',
                'answer'     => 'The Brown Box Hub is a secure, convenient package delivery service that acts as your personal doorman. It ensures your mail and packages are safely stored until you’re ready to pick them up.',
                'status'     => 'active',
                'created_at' => '2024-09-13 03:52:56',
                'updated_at' => '2024-09-13 03:52:56',
                'deleted_at' => null,
            ],
        ]);

        //* Optionally reset AUTO_INCREMENT value
        DB::statement('ALTER TABLE f_a_q_s AUTO_INCREMENT = 4;');
    }
}
