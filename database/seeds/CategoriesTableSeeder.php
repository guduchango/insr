<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Traigo el array con categorias y subcategorias que tenia insanrafael
        $array = config('larain_categories.categories');
        Category::truncate();
        foreach($array as $var){

            //Creo la categoria padre con parent=0
            $category = Category::create([
                'name' => ''.$var['name'],
                'url' => $var['url'],
                'status' => 1,
                'parent_id' => 0,
                'description' => '',
            ]);

            //Creo las categorias hijos con parent= padre de arriba
            foreach($var['sub'] as $va){

                Category::create([
                    'name' => $va['name'],
                    'url' => $va['url'],
                    'status' => 1,
                    'parent_id' => $category->id,
                    'description' => '',
                ]);


            }
        }



    }
}

