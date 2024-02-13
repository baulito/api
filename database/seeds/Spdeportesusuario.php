<?php

use Illuminate\Database\Seeder;

class Spdeportesusuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario_deporte = array(
            array('id' => '2','usuario' => '749','deporte' => '1','deporte_nombre' => 'Futbol','nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-03-10 09:39:05','updated_at' => '2020-03-10 09:39:05'),
            array('id' => '3','usuario' => '759','deporte' => '1','deporte_nombre' => 'Baloncesto','nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-03-10 09:50:35','updated_at' => '2020-03-10 09:50:35'),
            array('id' => '4','usuario' => '781','deporte' => '1','deporte_nombre' => 'Futbol','nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-03-11 09:05:33','updated_at' => '2020-03-11 09:05:33'),
            array('id' => '5','usuario' => '783','deporte' => '2','deporte_nombre' => 'Baloncesto','nivel' => 'Amateur','posicion' => '11','principal' => '1','created_at' => '2020-03-11 09:09:32','updated_at' => '2020-03-11 09:09:32'),
            array('id' => '6','usuario' => '784','deporte' => NULL,'deporte_nombre' => 'Surf','nivel' => 'Semiprofecional','posicion' => NULL,'principal' => '1','created_at' => '2020-03-11 09:19:56','updated_at' => '2020-03-11 09:19:56'),
            array('id' => '7','usuario' => '785','deporte' => '14','deporte_nombre' => NULL,'nivel' => 'Amateur','posicion' => NULL,'principal' => '1','created_at' => '2020-03-11 09:30:35','updated_at' => '2020-03-11 09:30:35'),
            array('id' => '8','usuario' => '790','deporte' => '14','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => NULL,'principal' => '1','created_at' => '2020-03-16 12:47:34','updated_at' => '2020-03-16 12:47:34'),
            array('id' => '9','usuario' => '792','deporte' => '2','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '11','principal' => '1','created_at' => '2020-03-18 09:03:29','updated_at' => '2020-03-18 09:03:29'),
            array('id' => '10','usuario' => '793','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '3','principal' => '1','created_at' => '2020-03-18 09:14:35','updated_at' => '2020-03-18 09:14:35'),
            array('id' => '11','usuario' => '797','deporte' => NULL,'deporte_nombre' => 'Surf','nivel' => 'Semiprofecional','posicion' => '11','principal' => '1','created_at' => '2020-03-30 09:34:09','updated_at' => '2020-03-30 09:34:09'),
            array('id' => '12','usuario' => '799','deporte' => '10','deporte_nombre' => 'Surf','nivel' => 'Amateur','posicion' => '31','principal' => '1','created_at' => '2020-04-01 10:07:33','updated_at' => '2020-04-01 10:07:33'),
            array('id' => '13','usuario' => '800','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-04-01 10:30:41','updated_at' => '2020-04-01 10:30:41'),
            array('id' => '14','usuario' => '802','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '3','principal' => '1','created_at' => '2020-04-01 19:47:14','updated_at' => '2020-04-01 19:47:14'),
            array('id' => '15','usuario' => '803','deporte' => '1','deporte_nombre' => 'Surf','nivel' => 'Aficionado','posicion' => '4','principal' => '1','created_at' => '2020-04-03 08:13:03','updated_at' => '2020-04-03 08:13:03'),
            array('id' => '16','usuario' => '805','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '3','principal' => '1','created_at' => '2020-04-03 15:18:23','updated_at' => '2020-04-03 15:18:23'),
            array('id' => '17','usuario' => '809','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Amateur','posicion' => '3','principal' => '1','created_at' => '2020-04-06 15:25:05','updated_at' => '2020-04-06 15:25:05'),
            array('id' => '18','usuario' => '808','deporte' => '1','deporte_nombre' => 'Surf','nivel' => 'Aficionado','posicion' => '3','principal' => '1','created_at' => '2020-04-06 15:30:12','updated_at' => '2020-04-06 15:30:12'),
            array('id' => '19','usuario' => '826','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-05-11 16:09:29','updated_at' => '2020-05-11 16:09:29'),
            array('id' => '20','usuario' => '840','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Amateur','posicion' => '2','principal' => '1','created_at' => '2020-05-19 12:28:53','updated_at' => '2020-05-19 12:28:53'),
            array('id' => '21','usuario' => '859','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-05-22 11:07:59','updated_at' => '2020-05-22 11:07:59'),
            array('id' => '22','usuario' => '1413','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '2','principal' => '1','created_at' => '2020-08-11 08:33:45','updated_at' => '2020-08-11 08:33:45'),
            array('id' => '23','usuario' => NULL,'deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '5','principal' => '1','created_at' => '2020-08-26 21:52:16','updated_at' => '2020-08-26 21:52:16'),
            array('id' => '24','usuario' => '1417','deporte' => '2','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '10','principal' => '1','created_at' => '2020-08-27 15:29:27','updated_at' => '2020-08-27 15:29:27'),
            array('id' => '25','usuario' => '1706','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-08-27 15:58:10','updated_at' => '2020-08-27 15:58:10'),
            array('id' => '26','usuario' => '1708','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '1','principal' => '1','created_at' => '2020-08-27 17:22:54','updated_at' => '2020-08-27 17:22:54'),
            array('id' => '27','usuario' => '1717','deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Profecional','posicion' => '2','principal' => '1','created_at' => '2020-08-29 03:06:19','updated_at' => '2020-08-29 03:06:19'),
            array('id' => '28','usuario' => NULL,'deporte' => '1','deporte_nombre' => NULL,'nivel' => 'Aficionado','posicion' => '2','principal' => '1','created_at' => '2020-09-22 14:19:47','updated_at' => '2020-09-22 14:19:47')
          );

          $niveles = [];

        $niveles['Aficionado']=1;
        $niveles['Amateur']=2;
        $niveles['Semiprofecional']=3;
        $niveles['Profecional']=4;
        $niveles['Pensionado']=5;

        foreach ($usuario_deporte as $data) {
            $user = DB::table("user")->where("user_id",$data['usuario'])->get();
            if(isset($user) && isset($user[0])){
                DB::table('sp_deporte_usuario')->insert([
                    'user_id' => $data['usuario'],
                    'posicion_id' => (int)$data['posicion'],
                    'deporte_id' => (int)$data['deporte'],
                    'nivel_id' => $niveles[$data['nivel']],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
