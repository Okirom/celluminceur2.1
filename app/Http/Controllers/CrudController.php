<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Abonnement;


use App\Seance;
use App\Pack;

use App\ressource\views;
use Illuminate\Support\Facades\View;

/*********** */
/*CRUD client*/
/*********** */
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            
                return 'ggggggggggggr';

            
            
            
    
    }
        
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client=new Client;
    //$client=Client::find(1);
    return View::make('formulaireClient')
            ->With('client',$client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['nom'=>'required']);
        $client=new Client;
        $client->nom=$request->nom;
        $client->prenom=$request->prenom;
        $client->date_de_naissance=$request->date_de_naissance;
        $client->adresse=$request->adresse;
        $client->telephone=$request->telephone;
        $client->email=$request->email;
        $client->commentaire=$request->commentaire;
        $client->save();

        return redirect('control');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $client=Client::find($id);
        return View::make('formulaireClient')
                ->With('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     
     
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $id=$request->id;
        $client=Client::find($id);
        return View::make('formulaireClient')
                ->With('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client=Client::find($id);
        $client->nom=$request->nom;
        $client->prenom=$request->prenom;
        $client->prenom=$request->prenom;
        $client->adresse=$request->adresse;
        $client->telephone=$request->telephone;
        $client->email=$request->email;
        $client->save();

        return redirect('control');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $client->delete();
        return redirect('control');
                
    }
}
