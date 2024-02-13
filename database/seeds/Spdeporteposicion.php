<?php

use Illuminate\Database\Seeder;

class Spdeporteposicion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deporte_posicion = array(
            array('id' => '1','nombre' => 'Arquero','deporte' => '1','created_at' => '2020-01-28 18:25:44','updated_at' => '2020-01-28 18:25:44'),
            array('id' => '2','nombre' => 'Defensa','deporte' => '1','created_at' => '2020-01-28 18:26:04','updated_at' => '2020-01-28 18:26:04'),
            array('id' => '3','nombre' => 'Volante','deporte' => '1','created_at' => '2020-01-28 18:26:16','updated_at' => '2020-01-28 18:26:16'),
            array('id' => '4','nombre' => 'Delantero','deporte' => '1','created_at' => '2020-01-28 18:26:23','updated_at' => '2020-01-28 18:26:23'),
            array('id' => '5','nombre' => 'Libero','deporte' => '7','created_at' => '2020-01-28 18:29:54','updated_at' => '2020-01-28 18:29:54'),
            array('id' => '6','nombre' => 'Armador','deporte' => '7','created_at' => '2020-01-28 18:30:02','updated_at' => '2020-01-28 18:30:02'),
            array('id' => '7','nombre' => 'Remachador','deporte' => '7','created_at' => '2020-01-28 18:30:17','updated_at' => '2020-01-28 18:30:17'),
            array('id' => '8','nombre' => 'Defensa','deporte' => '7','created_at' => '2020-01-28 18:30:29','updated_at' => '2020-01-28 18:30:29'),
            array('id' => '9','nombre' => 'Base','deporte' => '2','created_at' => '2020-01-28 18:31:20','updated_at' => '2020-01-28 18:31:20'),
            array('id' => '10','nombre' => 'Escolta','deporte' => '2','created_at' => '2020-01-28 18:31:30','updated_at' => '2020-01-28 18:31:30'),
            array('id' => '11','nombre' => 'Alero','deporte' => '2','created_at' => '2020-01-28 18:31:42','updated_at' => '2020-01-28 18:31:42'),
            array('id' => '12','nombre' => 'Ala pivot','deporte' => '2','created_at' => '2020-01-28 18:31:55','updated_at' => '2020-01-28 18:31:55'),
            array('id' => '13','nombre' => 'Pivot','deporte' => '2','created_at' => '2020-01-28 18:32:03','updated_at' => '2020-01-28 18:32:03'),
            array('id' => '14','nombre' => 'Lanzador','deporte' => '8','created_at' => '2020-01-28 18:38:05','updated_at' => '2020-01-28 18:38:05'),
            array('id' => '15','nombre' => 'Receptor','deporte' => '8','created_at' => '2020-01-28 18:38:25','updated_at' => '2020-01-28 18:38:25'),
            array('id' => '16','nombre' => '1 Base','deporte' => '8','created_at' => '2020-01-28 18:38:37','updated_at' => '2020-01-28 18:38:37'),
            array('id' => '17','nombre' => '2 Base','deporte' => '8','created_at' => '2020-01-28 18:38:48','updated_at' => '2020-01-28 18:38:48'),
            array('id' => '18','nombre' => '3 Base','deporte' => '8','created_at' => '2020-01-28 18:39:02','updated_at' => '2020-01-28 18:39:02'),
            array('id' => '19','nombre' => 'Campo Corto','deporte' => '8','created_at' => '2020-01-28 18:39:17','updated_at' => '2020-01-28 18:39:17'),
            array('id' => '20','nombre' => 'Jardinero','deporte' => '8','created_at' => '2020-01-28 18:39:27','updated_at' => '2020-01-28 18:39:27'),
            array('id' => '21','nombre' => 'Pilar','deporte' => '9','created_at' => '2020-01-28 18:41:40','updated_at' => '2020-01-28 18:41:40'),
            array('id' => '22','nombre' => 'Talador','deporte' => '9','created_at' => '2020-01-28 18:41:48','updated_at' => '2020-01-28 18:41:48'),
            array('id' => '23','nombre' => 'Segunda Linea','deporte' => '9','created_at' => '2020-01-28 18:41:59','updated_at' => '2020-01-28 18:41:59'),
            array('id' => '24','nombre' => 'Saguero','deporte' => '9','created_at' => '2020-01-28 18:42:59','updated_at' => '2020-01-28 18:42:59'),
            array('id' => '25','nombre' => 'Flanker','deporte' => '9','created_at' => '2020-01-28 18:43:48','updated_at' => '2020-01-28 18:43:48'),
            array('id' => '26','nombre' => 'Numero 8','deporte' => '9','created_at' => '2020-01-28 18:44:26','updated_at' => '2020-01-28 18:44:26'),
            array('id' => '27','nombre' => 'Apertura','deporte' => '9','created_at' => '2020-01-28 18:44:36','updated_at' => '2020-01-28 18:44:36'),
            array('id' => '28','nombre' => 'Ala','deporte' => '9','created_at' => '2020-01-28 18:44:45','updated_at' => '2020-01-28 18:44:45'),
            array('id' => '29','nombre' => '1 Centro','deporte' => '9','created_at' => '2020-01-28 18:45:01','updated_at' => '2020-01-28 18:45:01'),
            array('id' => '30','nombre' => 'Hangler','deporte' => '10','created_at' => '2020-01-28 18:45:35','updated_at' => '2020-01-28 18:45:35'),
            array('id' => '31','nombre' => 'Medio','deporte' => '10','created_at' => '2020-01-28 18:45:44','updated_at' => '2020-01-28 18:45:44'),
            array('id' => '32','nombre' => 'Deep','deporte' => '10','created_at' => '2020-01-28 18:45:53','updated_at' => '2020-01-28 18:45:53'),
          );

        foreach ($deporte_posicion as $data) {
            DB::table('sp_deporte_posicion')->insert([
                'id' => $data['id'],
                'nombre' => $data['nombre'],
                'deporte_id' => $data['deporte'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
