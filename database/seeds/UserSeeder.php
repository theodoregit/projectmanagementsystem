<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'natnael tilahun',
            'role' => 2,
            'email' => 'natnaeltilahun@cbe.com.et',
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'abdurahman idris',
            'role' => 2,
            'email' => 'abdurahmanidris@cbe.com.et',
            'password' => bcrypt('password')
        ]);
        
        App\User::create([
            'name' => 'yishrun adila',
            'role' => 2,
            'email' => 'yishrunadila@cbe.com.et',
            'password' => bcrypt('password')
        ]);
        
        App\User::create([
            'name' => 'getnet adane',
            'role' => 2,
            'email' => 'getnetadane@cbe.com.et',
            'password' => bcrypt('password')
        ]);
        
        App\User::create([
            'name' => 'alayu demisew',
            'role' => 2,
            'email' => 'alayudemisew@cbe.com.et',
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'tewodros yesmaw',
            'role' => 2,
            'email' => 'tewodrosyesmaw@cbe.com.et',
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'kaleb bekele',
            'role' => 2,
            'email' => 'kalebbekele@cbe.com.et',
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'biruk zegeju',
            'role' => 1,
            'email' => 'birukzegeju@cbe.com.et',
            'password' => bcrypt('password')
        ]);

        App\User::create([
            'name' => 'abenezer kifile',
            'role' => 2,
            'email' => 'abenezerkifile@cbe.com.et',
            'password' => bcrypt('password')
        ]);
    }
}
