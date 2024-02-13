<?php

use Illuminate\Database\Seeder;

class Spespacios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $espacio = array(
            array('id' => '1','nombre' => 'Plaza de enventos','descripcion' => '<p>A la Plaza de Eventos se le hizo un cerramiento desmontable para conciertos y eventos populares; y se adoquinaron los caminos y v&iacute;as peatonales. Adem&aacute;s se dej&oacute; listo el Ciclo paseo interno y se contrataron los dise&ntilde;os de la Ciclo ruta y los andenes externos.</p>','latitud' => '4.660570472215521','longitud' => '-74.09073847357178','deporte' => NULL,'punto' => '1','created_at' => '2020-03-05 15:14:14','updated_at' => '2020-03-05 12:09:58'),
            array('id' => '2','nombre' => 'entrada 68','descripcion' => '<p>entrada de la 68</p>','latitud' => '4.664762257450981','longitud' => '-74.09348505560303','deporte' => NULL,'punto' => '1','created_at' => '2020-03-05 15:29:43','updated_at' => '2020-03-05 11:39:48'),
            array('id' => '3','nombre' => 'Cancha Mixta','descripcion' => '<p>En la cancha mixta puedes realizar tus encuentros de Futbol. Basket y Micro</p>','latitud' => '4.732305032221249','longitud' => '-74.04326884337769','deporte' => NULL,'punto' => '5','created_at' => '2020-04-27 10:04:35','updated_at' => '2020-04-27 10:04:35')
        );
        foreach ( $espacio as $data) {
            DB::table('sp_espacio')->insert([
                'id' => $data['id'],
                'punto_id' => $data['punto'],
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'latitud' => $data['latitud'],
                'longitud' => $data['longitud'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } 
    }
}
