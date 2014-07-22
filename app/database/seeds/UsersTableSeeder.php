<?php
class UsersTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
		Eloquent::unguard();
        
		User::where('id', '>', 0)->delete();
		
		User::create([	
		'email'=>'pippo@inzaghi.com',
		'username'=>'PippoInzaghi',
		'password'=>Hash::make('pippoinzaghi'),
		'id_school'=>'1',
		'group'=>'5'
		]);
		
		User::create([
		'email'=>'user@user.com',
		'username'=>'user',
		'password'=>Hash::make('password'),
		'id_school'=>'1',
		'group'=>'1'
				]);
    }

}