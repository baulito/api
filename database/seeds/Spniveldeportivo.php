<?php

use Illuminate\Database\Seeder;

class Spniveldeportivo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = array(
            array('nivel' => 'Aficionado'),
            array('nivel' => 'Amateur'),
            array('nivel' => 'Semiprofesional'),
            array('nivel' => 'Profesional'),
            array('nivel' => 'Pensionado')
        );

        foreach ($niveles as $data) {
            DB::table('sp_nivel_deportivo')->insert([
                'nivel' => $data['nivel'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
