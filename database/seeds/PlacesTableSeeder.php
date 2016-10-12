<?php

use Illuminate\Database\Seeder;

use App\Models\Department;
use App\Models\Province;
use App\Models\Section;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionsArray=[
            '25 de Mayo',
            'Cañada Seca',
            'Centro',
            'Cuadro Benegas',
            'Cuadro Nacional',
            'El Cerrito',
            'El Nihuil',
            'Goudge',
            'Jaime Prats',
            'La Llave',
            'Las Malvinas',
            'Las Paredes',
            'Monte Coman',
            'Rama Caída',
            'Real del Padre',
            'Villa Atuel',
        ];

        $departmentsArray=[
            'Capital',
            'General Alvear',
            'Godoy Cruz',
            'Guaymallén',
            'Junin',
            'La Paz',
            'Las Heras',
            'Lavalle',
            'Luján de Cuyo',
            'Maipú',
            'Malargüe',
            'Rivadavia',
            'San Carlos',
            'General San Martín',
            'San Rafael',
            'Santa Rosa',
            'Tunuyán',
            'Tupungato',
        ];

        $provincesArray=[
            'Buenos Aires',
            'Catamarca',
            'Chaco',
            'Chubut',
            'Córdoba',
            'Corrientes',
            'Entre Ríos',
            'Formosa',
            'Jujuy',
            'La Pampa',
            'La Rioja',
            'Mendoza',
            'Misiones',
            'Neuquén',
            'Río Negro',
            'Salta',
            'San Luis',
            'Santa Cruz',
            'Santa Fe',
            'Santiago del Estero',
            'Tierra del Fuego',
            'Antartártida e Islas del Atántico Sur',
            'Tucumán'
        ];


        $provinces = Province::all();
        $departments = Department::all();
        $sections = Section::all();

        if($provinces->isEmpty()){
            foreach ($provincesArray as $province){

                Province::create([
                    'name' => $province
                ]);
            }
        }

        if($departments->isEmpty()){
            foreach ($departmentsArray as $department){

                Department::create([
                    'name' => $department,
                    'province_id' => 12
                ]);
            }
        }

        if($sections->isEmpty()){
            foreach ($sectionsArray as $section){

                Section::create([
                    'name' => $section,
                    'department_id' => 15
                ]);
            }
        }
        
    }
}
