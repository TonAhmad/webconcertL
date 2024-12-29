<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            ['artist_name' => 'Afgan', 'genre' => 'Pop', 'country' => 'Indonesia', 'description' => 'Penyanyi solo pria Indonesia dengan suara khas dan lagu-lagu populer.', 'photo_name' => 'Afgan.jpg'],
            ['artist_name' => 'Ariana Grande', 'genre' => 'Pop', 'country' => 'United States', 'description' => 'Penyanyi pop internasional dengan suara tinggi dan lagu-lagu hits global.', 'photo_name' => 'Ariana.jpg'],
            ['artist_name' => 'Bryson', 'genre' => 'R&B', 'country' => 'United States', 'description' => 'Penyanyi R&B modern dengan gaya yang unik dan lirik yang emosional.', 'photo_name' => 'Bryson.jpg'],
            ['artist_name' => 'Frank Sinatra', 'genre' => 'Jazz', 'country' => 'United States', 'description' => 'Ikon musik jazz dan swing yang legendaris dengan suara klasik.', 'photo_name' => 'Frank.jpg'],
            ['artist_name' => 'Green Day', 'genre' => 'Punk Rock', 'country' => 'United States', 'description' => 'Band punk rock terkenal dengan lagu-lagu berenergi tinggi dan lirik pemberontakan.', 'photo_name' => 'GreenDay.jpg'],
            ['artist_name' => 'Justin Bieber', 'genre' => 'Pop', 'country' => 'Canada', 'description' => 'Penyanyi pop asal Kanada yang mendunia sejak remaja.', 'photo_name' => 'Justin.jpg'],
            ['artist_name' => 'Kendrick Lamar', 'genre' => 'Hip Hop', 'country' => 'United States', 'description' => 'Rapper dan penulis lagu pemenang penghargaan dengan lirik yang kuat.', 'photo_name' => 'Kendrick.jpg'],
            ['artist_name' => 'LANY', 'genre' => 'Indie Pop', 'country' => 'United States', 'description' => 'Band indie pop dengan melodi yang emosional dan lirik yang mendalam.', 'photo_name' => 'Lany.jpg'],
            ['artist_name' => 'The Neighbourhood', 'genre' => 'Alternative Rock', 'country' => 'United States', 'description' => 'Band rock alternatif dengan gaya unik dan musik atmosferik.', 'photo_name' => 'Neighbour.jpg'],
            ['artist_name' => 'NIKI', 'genre' => 'R&B/Pop', 'country' => 'Indonesia', 'description' => 'Penyanyi dan penulis lagu asal Indonesia dengan suara lembut dan lirik berkelas.', 'photo_name' => 'Niki..png'],
            ['artist_name' => 'Nirvana', 'genre' => 'Grunge', 'country' => 'United States', 'description' => 'Band legendaris yang merevolusi musik grunge dan alternatif.', 'photo_name' => 'Nirvana.jpg'],
            ['artist_name' => 'Rihanna', 'genre' => 'Pop/R&B', 'country' => 'Barbados', 'description' => 'Ikon musik pop dan R&B yang mendominasi tangga lagu global.', 'photo_name' => 'Rihanna.jpg'],
            ['artist_name' => 'Summer Walker', 'genre' => 'Pop', 'country' => 'United States', 'description' => 'Artis dengan nama yang menggambarkan suasana cerah dan musim panas.', 'photo_name' => 'Summer.jpg'],
        ];

        foreach ($artists as $artist) {
            DB::table('artist')->insert([
                'artist_name' => $artist['artist_name'],
                'genre' => $artist['genre'],
                'country' => $artist['country'],
                'description' => $artist['description'],
                'photo_name' => $artist['photo_name'],
            ]);
        }
    }
}
