<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Carbon\Carbon;

class DatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        // 10 personas
        for ($i=0; $i < 10; $i++) { 
        	\DB::table('personas')->insert(array (
			'primer_nombre'  => $faker->firstName,
			'segundo_nombre'  => $faker->firstName,
			'primer_apellido'  => $faker->lastname,
			'segundo_apellido'  => $faker->lastname,
			'fecha_nac'  => $faker->date($format = 'Y-m-d', $min = '-48 years', $max = '-20 years'),
			'sexo_id'  => '1',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));
        }
        
        // 5 usuarios
        	\DB::table('users')->insert(array (
			'name'  => 'name_user0',
			'password'  => bcrypt('123456'),
			'email'  => 'siarcaf@gmail.com',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));		

        for ($i=1; $i <5 ; $i++) { 
        	
	    	\DB::table('users')->insert(array (
			'name'  => 'name_user'.$i,
			'password'  => bcrypt('123456'),
			'email'  => $faker->freeEmail,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));
    	
        }

        // 3 doctores
        for ($i=1; $i < 4 ; $i++) { 
        	
	    	\DB::table('doctores')->insert(array (
			'user_id'  => $i+2,
			'persona_id'  => $i,
			'salario'  => '88.88',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));
    	
        }

        // 7 pacientes

        for ($i=4; $i < 11 ; $i++) { 
        	
	    	\DB::table('pacientes')->insert(array (
			'persona_id'  => $i,
			'direccion'  =>  $faker->address,
			'email'  => $faker->freeEmail,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));
    	
        }

        // 7 expedientes

        for ($i=1; $i < 8 ; $i++) { 
        	
	    	\DB::table('expedientes')->insert(array (
			'paciente_id'  => $i,
			'tipo_sanguineo_id'  =>  $faker->numberBetween($min = 1, $max = 9),
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			));
    	
        }





    }
}
