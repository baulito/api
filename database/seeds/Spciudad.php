<?php

use Illuminate\Database\Seeder;

class Spciudad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sp_ciudad = array(
            array('id' => '1','ciudad' => '6881','pais' => 'CO','latitud' => '4.6274335','longitud' => '-74.0648901'),
            array('id' => '2','ciudad' => '10839','pais' => 'CO','latitud' => '3.3949068','longitud' => '-76.5033828'),
            array('id' => '3','ciudad' => '10222','pais' => 'CO','latitud' => '6.2519435','longitud' => '-75.5786816')
        );

        foreach ($sp_ciudad as $data) {
            DB::table('sp_ciudad')->insert([
                'id' => $data['id'],
                'ciudad_id' => $data['ciudad'],
                'pais_id' => $data['pais'],
                'latitud' => $data['latitud'],
                'longitud' => $data['longitud'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
