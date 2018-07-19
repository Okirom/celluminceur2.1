<?php

use Illuminate\Database\Seeder;

class PacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packs')->insert([
            'id'=>'1',
            'nom'=>'Unite',
            'prix'=>'36',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'1',
            'seance_id'=>'1',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'2',
            'nom'=>'Coaching_10',
            'prix'=>'320',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'10',
            'seance_id'=>'1',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'3',
            'nom'=>'Coaching_20',
            'prix'=>'560',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'20',
            'seance_id'=>'1',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'4',
            'nom'=>'Coaching_50',
            'prix'=>'1300',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'50',
            'seance_id'=>'1',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'5',
            'nom'=>'Mensuel',
            'prix'=>'25',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'1',
            'seance_id'=>'1',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'6',
            'nom'=>'Cellum_6_20m',
            'prix'=>'369',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'12',
            'seance_id'=>'2',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'7',
            'nom'=>'Cellum_6_30m',
            'prix'=>'585',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'12',
            'seance_id'=>'3',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'8',
            'nom'=>'Unite_bodysculptor',
            'prix'=>'49',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'1',
            'seance_id'=>'4',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'9',
            'nom'=>'Unite_electrostimulation',
            'prix'=>'26',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'1',
            'seance_id'=>'5',
            
        ]);
        DB::table('packs')->insert([
            'id'=>'10',
            'nom'=>'Unite_pressotherapie',
            'prix'=>'10',
            'annee'=>'2018.01.01',
            'nombre_seance'=>'1',
            'seance_id'=>'6',
            
        ]);
        
    }
}
