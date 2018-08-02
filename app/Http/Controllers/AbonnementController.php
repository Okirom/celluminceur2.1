<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Abonnement;
use App\Seance;
use App\Pack;
use App;
use DB;

use App\ressource\views;
use Illuminate\Support\Facades\View;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abonnement=new Abonnement;
        return View::make('formulaireAbonnement')
            ->with('abonnement',$abonnement);
    }
    public function createAbonnementClient($id)
    {
        $client=Client::find($id);
        $abonnement=new Abonnement;
        //$abonnement->client_id=$id;
        //$abonnement->save();
        $packs=Pack::all();
        return View::make('formulaireClientAbonnement')
            ->with('abonnement',$abonnement)
            ->with('client',$client)
            ->with('packs',$packs);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAbonnementClient(Request $request,$id)
    {
        var_dump($request->nom_pack);
        var_dump($id);
        $pack=Pack::where('nom','=',$request->nom_pack)->first();
        $client=Client::find($id);
        //$abonnement=new Abonnement;
        //$pack_id=DB::select('SELECT id FROM packs WHERE nom=?',[$request->nom_pack]);
        $abonnement=new Abonnement;
        $abonnement->pack_id=$pack->id;
        $abonnement->client_id=$id;
        $abonnement->nom=$request->nom_abonnement;
        $abonnement->prix_reel=$request->prix_reel;
        $abonnement->date_effet=$request->date_effet;
        $abonnement->save();
        $abonnements=$client->abonnements;
        //$abonnement->save();
        return redirect('control');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $abonnement=new Abonnement;
        $abonnement->nom=$request->input('nom');
        
        $abonnement->prix_reel=$request->input('prix_reel');
        $abonnement->date_effet=$request->input('date_effet');
        $abonnement->pack_id=1;
        $abonnement->client_id=7;
        $abonnement->save();
        return View::make('parametre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function destroyClientAbonnement($id)
    {
        var_dump('ou yeah!!!!!');
        
        $abonnement=Abonnement::find($id);
        $client_id=$abonnement->client;
        $id=$client_id;
        $client=Client::find($id)->first();
        $abonnements=$client->abonnements;
        //dd($client);
        //var_dump($client);
        $abonnement->delete();
        

        return redirect('control');
    }
}
