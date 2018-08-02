<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Abonnement;
use App\Seance;
use App\Pack;
use App\Reservation;
use App;
use DB;
use DateTime;

use App\ressource\views;
use Illuminate\Support\Facades\View;

class ReservationController extends Controller
{
    public function dispo(Request $request,$id)
    {
        var_dump('grrrrrrrrRESArrrrrrrrrrrrrrrrr');
        //$reservation=Reservation::where()
        $abonnement=Abonnement::find($request->id_abonnement);
        $today=new DateTime($request->jour);
        $reservations=Reservation::where('jour','=',$today)->get();
        //dd($reservations);
        //dd($abonnement->pack->seance->duree);
        //var_dump($today);
        //var_dump($abonnement);
        //var_dump($reservations);
        //dd($request);
       
       
            //var_dump('grrrrrrrrrrrrrrrrrrrrrJOURrrrrrrrrrrrrrrrrrr');
            $client=Client::find($id);
            $abonnements=$client->abonnements;
            $plage=[];
            $ligne=[];
            $resa=[];
            $ligneResa=[];
            $dispo=true;
            $h=9;
            $m=0;
            $heure=new Datetime($request->jour);
            $heure->setTime(9,0);
            //$heure=$h.":".$m;
            $ligne[0]=$heure;
            $ligne[1]="test";
            $ligne[2]="lalalala";
            $ligne[3]="et c'est partie";
            $ligne[4]="c'est bon ça";
            $ligne[5]="et voilà de la date";
            $plage[0]=$ligne;
            //$heure->modify("+5 minute");
            //dd($heure);
            for($i=1;$i<125;$i++)
            {
                
    
                for($j=0;$j<6;$j++)
                {
                    
    
                    switch($j)
                        {
                            case 0:
                                /*$m=$m+5;
                                $heure=$h.":".$m;
                                if(($i)%12==0)
                                {
                                    $h=$h+1;
                                    $m=0;
                                    $heure=$h.":".$m;
                                    $ligne[$j]=$heure;
                                    break;
                                }*/
                                $clone=clone $heure;
                                $m=$m+5;
                                $str="+".(string)$m." "."minutes";
                                $clone->modify($str);
                                $ligne[$j]=$clone;
                                
                                //$resa[$j]=$clone;
                                break;
                            case 1:
                                foreach($reservations as $reservation)
                                {
                                    $dispo=true;
                                    if($reservation->abonnement->pack->seance->type=="coaching")
                                    {
                                        //$clone1=clone $heure;
                                        //$m=$m+5;
                                        //$str="+".(string)$m." "."minutes";
                                        //$clone1->modify($str);
                                        $hd=new DateTime($reservation->heure_debut);
                                        $hf=new DateTime($reservation->heure_fin);
                                        //var_dump($clone,$hd,$hf);
                                        //var_dump($clone<$hf,"***********",$clone,"***********",$hf);
                                        //var_dump($clone>$hd,"***********",$clone,"***********",$hd);
                                        //dd($reservation->heure_fin);
                                        if(  $clone<=$hf and $clone>=$hd)
                                        $dispo=false;
                                    }
                                   
                                }
                                $ligne[$j]=$dispo;
                                break;
                            case 2:
                                $ligne[$j]="arrgggh";
                                break;
                            case 3:
                                $ligne[$j]="test";
                                break;
                            case 4:
                                $ligne[$j]="*****";
                                break;
                            case 5:
                                $ligne[$j]=".....";
                                break;
                                    
                        }
                }
                //$resa[$i]=$ligneResa;
                $plage[$i]=$ligne;
            }
            //dd($resa);
            //dd($plage);
            return View::make('agendaJourDispo')
                ->with('plage',$plage)
                ->with('client',$client)
                ->with('abonnements',$abonnements)
                ->with('resa',$resa)
                ->with('abonnement',$abonnement);
        }
    
        public function enregistrement(Request $request, $id)
        {
            var_dump("YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYAAAAAAAAAAAAAAAAAAAAAAAAAAAH");
            $reservation=new Reservation;
            $abonnement=Abonnement::find($request->id_abonnement);
            $heure=new Datetime($request->heure);
            $heure->modify((string)$request->jour);
            $jour=new DateTime($request->jour);
            $reservation->abonnement_id=$request->id_abonnement;
            $reservation->jour=$jour;
            $reservation->heure_debut=$heure;
            $clone=clone $heure;
            
            //$heure->setTime(9,0);
            $reservation->heure_fin=$clone->modify("+".(string)$abonnement->pack->seance->duree." "."minutes");
            $reservation->etat="actif";
            $reservation->save();
            //dd($reservation);
            //dd($request);
            var_dump("******************SAUVEGARDE");
        }
}
