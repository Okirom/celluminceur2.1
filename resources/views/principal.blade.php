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

                    
                   


                    <p>Gestion des parametre de produit</p>
                            <form methode="GET" action="parametre">
                                <input type="submit" name="cherche" value="Parametre" > 
                            </form><br/>                

                    
             

                    <p>Rechercher par Nom :</p>
                            <form methode="GET" action="client/recherche">
                                <input type="text" name="test" value=""> 
                                <input type="submit" name="cherche" > 
                            </form><br/>
                        
                    
                    
                    
                    <input name="nouveau" type="button" value="NOUVEAU CLIENT" onclick="self.location='client/nouveau'">
                    <input name="agenda" type="button" value="AGENDA" onclick="self.location='client/nouveau'">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection