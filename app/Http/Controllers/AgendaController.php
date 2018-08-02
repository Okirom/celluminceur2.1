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
    /******************************************************************************************AGENDA**DU**MOIS***************** */
    /*affichage du mois à partir de la date machine du jours + affichage des jours réservés du client*/
    /******************************************************************************************AGENDA**DU**MOIS***************** */

    public function showMois($id)
    {
        //déclaration

        $client=Client::find($id);
        $jour=new DateTime;
        $abonnements=$client->abonnements;
        $mois=[];
        $resa=[];
        $j=0;
        
        /*********************************************************************** */
        /*tableau de réservations pour chaque abonnement => tableau à 2 dimension*/
        /*********************************************************************** */

        $reservations=[];
        foreach($abonnements as $abonnement)
            {
                $reservation=$abonnement->reservations;
                array_push($reservations,$reservation);
            }

        /****************************** */
        /*controle réservation du client*/
        //dd($reservations);
        /****************************** */
     

      
        /************************************************************************** */
        /*gestion du début du tableau pour faire corespondre les jours de la semaine*/
        /************************************************************************** */

        switch($jour->format('l'))
        {
            case 'Tuesday':
                $mois[0]="XXX";
                $resa[0]=false;
                $j=1;
                break;
            case 'Wednesday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $resa[0]=false;
                $resa[1]=false;
                $j=2;
                break;
            case 'Thursday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $resa[0]=false;
                $resa[1]=false;
                $resa[2]=false;
                $j=3;
                break;
            case 'Friday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $resa[0]=false;
                $resa[1]=false;
                $resa[2]=false;
                $resa[3]=false;
                $j=4;
                break;
            case 'Saturday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $mois[4]="XXX";
                $resa[0]=false;
                $resa[1]=false;
                $resa[2]=false;
                $resa[3]=false;
                $resa[4]=false;
                $j=5;
                break;
            case 'Sunday':
                $mois[0]="XXX";
                $mois[1]="XXX";
                $mois[2]="XXX";
                $mois[3]="XXX";
                $mois[4]="XXX";
                $mois[5]="XXX";
                $resa[0]=false;
                $resa[1]=false;
                $resa[2]=false;
                $resa[3]=false;
                $resa[4]=false;
                $resa[5]=false;
                $j=6;
                break;
        }
        
        /************************************************************* */
        /*remplissage du tableau mois pour 30 jour + les XXX de la date*/
        /*initialisation du tableau résa à false*/
        /************************************************************* */

        for($i=0+$j;$i<31+$j;$i++)
        {
            $clone=clone $jour;
            $str="+".(string)$i-$j." "."day";
            $clone->modify($str);
            $resa[]=false;
            $mois[$i] =$clone;
        }

        /************************************ */
        /*controle de l'initialisation de résa*/
        //dd($resa);
        /************************************ */



        /****************************************************************** */
        /*comparaison des dates de réservation avec les date du mois calculé*/
        /****************************************************************** */
        for($x=0;$x<count($reservations);$x++)
            {
                for($y=0;$y<count($reservations[$x]);$y++)
                {
                    $jourResa=new DateTime($reservations[$x][$y]->jour);
                    
                    for($z=0;$z<count($mois);$z++)
                    {

                        $test=$mois[$z];
                        if($test!="XXX")
                        
                        
                        {
                        if($jourResa->format('y-m-d')==$test->format('y-m-d'))
                        {
                            $resa[$z]=true;
                            
                        }
                        }
                       
                       
                        
                    
                    }
                }
            }


        /*************************************** */
        /*controle préparation des données de vue*/
        //dd($resa,$mois);
        //dd($mois);
        /*************************************** */



        /******************** */
        /*lancement de la vue */
        return View::make('agendaMois')
            ->with('mois',$mois)
            ->with('client',$client)
            ->with('resa',$resa);
           //test//
        
    }
    //******************************************************************************************AGENDA**DU**JOUR***************** */
    /*affichage du détail jour avec les réservations du jour*/
    //******************************************************************************************AGENDA**DU**JOUR***************** */
    public function showJour(Request $request,$id)
    {
        /*déclaration*/
        $client=Client::find($id);
        $abonnements=$client->abonnements;
        $today=new DateTime($request->jour);
        $reservations=Reservation::where('jour','=',$today)->get();

        /************************************************************ */
        /*controle de la récupération des réservation du jour concerné*/
        //dd($reservations);
        /************************************************************ */
        
        $plage=[];
        $ligne=[];
        $resa=[];
        $ligneResa=[];
        $h=9;
        $m=0;
        $heure=new Datetime($request->jour);
        $heure->setTime(8,55);
        /******************************************************************************************************/
        /*remplissage du tableau à 2 dimension des plage libre ou réservé en fonction des préstation proposées*/
        /******************************************************************************************************/
        /************************************************ */
        /*premier tableau : création des plages horraires */
        for($i=0;$i<125;$i++)
        {
            /********************************************************** */
            /*enregistrement de la disponnibilité pour chaque préstation*/
            /*enregistrement du nom associé*/
            /********************************************************** */
            for($j=0;$j<6;$j++)
            {
                

                switch($j)
                    {
                        case 0:
                         
                            $clone=clone $heure;
                            $m=$m+5;
                            $str="+".(string)$m." "."minutes";
                            $clone->modify($str);
                            $ligne[$j]=$clone;
                            break;

                        case 1:
                            $dispo=[];
                            $dispo[0]=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="coaching")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;

                        case 2:
                            $dispo=[];
                            $dispo[0]=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="cellum_6_30")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                                if($reservation->abonnement->pack->seance->type=="cellum_6_20")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 3:
                            $dispo=[];
                            $dispo[0]=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="bodysculptor")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 4:
                            $dispo=[];
                            $dispo[0]=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="pressotherapie")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 5:
                            $dispo=[];
                            $dispo[0]=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="electrostimilation")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                {
                                $dispo[0]=false;
                                $dispo[1]=$reservation->abonnement->client->nom;
                                }
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                                
                    }
            }
            
            $plage[$i]=$ligne;
        }
        /************************************************** */
        /*controle du chargement du tableau multidimentionel*/
        //dd($plage[0][0][0]);
        //dd($plage);
        /************************************************** */


        /*lancement de la vue détail du jour*/
        return View::make('agendaJour')
            ->with('plage',$plage)
            ->with('client',$client)
            ->with('abonnements',$abonnements);
            
    }
    public function agendaReservation($id)
    {
        var_dump('grrrrrrrrrrrrrrrrrrrrrrrrrAGENDARESERVATION');
    }
}
