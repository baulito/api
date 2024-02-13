<?php

use Illuminate\Database\Seeder;

class Spbarreras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $barreras = array(
            array('id' => '1','nombre' => 'Visual','tipo' => '1','created_at' => '2020-01-29 12:46:33','updated_at' => '2020-01-29 12:46:54'),
            array('id' => '2','nombre' => 'Auditiva','tipo' => '1','created_at' => '2020-01-29 12:47:06','updated_at' => '2020-01-29 12:47:06'),
            array('id' => '3','nombre' => 'Habla','tipo' => '1','created_at' => '2020-01-29 12:47:15','updated_at' => '2020-01-29 12:47:15'),
            array('id' => '4','nombre' => 'Movilidad','tipo' => '1','created_at' => '2020-01-29 12:47:25','updated_at' => '2020-01-29 12:47:25'),
            array('id' => '5','nombre' => 'Cognición','tipo' => '1','created_at' => '2020-01-29 12:47:35','updated_at' => '2020-01-29 12:47:35'),
            array('id' => '6','nombre' => 'Psicológica','tipo' => '1','created_at' => '2020-01-29 12:47:47','updated_at' => '2020-01-29 12:47:47'),
            array('id' => '7','nombre' => 'Requiere atención Especial','tipo' => '1','created_at' => '2020-01-29 12:47:57','updated_at' => '2020-01-29 12:47:57'),
            array('id' => '8','nombre' => 'Dinero','tipo' => '2','created_at' => '2020-01-29 12:48:07','updated_at' => '2020-01-29 12:48:07'),
            array('id' => '9','nombre' => 'Condición Física','tipo' => '2','created_at' => '2020-01-29 12:48:16','updated_at' => '2020-01-29 12:48:16'),
            array('id' => '10','nombre' => 'Salud','tipo' => '2','created_at' => '2020-01-29 12:48:28','updated_at' => '2020-01-29 12:48:28'),
            array('id' => '11','nombre' => 'Espacios Deportivos','tipo' => '2','created_at' => '2020-01-29 12:48:38','updated_at' => '2020-01-29 12:48:38'),
            array('id' => '12','nombre' => 'Transporte','tipo' => '2','created_at' => '2020-01-29 12:48:47','updated_at' => '2020-01-29 12:48:47'),
            array('id' => '13','nombre' => 'Tiempo','tipo' => '2','created_at' => '2020-01-29 12:48:56','updated_at' => '2020-01-29 12:48:56'),
            array('id' => '14','nombre' => 'Ubicación Geográfica','tipo' => '2','created_at' => '2020-01-29 12:49:06','updated_at' => '2020-01-29 12:49:06'),
            array('id' => '15','nombre' => 'Discriminación','tipo' => '2','created_at' => '2020-01-29 12:49:18','updated_at' => '2020-01-29 12:49:18'),
            array('id' => '16','nombre' => 'Falta de Interés','tipo' => '2','created_at' => '2020-01-29 12:49:31','updated_at' => '2020-01-29 12:49:31'),
            array('id' => '17','nombre' => 'Falta de ayudas para la práctica','tipo' => '2','created_at' => '2020-01-29 12:49:41','updated_at' => '2020-01-29 12:49:41'),
            array('id' => '18','nombre' => 'Condiciones de Violencia','tipo' => '2','created_at' => '2020-01-29 12:49:53','updated_at' => '2020-01-29 12:49:53')
          );
        foreach ($barreras as $data) {
            DB::table('sp_barrera')->insert([
                'id' => $data['id'],
                'nombre' => $data['nombre'],
                'tipo' => $data['tipo'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
