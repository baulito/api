<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];
        $array[1] = ["1","Fútbol","icon-soccer-ball"];
        $array[2] = ["2","Baloncesto","icon-basketball"];
        $array[6] = ["6","Tenis","icon-tennis-ball"];
        $array[7] = ["7","Voleibol","icon-volleyball"];
        $array[8] = ["8","Béisbol","icon-baseball"];
        $array[9] = ["9","Rugby","icon-rugby-ball"];
        $array[10] = ["10","Ultimate","icon-rugby"];
        $array[12] = ["12","Ciclismo","icon-bike"];
        $array[13] = ["13","Atletismo","icon-run-shoes"];
        $array[14] = ["14","Natación (Waterpolo)","icon-swimming"];
        $array[16] = ["16","Patinaje",'icon-skating'];
        $array[17] = ["17","Hockey",'icon-hockey'];
        $array[18] = ["18","Microfútbol",'icon-soccer'];
        $array[19] = ["19","MicroFútbol Paralímpico",'icon-paralympic-games'];
        $array[20] = ["20","Baloncesto Paralímpico",'icon-paralympic-games'];
        $array[21] = ["21","Voleibol Paralímpico",'icon-paralympic-games'];
        $array[22] = ["22","Natación Paralímpico",'icon-paralympic-games'];
        $array[23] = ["23","Tenis Paralímpico",'icon-paralympic-games'];

        
        foreach ($array as $data) {
            DB::table('sp_deporte')->insert([
                'id' => $data[0],
                'nombre' => $data[1],
                'icono' => $data[2],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}
