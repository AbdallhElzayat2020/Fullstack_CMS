<?php

namespace Database\Seeders;

use App\Models\AdminFooterInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminFooterInfo::updateOrCreate([
            'language' => 'en',
        ], [
            'logo' => '/test.png',
            'description' => 'lorem ipsum',
            'copyright' => 'lorem',
        ]);
    }
}
