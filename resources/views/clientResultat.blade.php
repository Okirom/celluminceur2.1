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

                 

                    
             

                    <p>Rechercher par Nom :</p>
                            <form methode="GET" action="recherche">
                                <input type="text" name="test" value=""> 
                                <input type="submit" name="cherche" > 
                            </form><br/>
                        
                    
                    
                    @include('clientTableau')
                    <form  methode="GET">
                    <input name="nouveau" type="submit" value="Nouveau" formaction="nouveau">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection