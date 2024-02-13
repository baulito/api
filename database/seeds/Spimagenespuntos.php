<?php

use Illuminate\Database\Seeder;

class Spimagenespuntos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $puntos_imagenes = array(
            array('id' => '1','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/UgBWKPvuZIdkREAwMwL42WYESFgjtPtsQ1I8B4nX.jpeg','punto' => '2','tipo' => '1','created_at' => '2020-03-02 15:46:37','updated_at' => '2020-10-29 05:46:55'),
            array('id' => '2','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/f1hexnbLlyMkSuv8y4LpJwsR2Q9cdgwogV5fTAe4.jpeg','punto' => '1','tipo' => '1','created_at' => '2020-03-02 15:48:34','updated_at' => '2020-10-29 05:44:54'),
            array('id' => '3','imagen' => 'http://administrador.sportodos.com/imagenes/IwBeE1zm25YagM4XfIAX11drRJ2VG6OrGZYAuFac.jpeg','punto' => '5','tipo' => '1','created_at' => '2020-03-18 12:31:23','updated_at' => '2020-03-18 12:33:41'),
            array('id' => '4','imagen' => 'http://administrador.sportodos.com/imagenes/GZpdGWb60Flv3xfYIfgA063J6XJP3mAHHlNmH0nb.jpeg','punto' => '6','tipo' => '1','created_at' => '2020-03-30 10:18:40','updated_at' => '2020-03-30 10:18:40'),
            array('id' => '5','imagen' => 'http://administrador.sportodos.com/imagenes/UZ49iIsCkqx3NMcMCfty6hzrJUyZf0jcDMe7pmKE.jpeg','punto' => '4','tipo' => '1','created_at' => '2020-03-31 08:16:42','updated_at' => '2020-03-31 08:16:42'),
            array('id' => '6','imagen' => 'http://administrador.sportodos.com/imagenes/RAaQEL1tVGl3hb8y7pQzWqJDYgQFO5pEKzp1onOD.jpeg','punto' => '7','tipo' => '1','created_at' => '2020-03-31 08:33:49','updated_at' => '2020-03-31 08:33:49'),
            array('id' => '11','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/XLZnaOzoc2mKZw5KnuNXrIUtmb4WAAtwNmBL8FZo.jpeg','punto' => '1','tipo' => '3','created_at' => '2020-10-29 05:44:54','updated_at' => '2020-10-29 05:44:54'),
            array('id' => '12','imagen' => 'http://administradorsportodos.testing.togroow.com/imagenes/N1WrJPlSTDdcPzQ15bieIOJW4t4DJwEhPaXjarwy.jpeg','punto' => '2','tipo' => '3','created_at' => '2020-10-29 05:46:55','updated_at' => '2020-10-29 05:46:55')
          );

          foreach ($puntos_imagenes  as $data) {
            DB::table('sp_imagen_punto')->insert([
                'punto_id' => $data['punto'],
                'imagen' => $data['imagen'],
                'tipo'=>$data['tipo'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }  
    }
}
