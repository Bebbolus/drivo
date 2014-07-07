<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
		Eloquent::unguard();
        
		User::create([	
		'email'=>'pippo@inzaghi.com',
		'username'=>'PippoInzaghi',
		'password'=>Hash::make('pippoinzaghi'),
		'group'=>'5'
		]);
    }

}