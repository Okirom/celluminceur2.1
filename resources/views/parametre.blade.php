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

                    
                    

                    <p>Gestion des parametre de produit</p><br/>

                    <table border=3 cellpadding=10 cellspacing=6>
                        <tr>
                            
                            <td>
                            <form method="GET" action="{{action('SeanceController@create')}}">
                                <input type="submit" name="creer" value="CREER UNE NOUVELLE SEANCE">
                            </form>
                            </td>
                            
                            <td><form methode="GET" action="supprimer">
                                <input type="submit" name="parametre" value="LISTE DES SEANCES">
                            </form></td>
                        </tr>
                        <tr>
                            
                            <td>
                            <form methode="GET" action="{{action('PackController@create')}}">
                                <input type="submit" name="creer" value="CREER UN NOUVEAU PACK">
                            </form>
                            </td>
                            <td><form methode="GET" action="supprimer">
                                <input type="submit" name="parametre" value="LISTE DES PACKS">
                            </form></td>
                        </tr>
                       
                    </table>
                  
                    <input name="menu_principal" type="button" value="MENU PRINCIPAL" onclick="self.location='control'">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection