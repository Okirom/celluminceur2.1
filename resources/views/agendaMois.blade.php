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
                    <table border=3 cellpadding=10 cellspacing=6>
                    <tr>
                        <th>LUNDI</th>
                        <th>MARDI</th>
                        <th>MERCREDI</th>
                        <th>JEUDI</th>
                        <th>VENDREDI</th>
                        <th>SAMEDI</th>
                        <th>DIMANCHE</th>
                    </tr>
                    <tr>
                    @for($i=0;$i<(count($mois)-1);$i++)
                            @if($mois[$i]=="XXX")
                            
                            <td style="background-color:blue;"><form><p>XXX</p></form></td>
                            
                            
                            @else
                       
                                @if($resa[$i]==false)
                                <td style="background-color:green;">
                                    <form action="jour/{{$client->id}}"formmethod="get">
                                    <input type="hidden"name="jour"value="{{$mois[$i]->format('y-m-d')}}">
                                    <p><?php echo($mois[$i]->format('l/m'))?></p>
                                    <input type="submit"  value="JOUR">
                                    </form>
                                </td>
                                @else
                                <td style="background-color:red;">
                                    <form action="jour/{{$client->id}}"formmethod="get">
                                    <input type="hidden"name="jour"value="{{$mois[$i]->format('y-m-d')}}">
                                    <p><?php echo($mois[$i]->format('l/m'))?></p>
                                    <input type="submit"  value="JOUR">
                                    </form>
                                </td>
                                @endif
                            

                            @endif
                            @if(($i+1)%7==0)
                            <tr><tr/>
                            @endif
                        
                    @endfor
                    </tr>
                    </table>
                    




                </div>
            </div>
        </div>
    </div>
</div>
@endsection