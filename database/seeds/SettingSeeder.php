<?php

use App\Model\Pages_Images;
use App\Model\About_us;
use App\User;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About_us::firstOrCreate(

            [
                'id'    => 1,
                'page_name'    => 'about_us',
                'description'   => 'Add content ..',
            ]

        );
        Pages_Images::firstOrCreate(

            [
                'page_name'    => 'homepage_slider',
                'section'   => 'admin',
                'width'   => '100',
                'height'   => '100',
                'aspect_ratio_width'   => '683',
                'aspect_ratio_height'   => '241',
            ]

        );
        Pages_Images::firstOrCreate(

            [
                'page_name'    => 'aboutus',
                'section'   => 'admin',
                'width'   => '1',
                'height'   => '1',
                'aspect_ratio_width'   => '2049',
                'aspect_ratio_height'   => '1404',
            ]

        );
    }
}
