<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App;
use App\Client;
//use View;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');//->name('home');
Route::get('/home',function(){
    $client=App\Client::All();
    return View::make('principal')
            ->With('clients',$client); 
        });


Route::get('detail','CrudController@index');

Route::get('control',function(){
    $client=App\Client::All();
    return View::make('principal')
            ->With('clients',$client);
});


//************************************************************************C.R.U.D****CLIENT */
Route::get('client/detail/{id}','CrudController@show');
Route::get('client/modifier/{id}','CrudController@edit');
Route::get('client/modifier/miseAjour/{id}','CrudController@update');
Route::get('client/nouveau','CrudController@create');
Route::get('client/enregistrement','CrudController@store');
Route::get('client/supprimer/{id}','CrudController@destroy');

//Route::resource('client','CrudController');
//************************************************************************C.R.U.D****SEANCE */

Route::resource('seance','SeanceController');
//************************************************************************C.R.U.D****PACK */
Route::resource('pack','PackController');
//************************************************************************C.R.U.D****ABONNEMENT */
Route::get('client/abonnement/abonnementClient/{id}','AbonnementController@createAbonnementClient');
Route::post('client/abonnement/abonnementClient/enregistrement/{id}','AbonnementController@storeAbonnementClient');
Route::get('client/abonnement/suppression/{id}','AbonnementController@destroyClientAbonnement');
Route::resource('abonnement','AbonnementController');

//************************************************************************PARAMETRE DE CREATION DE PRODUIT*/
Route::get('parametre',function(){
    return View::make('parametre');
});

//************************************************************************FONCTION**DE**RECHERCHE*/
Route::get('client/recherche','clientRecherche@cherche');
Route::get('client/abonnement/{id}','clientRecherche@chercheAbonnement');

//************************************************************************AGENDA*/
Route::get('client/agenda/{id}','AgendaController@showMois');
Route::get('client/agenda/jour/{id}','AgendaController@showJour');
//Route::get('client/agenda/jour/reservation/{id}','AgendaController@agendaReservation');

//************************************************************************RESERVATION*/
//Route::post('client/agenda/jour/reservation/{id}','ReservationController@dispo');
Route::get('client/agenda/jour/reservation/{id}','ReservationController@dispo');
Route::get('client/agenda/jour/reservation/enregistrement/{id}','ReservationController@enregistrement');
