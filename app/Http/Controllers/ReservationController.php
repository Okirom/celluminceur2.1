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
    /**************************** */
    /*affichage des disponibilités*/
    /**************************** */
    public function dispo(Request $request,$id)
    {
            
        /*********** */
        /*déclaration*/
        /*********** */
        $abonnement=Abonnement::find($request->id_abonnement);
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
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="coaching")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;

                        case 2:
                           
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="cellum_6_30")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
                                }
                                if($reservation->abonnement->pack->seance->type=="cellum_6_20")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 3:
                           
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="bodysculptor")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 4:
                           
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="pressotherapie")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
                                }
                           
                            }
                            $ligne[$j]=$dispo;
                            break;
                            
                        case 5:
                            
                            $dispo=true;
                            foreach($reservations as $reservation)
                            {
                                
                                if($reservation->abonnement->pack->seance->type=="electrostimilation")
                                {
                                $hd=new DateTime($reservation->heure_debut);
                                $hf=new DateTime($reservation->heure_fin);
                                if(  $clone<=$hf and $clone>=$hd)
                                $dispo=false;
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
        //dd($plage);
        /************************************************** */


        /********************************************** */
        /*lancement de la vue détail du jour réservation*/
        
        return View::make('agendaJourDispo')
                ->with('plage',$plage)
                ->with('client',$client)
                ->with('abonnements',$abonnements)
                ->with('resa',$resa)
                ->with('abonnement',$abonnement);
            
    }

        /********************************************** */
        /*sauvegarde de la réservation en base de donnée*/
        /********************************************** */
        public function enregistrement(Request $request, $id)
        {
            
            $reservation=new Reservation;
            $abonnement=Abonnement::find($request->id_abonnement);
            $heure=new Datetime($request->heure);
            $heure->modify((string)$request->jour);
            $jour=new DateTime($request->jour);
            $reservation->abonnement_id=$request->id_abonnement;
            $reservation->jour=$jour;
            $reservation->heure_debut=$heure;
            $clone=clone $heure;
            $reservation->heure_fin=$clone->modify("+".(string)$abonnement->pack->seance->duree." "."minutes");
            $reservation->etat="actif";
            $reservation->save();

            /*********************************************************** */
            /*controle de l'affectation des champs de l'objet réservation*/
            dd($reservation);
            /*********************************************************** */
            
            
        }
}
