<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
		Eloquent::unguard();
        
		User::create([	
		'name'=> 'Pippo',
		'surname'=>'Inzaghi',
		'fiscal_code'=>'PPNZG121212FRM',
		'email'=>'pippo@inzaghi.com',
		'username'=>'PippoInzaghi',
		'password'=>Hash::make('pippoinzaghi'),
		'group'=>'0'
		]);
    }

}