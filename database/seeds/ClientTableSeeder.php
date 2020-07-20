<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
        	[
        		'title' => 'Mr',
	            'name' => 'John',
	            'last_name' => 'Doe',
	            'address' => 'Street 123',
	            'zip_code' => '0987',
	            'city' => 'City',
	            'state' => 'Mah',
	            'email' => 'j@d.com',
        	]
        );

        DB::table('clients')->insert(
        	[
        		'title' => 'Mrs',
	            'name' => 'Jane',
	            'last_name' => 'Doe',
	            'address' => 'Street 456',
	            'zip_code' => '0987',
	            'city' => 'Lost',
	            'state' => 'CA',
	            'email' => 'j@e.com',
        	]
        );
    }
}
