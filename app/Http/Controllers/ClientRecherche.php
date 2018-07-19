<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Client;

use App\Abonnement;
use App\Seance;
use App\Pack;

use App\ressource\views;

use App;

class ClientRecherche extends Controller
{


    public function cherche(Request $request)
    {
  
    $test=$request->test;
    $client=App\Client::where('nom','like',$test.'%')->get();
    //$client=App\Client::All();
    //dd($client);



    return View::make('clientResultat')
            ->With('clients',$client); 

    
    }

    public function chercheAbonnement($id)
    {
        /*$test=$request->test;
        $abonnement=App\Abonnement::where('nom','like',$test.'%')->get();
    //$client=App\Client::All();
    //dd($client);*/

            $client=App\Client::find($id);
            //dd($client,$id);
            $abonnements=$client->abonnements;
            //dd($abonnements);
           // foreach()
            //$packs=App\Pack::find($abonnements->pack_id);
            //dd($packs);


        return View::make('clientAbonnement')
                ->With('abonnements',$abonnements) 
                ->With('client',$client);
                
        ///var_dump('grrrrrrrrrrrrrrrrrrrrrrrr');
    }

}
