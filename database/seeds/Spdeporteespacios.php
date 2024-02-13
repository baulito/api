<?php

use Illuminate\Database\Seeder;

class Spdeporteespacios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $espacio_asignacion_deporte = array(
            array('deporte' => '1','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '2','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '6','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '7','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '8','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '9','espacio' => '1','created_at' => '2020-03-05 12:09:58','updated_at' => '2020-03-05 12:09:58'),
            array('deporte' => '10','espacio' => '1','created_at' => '2020-03-05 12:09:59','updated_at' => '2020-03-05 12:09:59'),
            array('deporte' => '12','espacio' => '1','created_at' => '2020-03-05 12:09:59','updated_at' => '2020-03-05 12:09:59'),
            array('deporte' => '13','espacio' => '1','created_at' => '2020-03-05 12:09:59','updated_at' => '2020-03-05 12:09:59'),
            array('deporte' => '14','espacio' => '1','created_at' => '2020-03-05 12:09:59','updated_at' => '2020-03-05 12:09:59'),
            array('deporte' => '1','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '2','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '6','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '7','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '8','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '9','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '10','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '12','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '13','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '14','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '16','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '17','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '18','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '19','espacio' => '2','created_at' => '2020-03-26 12:50:33','updated_at' => '2020-03-26 12:50:33'),
            array('deporte' => '1','espacio' => '3','created_at' => '2020-04-27 10:04:36','updated_at' => '2020-04-27 10:04:36'),
            array('deporte' => '2','espacio' => '3','created_at' => '2020-04-27 10:04:36','updated_at' => '2020-04-27 10:04:36'),
            array('deporte' => '19','espacio' => '3','created_at' => '2020-04-27 10:04:36','updated_at' => '2020-04-27 10:04:36')
          );

          foreach ($espacio_asignacion_deporte as $data) {
            DB::table('sp_deporte_espacio')->insert([
                'deporte_id' => $data['deporte'],
                'espacio_id' => $data['espacio'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
          }
    }
}
