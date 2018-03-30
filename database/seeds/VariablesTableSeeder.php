<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Carbon\Carbon;

class VariablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('sexos')->insert(array(
            'sexo' => 'm',
            'nombre_sexo' => 'masculino',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('sexos')->insert(array(
            'sexo' => 'f',
            'nombre_sexo' => 'femenino',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //-------------------
        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'arr',
            'tipo_nombre' => 'arriba',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'aba',
            'tipo_nombre' => 'abajo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'izq',
            'tipo_nombre' => 'izquierda',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'der',
            'tipo_nombre' => 'derecha',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'nmt',
            'tipo_nombre' => 'N/A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //----------------------------

        \DB::table('alergias')->insert(array(
            'tipo' => 'ac',
            'tipo_nombre' => 'acetaminofen',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('alergias')->insert(array(
            'tipo' => 'to',
            'tipo_nombre' => 'topico',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('alergias')->insert(array(
            'tipo' => 'la',
            'tipo_nombre' => 'latex',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //-------------

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '1',
            'tipo_nombre' => 'O-',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '2',
            'tipo_nombre' => 'O+',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '3',
            'tipo_nombre' => 'A-',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '4',
            'tipo_nombre' => 'A+',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '5',
            'tipo_nombre' => 'B-',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '6',
            'tipo_nombre' => 'B+',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '7',
            'tipo_nombre' => 'AB-',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '8',
            'tipo_nombre' => 'AB+',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_sanguineos')->insert(array(
            'tipo' => '9',
            'tipo_nombre' => 'N/A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //-------------

        \DB::table('servicios')->insert(array(
            'tipo' => 'extra',
            'tipo_nombre' => 'extraccion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('servicios')->insert(array(
            'tipo' => 'limpi',
            'tipo_nombre' => 'limpieza',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('servicios')->insert(array(
            'tipo' => 'relle',
            'tipo_nombre' => 'relleno',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('servicios')->insert(array(
            'tipo' => 'nmtch',
            'tipo_nombre' => 'N/A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));



























    }
}
