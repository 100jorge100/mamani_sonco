<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Educacion',
                'descripcion' => 'Educacion',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Salud',
                'descripcion' => 'Salud',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Riego',
                'descripcion' => 'Riego',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Saneamiento basico',
                'descripcion' => 'Saneamiento basico',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Caminos y Puetes Vehiculares',
                'descripcion' => 'Caminos y puentes vehiculares',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Apoyo a la Produccion, Transformacion y comercializacion',
                'descripcion' => 'Apoyo a la Produccion, Transformacion y comercializacion',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Electricidad',
                'descripcion' => 'Vivenda y Urbanizacion',
                'estado' => 'Activo'
            ],
            [
                'nombre' => 'Vivienda y Urbanizacion',
                'descripcion' => 'Vivienda y Urbanizacion',
                'estado' => 'Activo'
            ], 
        ];
        DB::table('categorias')->insert($data);
    }
}
