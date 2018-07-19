<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use App\Client;

use App\Abonnement;
use App\Seance;
use App\Pack;
use App\Reservation;
use DateTime;

use App\ressource\views;

use App;

class AgendaController extends Controller
{
    //******************************************************************************************AGENDA**DU**MOIS***************** */
    public function showMois($id)
    {
        var_dump('grrrrrrrrrrrrrrrrrAGENDArrrrrrr');
        $client=Client::find($id);
        $jour=new DateTime;
        //$today=new DateTime($request->jour);
        $abonnements=$client->abonnements;
        //dd($abonnements);
        $reservations=[];
        foreach($abonnements as $abonnement)
            {
                $reservation=$abonnement->reservations;
                array_push($reservations,$reservation);
            }
        //$reservations=Reservation::where('jour','=',$today)->get();
        //dd($reservations,$abonnements);
        var_dump($reservations[0][0]->jour);
        $mois=[];
        $resa=[];
        $j=0;
        //$clone=clone $jour;
        //$clone->modify('+1 day');
        switch($jour->format('l'))
        {
            case 'Tuesday':
                $mois[0]="XXX";
                $j=1;
                break;
            case 'Wednesday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                
                $j=2;
                break;
            case 'Thursday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $j=3;
                break;
            case 'Friday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $j=4;
                break;
            case 'Saturday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $mois[4]="XXX";
                $j=5;
                break;
            case 'Sunday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $mois[4]="XXX";
                $mois[5]="XXX";
                $j=6;
                break;
        }
        
        for($i=0+$j;$i<31+$j;$i++)
        {
            $clone=clone $jour;
            $str="+".(string)$i-$j." "."day";
            //var_dump($str);
            $clone->modify($str);
            for($x=0;$x<count($reservations);$x++)
            {
                for($y=0;$y<count($reservations[$x]);$y++)

                {
                    $jourResa=new DateTime($reservations[$x][$y]->jour);
                    //var_dump($jourResa->format('y-m-d'),"***");
                    //var_dump($clone->format('y-m-d'));
                    if($jourResa->format('y-m-d')==$clone->format('y-m-d'))
                        $resa[$i]=true;
                    else
                        $resa[$i]=false;
                }
            }
            $mois[$i] =$clone;
        }
        //dd($resa);
        //var_dump($jour);
        //dd($mois);
        return View::make('agendaMois')
            ->with('mois',$mois)
            ->with('client',$client)
            ->with('reservations',$reservations);
            
        
    }
    //******************************************************************************************AGENDA**DU**JOUR***************** */
    public function showJour(Request $request,$id)
    {
        //var_dump('grrrrrrrrrrrrrrrrrrrrrJOURrrrrrrrrrrrrrrrrrr');
        $client=Client::find($id);
        $abonnements=$client->abonnements;
        $today=new DateTime($request->jour);
        $reservations=Reservation::where('jour','=',$today)->get();
        $plage=[];
        $ligne=[];
        $resa=[];
        $ligneResa=[];
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
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
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
        return View::make('agendaJour')
            ->with('plage',$plage)
            ->with('client',$client)
            ->with('abonnements',$abonnements)
            ->with('resa',$resa);
    }
    public function agendaReservation($id)
    {
        var_dump('grrrrrrrrrrrrrrrrrrrrrrrrrAGENDARESERVATION');
    }
}
