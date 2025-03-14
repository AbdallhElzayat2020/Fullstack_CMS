<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::updateOrCreate(
            ['id' => 1],
            [
                'home_top_bar_ad' => 'test.jpg',
                'home_top_bar_ad_status' => 1,
                'home_top_bar_ad_url' => 'https://www.example.com',

                'home_middle_ad' => 'test.jpg',
                'home_middle_ad_status' => 1,
                'home_middle_ad_url' => 'https://www.example.com',

                'view_page_ad' => 'test.jpg',
                'view_page_status' => 1,
                'view_page_ad_url' => 'https://www.example.com',

                'news_page_ad' => 'test.jpg',
                'news_page_ad_status' => 1,
                'news_page_ad_url' => 'https://www.example.com',

                'side_bar_ad' => 'test.jpg',
                'side_bar_ad_status' => 1,
                'side_bar_ad_url' => 'https://www.example.com',

            ]
        );
    }
}
