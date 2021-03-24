<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Temporary user*/
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.nl',
            'password' => Hash::make('adminadmin'),
        ]);
    }
}
