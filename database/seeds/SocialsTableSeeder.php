<?php

use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::truncate();
        factory(Social::class, 50)->create();
    }
}
