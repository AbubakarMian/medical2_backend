<?php


use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\DaySeeder;
use Database\Seeders\UrlSeeder;
use Database\Seeders\Admin_url_Seeder;
use Database\Seeders\About_us_Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(UrlSeeder::class);
        $this->call(Admin_url_Seeder::class);
        $this->call(About_us_Seeder::class);

    }
}
