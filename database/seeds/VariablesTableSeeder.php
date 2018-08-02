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
            'sexo_t' => 'h',
            'nombre_sexo' => 'Hombre',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('sexos')->insert(array(
            'sexo_t' => 'm',
            'nombre_sexo' => 'Mujer',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //-------------------
        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'siz',
            'tipo_nombre' => 'superior izquierda',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'sde',
            'tipo_nombre' => 'superior derecha',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'iiz',
            'tipo_nombre' => 'inferior izquierda',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('tipo_fotos')->insert(array(
            'tipo' => 'ide',
            'tipo_nombre' => 'inferior derecha',
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
