<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id'=>'1',
            'nom'=>'caisse',
            'prenom'=>'jean',
            'date_de_naissance'=>'11110202',
            'adresse'=>'1',
            'telephone'=>'0011223344',
            'email'=>'bre@grrrrrrr.com',
            'commentaire'=>'grrrr',
        ]);
        DB::table('clients')->insert([
            'id'=>'2',
            'nom'=>'deblues',
            'prenom'=>'agath',
            'date_de_naissance'=>'11110202',
            'adresse'=>'1',
            'telephone'=>'0011223344',
            'email'=>'bre@grrrrrrr.com',
            'commentaire'=>'grrrr',
        ]);
        DB::table('clients')->insert([
            'id'=>'3',
            'nom'=>'aze',
            'prenom'=>'helene',
            'date_de_naissance'=>'11110202',
            'adresse'=>'1',
            'telephone'=>'0011223344',
            'email'=>'bre@grrrrrrr.com',
            'commentaire'=>'grrrr',
        ]);
    }
}
