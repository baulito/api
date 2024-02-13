<?php

use Illuminate\Database\Seeder;

class Spusuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario_sportodos = array(
            array('usuario' => '759','discapacidad' => '2','barrera' => '8','peso' => '86Kg','altura' => '172 cm','created_at' => '2020-03-10 09:50:35','updated_at' => '2020-03-10 09:50:35'),
            array('usuario' => '793','discapacidad' => '0','barrera' => '11','peso' => '76,5','altura' => '1,76','created_at' => '2020-03-18 09:14:35','updated_at' => '2020-03-18 09:14:35'),
            array('usuario' => '799','discapacidad' => '2','barrera' => '8','peso' => '82','altura' => '184','created_at' => '2020-04-01 10:07:33','updated_at' => '2020-04-01 10:07:33'),
            array('usuario' => '802','discapacidad' => '0','barrera' => '13','peso' => '77','altura' => '176','created_at' => '2020-04-01 19:47:14','updated_at' => '2020-04-01 19:47:14'),
            array('usuario' => '809','discapacidad' => '0','barrera' => '8','peso' => '76,4','altura' => '1,76','created_at' => '2020-04-06 15:25:05','updated_at' => '2020-04-06 15:25:05'),
            array('usuario' => '826','discapacidad' => '0','barrera' => '0','peso' => NULL,'altura' => NULL,'created_at' => '2020-05-11 16:09:29','updated_at' => '2020-05-11 16:09:29'),
            array('usuario' => '840','discapacidad' => '0','barrera' => '0','peso' => '76,4','altura' => '1,76','created_at' => '2020-05-19 12:28:53','updated_at' => '2020-05-19 12:28:53'),
            array('usuario' => '859','discapacidad' => '0','barrera' => '0','peso' => NULL,'altura' => NULL,'created_at' => '2020-05-22 11:07:59','updated_at' => '2020-05-22 11:07:59'),
            array('usuario' => '1413','discapacidad' => '0','barrera' => '8','peso' => '75','altura' => '1.75','created_at' => '2020-08-11 08:33:45','updated_at' => '2020-08-11 08:33:45'),
            array('usuario' => '1417','discapacidad' => '0','barrera' => '8','peso' => '86','altura' => '172','created_at' => '2020-08-27 15:29:27','updated_at' => '2020-08-27 15:29:27'),
            array('usuario' => '1706','discapacidad' => '0','barrera' => '13','peso' => '86','altura' => '172','created_at' => '2020-08-27 15:58:10','updated_at' => '2020-08-27 15:58:10'),
            array('usuario' => '1708','discapacidad' => '0','barrera' => '0','peso' => '222','altura' => '111','created_at' => '2020-08-27 17:22:54','updated_at' => '2020-08-27 17:22:54'),
            array('usuario' => '1717','discapacidad' => '0','barrera' => '13','peso' => '45','altura' => '165','created_at' => '2020-08-29 03:06:19','updated_at' => '2020-08-29 03:06:19')
          );
          

        foreach ($usuario_sportodos as $data) {

            $user = DB::table("user")->where("user_id",$data['usuario'])->get();
            if(isset($user) && isset($user[0])){
                DB::table('sp_usuario')->insert([
                    'user_id' => $data['usuario'],
                    'peso' => (int)$data['peso'],
                    'altura' => (int)$data['altura'],
                    'fecha_nacimiento' => date('Y-m-d'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                if($data['discapacidad'] > 0){
                    DB::table('sp_barrera_usuario')->insert([
                        'user_id' => $data['usuario'],
                        'barrera_id' => $data['discapacidad'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
                if($data['barrera'] > 0){
                    DB::table('sp_barrera_usuario')->insert([
                        'user_id' => $data['usuario'],
                        'barrera_id' => $data['barrera'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
    }
}
