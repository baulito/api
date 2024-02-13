<?php

use Illuminate\Database\Seeder;

class Spserviciospuntos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $puntos_asignacion_servicios = array(
            array('servicio' => '1','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '2','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '3','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '4','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '5','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '6','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '7','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '8','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '9','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '10','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '11','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '12','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '13','punto' => '2','created_at' => '2020-03-05 11:42:55','updated_at' => '2020-03-05 11:42:55'),
            array('servicio' => '1','punto' => '6','created_at' => '2020-03-30 10:18:40','updated_at' => '2020-03-30 10:18:40'),
            array('servicio' => '22','punto' => '6','created_at' => '2020-03-30 10:18:40','updated_at' => '2020-03-30 10:18:40'),
            array('servicio' => '24','punto' => '6','created_at' => '2020-03-30 10:18:40','updated_at' => '2020-03-30 10:18:40'),
            array('servicio' => '3','punto' => '5','created_at' => '2020-03-30 10:21:02','updated_at' => '2020-03-30 10:21:02'),
            array('servicio' => '23','punto' => '5','created_at' => '2020-03-30 10:21:02','updated_at' => '2020-03-30 10:21:02'),
            array('servicio' => '1','punto' => '4','created_at' => '2020-03-31 08:18:02','updated_at' => '2020-03-31 08:18:02'),
            array('servicio' => '21','punto' => '4','created_at' => '2020-03-31 08:18:02','updated_at' => '2020-03-31 08:18:02'),
            array('servicio' => '24','punto' => '4','created_at' => '2020-03-31 08:18:02','updated_at' => '2020-03-31 08:18:02'),
            array('servicio' => '24','punto' => '7','created_at' => '2020-03-31 08:33:49','updated_at' => '2020-03-31 08:33:49'),
            array('servicio' => '1','punto' => '1','created_at' => '2020-04-01 16:39:07','updated_at' => '2020-04-01 16:39:07'),
            array('servicio' => '2','punto' => '1','created_at' => '2020-04-01 16:39:07','updated_at' => '2020-04-01 16:39:07'),
            array('servicio' => '3','punto' => '1','created_at' => '2020-04-01 16:39:07','updated_at' => '2020-04-01 16:39:07'),
            array('servicio' => '4','punto' => '1','created_at' => '2020-04-01 16:39:07','updated_at' => '2020-04-01 16:39:07'),
            array('servicio' => '5','punto' => '1','created_at' => '2020-04-01 16:39:07','updated_at' => '2020-04-01 16:39:07'),
            array('servicio' => '6','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '7','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '8','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '9','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '10','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '11','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '12','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08'),
            array('servicio' => '13','punto' => '1','created_at' => '2020-04-01 16:39:08','updated_at' => '2020-04-01 16:39:08')
        );

        foreach ($puntos_asignacion_servicios as $data) {
            DB::table('sp_servicio_punto')->insert([
                'punto_id' => $data['punto'],
                'servicio_id' => $data['servicio'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }  
    }
}
