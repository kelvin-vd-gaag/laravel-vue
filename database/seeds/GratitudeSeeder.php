<?php

use Illuminate\Database\Seeder;

class GratitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gratitude::class, 3)->create();
    }
}
