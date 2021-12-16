<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NotebooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('notebooks')->insert([

            [
                'fio' => 'Daler',
                'email' => 'test@test.com',
                'phone_number' => '9256444480',
                'birthdate' => '1992-03-10',
            ],
            [
                'fio' => 'Andrey',
                'email' => 'andrey@test.com',
                'phone_number' => '9256555555',
                'birthdate' => '1996-05-14',
            ],
            [
                'fio' => 'Sergey',
                'email' => 'sergey@test.com',
                'phone_number' => '9256004000',
                'birthdate' => '1990-07-05',
            ]

        ]);

    }
}
