<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Projects::create([
            'projecttitle' => 'Data Centre Gate Management System',
            'startdate' => '2021-12-23',
            'enddate' => '2021-12-23',
            'teamleader' => 'Abebe Kebede',
            'teammembers' => 'AL, WY, CA, RU',
            'description' => 'This project is aimed to automate the most traditional way of requesting a physical access to the data centres of the bank.',
            'totalweight' => '',
            'status' => '',
            'fullname' => 'James Murry',
            'phonenumber' => '0984742593',
            'unit' => 'Manager Data Centre',
        ]);
    }
}
