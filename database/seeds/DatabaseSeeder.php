<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call('UsersTableSeeder');
        $this->call('PlacesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('CompaniesTableSeeder');
        $this->call('PhonesTableSeeder');
        $this->call('SocialsTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
