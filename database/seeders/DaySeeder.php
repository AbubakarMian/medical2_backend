<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::firstOrCreate(

            [
                'day'    => 'monday',
            ]

        );
        Day::firstOrCreate(

            [
                'day'    => 'tuesday',
            ]

        );
        Day::firstOrCreate(

            [
                'day'    => 'wednesday',
            ]

        );
        Day::firstOrCreate(

            [
                'day'    => 'thursday',
            ]

        );
        Day::firstOrCreate(

            [
                'day'    => 'friday',
            ]
        );
        Day::firstOrCreate(

            [
                'day'    => 'saturday',
            ]
        );
        Day::firstOrCreate(

            [
                'day'    => 'sunday',
            ]

        );
    }
}
