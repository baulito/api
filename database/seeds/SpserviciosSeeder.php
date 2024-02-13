<?php

use Illuminate\Database\Seeder;

class SpserviciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios = array(
            array('id' => '1','nombre' => 'Iluminación Publica','icono' => 'icon-light'),
            array('id' => '2','nombre' => 'Baños','icono' => 'icon-toilette'),
            array('id' => '3','nombre' => 'Parqueadero','icono' => 'icon-car-parking'),
            array('id' => '4','nombre' => 'Vestieres','icono' => 'icon-hanger'),
            array('id' => '5','nombre' => 'Graderías','icono' => 'icon-stairs'),
            array('id' => '6','nombre' => 'Acceso Discapacitados','icono' => 'icon-wheelchair'),
            array('id' => '7','nombre' => 'Adecuaciones para Discapacitados','icono' => 'icon-wheelchair-ramp'),
            array('id' => '8','nombre' => 'Duchas','icono' => 'icon-bath-tub'),
            array('id' => '9','nombre' => 'Tablero Manual de Marcador','icono' => 'icon-name-card'),
            array('id' => '10','nombre' => 'Tablero Digital de Marcador','icono' => 'icon-video-player'),
            array('id' => '11','nombre' => 'Pago con Tarjeta','icono' => 'icon-credit-card'),
            array('id' => '12','nombre' => 'Tienda Accesorios Deportivos','icono' => 'icon-store'),
            array('id' => '13','nombre' => 'Zona de Alimentación','icono' => 'icon-cutlery'),
            array('id' => '14','nombre' => 'Iluminacion Privada','icono' => 'icon-lamp-floor'),
            array('id' => '15','nombre' => 'Cubierto (Techo)','icono' => 'icon-terrace'),
            array('id' => '16','nombre' => 'Servicio de Petos (Diferenciar Equipos)','icono' => 'icon-sports-tank'),
            array('id' => '17','nombre' => 'Ascensor','icono' => 'icon-lift'),
            array('id' => '18','nombre' => 'Zona de Hidratación','icono' => 'icon-drinking-bottle'),
            array('id' => '19','nombre' => 'Otros Deportes','icono' => 'icon-ticket'),
            array('id' => '21','nombre' => 'Bancas','icono' => 'icon-chair-2'),
            array('id' => '22','nombre' => 'Gradería Cesped (Pasto)','icono' => 'icon-park'),
            array('id' => '23','nombre' => 'Zona Pequeña ( 1 ó 2 Cuadras)','icono' => ''),
            array('id' => '24','nombre' => 'Zona Mediana ( 3 ó 4 Cuadras)','icono' => ''),
            array('id' => '25','nombre' => 'Zona Alta ( 5 ó + Cuadras)','icono' => '')
          );
        
        foreach ($servicios as $data) {
            DB::table('sp_servicio')->insert([
                'id' => $data['id'],
                'nombre' => $data['nombre'],
                'icono' => $data['icono'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
