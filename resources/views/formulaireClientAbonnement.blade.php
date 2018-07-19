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
                    <form method="post"action="enregistrement/{{$client->id}}">
                    <table>
                    <tr>
                                     
                    <td>@include('vueAbonnement')</td>
                   

                    
                    </tr>
                    </table>
                    <input type="submit" value="Valider le tout"/>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection