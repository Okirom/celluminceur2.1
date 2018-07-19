<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Abonnement;
use App\Seance;
use App\Pack;
use App\Http\Requests\SeanceRequest;

use App\ressource\views;
use Illuminate\Support\Facades\View;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        var_dump('grrrrrrrrrrrrrrINDEXrrrrrrrrrr');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seance=new Seance;
        return View::make('formulaireSeance')
            ->with('seance',$seance);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    public function store(SeanceRequest $request)
    {
        //$name=$request->input('name');
        
        //Seance::ceate($request->all());
        $seance=new Seance;
        $seance->type=$request->input('nom');
        $seance->duree=$request->input('duree');
        $seance->save();
        dd($seance);
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
        var_dump('grrrrrrrrrrrrrrShowrrrrrrrrrr');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        var_dump('grrrrrrrrrrrrrrEDITrrrrrrrrrr');
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
        var_dump('grrrrrrrrrrrrrrUPDATErrrrrrrrrr');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump('grrrrrrrrrrrrrrDESTROYrrrrrrrrrr');
    }
}
