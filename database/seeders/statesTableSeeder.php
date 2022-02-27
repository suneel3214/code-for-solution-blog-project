<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class statesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(array(
            array(
            'name' => "Madhya Pradesh",
            'type'=> "State",
            ),
            array(
            'name' => "Uttar Pradesh",
            'type'=> "State",
            ),
            array(
            'name' => "Rajasthan",
            'type'=> "State",
            ),
            array(
            'name' => "Punjaab",
            'type'=> "State",
            ),
            array(
            'name' => "Maharastra",
            'type'=> "State",
            )
            ));
    }
}
