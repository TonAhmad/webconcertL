<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concerts = [
            [
                'artist_id' => 1,
                'concert_name' => 'Afgan Live in Concert',
                'date' => '2024-02-10',
                'time' => '19:00:00',
                'capacity' => 3000,
                'location' => 'Istora Senayan',
            ],
            [
                'artist_id' => 2,
                'concert_name' => 'Ariana Grande World Tour',
                'date' => '2024-03-15',
                'time' => '20:00:00',
                'capacity' => 5000,
                'location' => 'Gelora Bung Karno (GBK)',
            ],
            [
                'artist_id' => 3,
                'concert_name' => 'Bryson Tiller Night Show',
                'date' => '2024-04-20',
                'time' => '18:00:00',
                'capacity' => 2500,
                'location' => 'The Kasablanka Hall',
            ],
            [
                'artist_id' => 4,
                'concert_name' => 'Frank Sinatra Tribute Night',
                'date' => '2024-05-12',
                'time' => '19:30:00',
                'capacity' => 2000,
                'location' => 'Istora Senayan',
            ],
            [
                'artist_id' => 5,
                'concert_name' => 'Green Day Rock Fest',
                'date' => '2024-06-08',
                'time' => '20:00:00',
                'capacity' => 8000,
                'location' => 'Jakarta International Stadium (JIS)',
            ],
            [
                'artist_id' => 6,
                'concert_name' => 'Justin Bieber World Tour',
                'date' => '2024-07-21',
                'time' => '20:00:00',
                'capacity' => 10000,
                'location' => 'Gelora Bung Karno (GBK)',
            ],
            [
                'artist_id' => 7,
                'concert_name' => 'Kendrick Lamar Live',
                'date' => '2024-08-30',
                'time' => '21:00:00',
                'capacity' => 7000,
                'location' => 'Jakarta International Stadium (JIS)',
            ],
            [
                'artist_id' => 8,
                'concert_name' => 'LANY Nostalgia Night',
                'date' => '2024-09-15',
                'time' => '19:00:00',
                'capacity' => 4000,
                'location' => 'The Kasablanka Hall',
            ],
            [
                'artist_id' => 9,
                'concert_name' => 'The Neighbourhood Experience',
                'date' => '2024-10-10',
                'time' => '20:00:00',
                'capacity' => 3500,
                'location' => 'Istora Senayan',
            ],
            [
                'artist_id' => 10,
                'concert_name' => 'NIKI Live Show',
                'date' => '2024-11-18',
                'time' => '19:00:00',
                'capacity' => 3000,
                'location' => 'Gelora Bung Karno (GBK)',
            ],
            [
                'artist_id' => 11,
                'concert_name' => 'Nirvana Tribute Concert',
                'date' => '2024-12-12',
                'time' => '20:00:00',
                'capacity' => 6000,
                'location' => 'Jakarta International Stadium (JIS)',
            ],
            [
                'artist_id' => 12,
                'concert_name' => 'Rihanna Exclusive Night',
                'date' => '2025-01-05',
                'time' => '21:00:00',
                'capacity' => 9000,
                'location' => 'The O2 Arena',
            ],
            [
                'artist_id' => 13,
                'concert_name' => 'Summer Walker Serenity',
                'date' => '2025-02-14',
                'time' => '18:00:00',
                'capacity' => 5000,
                'location' => 'The Kasablanka Hall',
            ],
        ];

        DB::table('concert')->insert($concerts);
    }
}
