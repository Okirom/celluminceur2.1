@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <form>
                    <input type="hidden" name="id" value="{{$client->id}}"/>
                    </form>
                    <table border=3 cellpadding=10 cellspacing=6 >
                        <tr>
                            <th>ID</th>
                            <th>NOM DU PACK</th>
                            <th>PRIX REEL</th>
                            <th>DATE D'EFFET</th>
                            
                            <th>TYPE D'ACTIVITE</th>
                            <th>NOMBRE DE SEANCE</th>
                            <th>Abonnement</th>
                            <th>Agenda</th>
                            <th>Supprimer</th>
                        </tr>
                        
                        
                        @foreach($abonnements as $abonnement)
                        
                        <tr>
                        
                            <td>{{$abonnement->id}}</td>
                            <td>{{$abonnement->pack->nom}}</td>
                            <td>{{$abonnement->prix_reel}}</td>
                            <td>{{$abonnement->date_effet}}</td>
                            
                            <td>{{$abonnement->pack->seance->type}}</td>
                            <td>{{$abonnement->pack->nombre_seance}}</td>
                            <td>
                            <form>
                                    
                                    <input type="submit"value="Abonnement"formaction="abonnement"formmethod="get">
                                    
                                </form>
                            
                            </td>
                            <td>
                                 <form>
                                    <input type="submit"value="Agenda"formaction="client/recherche/agenda/{{$client->id}}"formmethod="get">
                                    
                                </form>
                            </td>
                            <td>
                                <form>
                                <input type="submit"value="Supprimer" formaction="suppression/{{$abonnement->id}}"formmethod="get" >
                                </form>
                            </td>
                        
                        </tr>
                        
                        
                        @endforeach
                    </table><br/>
                    <form>
                        <input type="submit" value="CREER UN ABONNEMENT" formaction="abonnementClient/{{$client->id}}"formmethod="get"/> 
                    </form>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
