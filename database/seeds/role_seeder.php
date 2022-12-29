<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(
            [
                'admin'    => '1',
                'user'   => '2',
                'teacher'   => '3',
                'employee'   => '4',
            ]
        );
    }
}
