<?php

use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::truncate();
        factory(Phone::class, 50)->create();
    }
}
