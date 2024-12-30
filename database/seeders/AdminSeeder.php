<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'admin_id' => 'ADM001',
                'username' => 'rudy89',
                'password' => Hash::make('123456789'),
            ],
            [
                'admin_id' => 'ADM002',
                'username' => 'montis223',
                'password' => Hash::make('montis123'),
            ],
            [
                'admin_id' => 'ADM003',
                'username' => 'lutpi010',
                'password' => Hash::make('lutpicihuy'),
            ],
            [
                'admin_id' => 'ADM004',
                'username' => 'SYSTEM',
                'password' => Hash::make('SYSTEM'),
            ],
        ];

        DB::table('admin')->insert($admin);
    }
}
