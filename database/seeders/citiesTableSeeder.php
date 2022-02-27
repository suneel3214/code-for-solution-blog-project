<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class citiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(array(
            array(
            'name' => "Bhopal",
            'type' => 'City',
            'state_id' => "1",

            ),
            array(
                'name' => "Indore",
                'type' => 'City',
                'state_id' => "1",
            ),
            array(
                'name' => "Guna",
                'type' => 'City',
                'state_id' => "1",
            ),
            array(
                'name' => "Noida",
                'type' => 'City',
                'state_id' => "2",
            ),
            array(
                'name' => "Lucknow",
                'type' => 'City',
                'state_id' => "2",

            ),
            array(
                'name' => "Janshi",
                'type' => 'City',
                'state_id' => "2",

            ),
            array(
                'name' => "Jaipur",
                'type' => 'City',
                'state_id' => "3",

            ),
            array(
                'name' => "Kota",
                'type' => 'City',
                'state_id' => "3",

            ),
            array(
                'name' => "Alwar",
                'type' => 'City',
                'state_id' => "3",

            ),
            array(
                'name' => "Jalandhar",
                'type' => 'City',
                'state_id' => "4",

            ),
            array(
                'name' => "Bathinda",
                'type' => 'City',
                'state_id' => "4",

            ),
            array(
                'name' => "Pathankot",
                'type' => 'City',
                'state_id' => "4",

            ),
            array(
                'name' => "Rajpura",
                'type' => 'City',
                'state_id' => "4",

            ),
            array(
                'name' => "Mumbai",
                'type' => 'City',
                'state_id' => "5",

            ),
            array(
                'name' => "Pune",
                'type' => 'City',
                'state_id' => "5",

            ),
            array(
                'name' => "Naghpur",
                'type' => 'City',
                'state_id' => "5",

            ),
            array(
                'name' => "Nashik",
                'type' => 'City',
                'state_id' => "5",

            )
            ));
    }
}
