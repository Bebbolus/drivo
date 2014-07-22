<?php
class SchoolsTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
		Eloquent::unguard();
        
		School::where('id', '>', 0)->delete();
		
		School::create([	
		'name' => 'ScuolaDiProva',
		'email'=>'prova@test.com',
		'phone'=>'3284029195',
		'fax'=>'+39.3284029195'
		]);
    }

}