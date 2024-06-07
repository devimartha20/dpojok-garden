<?php

namespace Database\Seeders;

use App\Models\Info\CompanyInformation;
use App\Models\Info\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyInformation::create([
            'email' => 'dpodjokgarden@gmail.com',
            'phone' => '088',
            'address' => 'Subang, Indonesia',
            'name' => 'Dpodjok Garden',
            'latitude' => 000,
            'longitude' => 000,
            'about' => 'Cafe',
            'desc' => 'Cafe Terbaik',
        ]);

        $social_medias = [
             [
                'name' => 'Facebook',
                'username' => 'dpodjok_garden',
                'link' => 'www.facebook.com',
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'icon_type' => 'html',
                'shown' => true,
            ],
        ];

        foreach($social_medias as $idx => $sm){
            SocialMedia::create([
                'name' => $sm['name'],
                'username' => $sm['username'],
                'link' => $sm['link'],
                'icon' => $sm['icon'],
                'icon_type' => $sm['icon_type'],
                'shown' => $sm['shown'],
                'seq' => $idx+1,
            ]);
        }

    }
}
