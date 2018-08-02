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
    /****************************************************** */
    /*fonction de recherche de client (alphabetique ou tous)*/
    /****************************************************** */
    public function cherche(Request $request)
    {
  
    $test=$request->test;
    $client=App\Client::where('nom','like',$test.'%')->get();
    



    return View::make('clientResultat')
            ->With('clients',$client); 
    }

    /************************************************ */
    /*fonction de recherche des abonnement d'un client*/
    /************************************************ */
    public function chercheAbonnement($id)
    {
        

            $client=App\Client::find($id);
            $abonnements=$client->abonnements;
            

        return View::make('clientAbonnement')
                ->With('abonnements',$abonnements) 
                ->With('client',$client);
                
        
    }

}
