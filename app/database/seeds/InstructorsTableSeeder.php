<?php
class InstructorsTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
		Eloquent::unguard();
        		
		Instructors::where('id', '>', 0)->delete();
		
		Instructors::create([
			'name'=>'NomeIstr',
			'surname'=>'CognIstr',
			'fiscal_code'=>'IISIASDKAS09',
			'email'=>'istruttore@scuola.it',
			'id_school'=>'1',
			'created_at'=>'2014-07-09 13:22:14',
			'updated_at'=>'2014-07-09 13:22:14'
		]);
    }

}