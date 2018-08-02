<?php

use Illuminate\Database\Seeder;

class SeancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*************************************************************** */
    /*ce seeder permet de rentrer les prestation reel de l'entreprise*/
    /*************************************************************** */
    public function run()
    {
        DB::table('seances')->insert([
            'id'=>'1',
            'type'=>'coaching',
            'duree'=>'30',
            ]);
        DB::table('seances')->insert([
            'id'=>'2',
            'type'=>'cellum_6_20',
            'duree'=>'20',
                ]);
        DB::table('seances')->insert([
            'id'=>'3',
            'type'=>'cellum_6_30',
            'duree'=>'30',
        ]);
        DB::table('seances')->insert([
            'id'=>'4',
            'type'=>'bodysculptor',
            'duree'=>'20',
            ]);
        DB::table('seances')->insert([
            'id'=>'5',
            'type'=>'electrostimilation',
            'duree'=>'20',
            ]);
        DB::table('seances')->insert([
            'id'=>'6',
            'type'=>'pressotherapie',
            'duree'=>'20',
            ]);
    }
}
