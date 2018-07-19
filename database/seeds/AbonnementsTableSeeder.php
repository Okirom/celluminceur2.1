<?php

use Illuminate\Database\Seeder;

class AbonnementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abonnements')->insert([
            'id'=>'1',
            'nom'=>'premium',
            'prix_reel'=>'150',
            'date_effet'=>'20180202',
            'client_id'=>'1',
            'pack_id'=>'1',
            
        ]);
        DB::table('abonnements')->insert([
            'id'=>'2',
            'nom'=>'premium2',
            'prix_reel'=>'200',
            'date_effet'=>'20180302',
            'client_id'=>'1',
            'pack_id'=>'2',
            
        ]);
        DB::table('abonnements')->insert([
            'id'=>'3',
            'nom'=>'premiumX',
            'prix_reel'=>'300',
            'date_effet'=>'20180402',
            'client_id'=>'3',
            'pack_id'=>'3',
            
        ]);
    }
}
