<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Category;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->truncate();
        $companies = factory(Company::class, 50)->create();
        foreach($companies as $company){
            $limit = rand(1, 5);
            $categoriesArray = Category::where('parent_id',1)->inRandomOrder()->limit($limit)->pluck('id')->toArray()  ;
            $company->categories()->sync($categoriesArray);
        }
    }
}
