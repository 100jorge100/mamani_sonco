<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ComunidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Peñas',
                'descripcion' => 'Canton Peñas ',
                'estado' => 'Activo',
                'canton' => 1
            ],
            [
                'nombre' => 'Pajcha Peñas',
                'descripcion' => 'Canton Peñas',
                'estado' => 'Activo',
                'canton' => 1
            ],
            [
                'nombre' => 'Huancuyo',
                'descripcion' => 'Canton Peñas',
                'estado' => 'Activo',
                'canton' => 1
            ],
            [
                'nombre' => 'Challapata',
                'descripcion' => 'Canton Peñas',
                'estado' => 'Activo',
                'canton' => 1
            ],
            [
                'nombre' => 'Sojata',
                'descripcion' => 'Canton Peñas',
                'estado' => 'Activo',
                'canton' => 1
            ],
            [
                'nombre' => 'Batallas',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Catacora',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Chirapaca',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Igachi ',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Pariri',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Yaurichambi',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Cullucachi',
                'descripcion' => 'Canton Batallas',
                'estado' => 'Activo',
                'canton' => 2
            ],
            [
                'nombre' => 'Chachacomani',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Alto Cruz Pampa',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Coroyo',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Japupampa',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Kellhuani',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Purapurani',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Sorapujru',
                'descripcion' => 'Canton Villa San Juan de Chachacomani',
                'estado' => 'Activo',
                'canton' => 3
            ],
            [
                'nombre' => 'Kerani',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Korapata',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Chojñapata',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Huncallani',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Jaillihuaya',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Sankajawira',
                'descripcion' => 'Canton Kerani',
                'estado' => 'Activo',
                'canton' => 4
            ],
            [
                'nombre' => 'Karhuiza',
                'descripcion' => 'Canton Karhuiza',
                'estado' => 'Activo',
                'canton' => 5
            ],
            [
                'nombre' => 'Palcoco',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Corqueamaya',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Machacamarca',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Viruyo',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Villa Andino',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Litoral',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Condoriri',
                'descripcion' => 'Canton Huayna Potosi de Palcoco',
                'estado' => 'Activo',
                'canton' => 6
            ],
            [
                'nombre' => 'Calasaya',
                'descripcion' => 'Canton Villa Remedios de Calasaya',
                'estado' => 'Activo',
                'canton' => 7
            ],
            [
                'nombre' => 'Caluyo',
                'descripcion' => 'Canton Villa Remedios de Calasaya',
                'estado' => 'Activo',
                'canton' => 7
            ],
            [
                'nombre' => 'Huayrocondo',
                'descripcion' => 'Canton Villa Remedios de Calasaya',
                'estado' => 'Activo',
                'canton' => 7
            ],
            [
                'nombre' => 'Chijipata Alta',
                'descripcion' => 'Canton Villa Remedios de Calasaya',
                'estado' => 'Activo',
                'canton' => 7
            ],
            [
                'nombre' => 'Chijipata Baja',
                'descripcion' => 'Canton Villa Remedios de Calasaya',
                'estado' => 'Activo',
                'canton' => 7
            ],
            [
                'nombre' => 'Tuquia',
                'descripcion' => 'Canton Villa Asuncion de Tuquia',
                'estado' => 'Activo',
                'canton' => 8
            ],
            [
                'nombre' => 'Alto Peñas',
                'descripcion' => 'Canton Villa Asuncion de Tuquia',
                'estado' => 'Activo',
                'canton' => 8
            ],
            [
                'nombre' => 'Suriquiña',
                'descripcion' => 'Canton Villa Asuncion de Tuquia',
                'estado' => 'Activo',
                'canton' => 8
            ],
            [
                'nombre' => 'Cruzani',
                'descripcion' => 'Canton Villa Asuncion de Tuquia',
                'estado' => 'Activo',
                'canton' => 8
            ],
            [
                'nombre' => 'Isquillani',
                'descripcion' => 'Canton Villa Asuncion de Tuquia',
                'estado' => 'Activo',
                'canton' => 8
            ],
            [
                'nombre' => 'Huancane',
                'descripcion' => 'Canton Huancane',
                'estado' => 'Activo',
                'canton' => 9
            ],
        ];
        DB::table('comunidads')->insert($data);
    }
}
