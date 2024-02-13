<?php

use Illuminate\Database\Seeder;

class Spimagenesespacios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $espacio_imagenes = array(
            array('id' => '1','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/nazDAvxWwCMY6NanXAd47UkFjmG6THnQRih28Tyj.jpeg','espacio' => '1','tipo' => '1','created_at' => '2020-03-05 15:14:14','updated_at' => '2020-10-29 05:45:49'),
            array('id' => '2','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/MewRx6B4Cud0FM6N3C2TmV5AK9xw2P1er3jgHloQ.jpeg','espacio' => '2','tipo' => '1','created_at' => '2020-03-05 15:29:43','updated_at' => '2020-10-29 05:45:33')
        );
        foreach ($espacio_imagenes  as $data) {
            DB::table('sp_imagen_espacio')->insert([
                'espacio_id' => $data['espacio'],
                'imagen' => $data['imagen'],
                'tipo'=>$data['tipo'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
