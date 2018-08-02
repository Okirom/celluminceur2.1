
                
                    
                    <table >
                    <tr>
                    <td style"width:200px">
                    <table border=1 cellpadding=1 cellspacing=0 >
                    <tr>
                        <th>HORAIRE</th>
                        <th style="width:10px">COACHING</th>
                        <th>CELLUM6</th>
                        <th>BODYSCULPTOR</th>
                        <th>PRESSOTHERAPIE</th>
                        <th>ELECTROSTIMULATION</th>
                        
                    </tr>
                    <tr>
                    <td></td>
                    @for($i=0;$i<5;$i++)
                    <th>
                    
               
                    
                    <form action="reservation/{{$client->id}}"method="get">
                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                        <input type="hidden"name="jour"value="{{$plage[0][0]->format('y-m-d')}}">
                            
                                <input list="idabonnement"name="id_abonnement">
                                    <datalist id="idabonnement">
                                    @foreach($abonnements as $abonnement)
                                    <option  value="{{$abonnement->id}}">{{$abonnement->pack->nom}}</option>
                                    @endforeach   
                                    </datalist> 
                            
                        <input type="submit"value="disponnibilité">
                    </form>
                    
                    
                    </th>
                    @endfor
                    </tr>
                    <tr>
                        
                        @for($i=0;$i<(count($plage)-1);$i++)
                            
                            @for($j=0;$j<(count($plage[$i]));$j++)
                            @if($plage[$i][$j]==false)
                                <td style="background-color:red;width:50px">
                            @else
                                <td style="background-color:blue;width:50px">
                            @endif

                                
                                    <form action="reservation"method="get">
                                    @if($j==0)
                                    <p><?php echo($plage[$i][$j]->format('H:i'));?></p>
                                    @else
                                    <p><?php echo($plage[$i][$j]);?></p>
                                    @endif
                                    </form>
                                </td>
                            @endfor
                        

                        
                            <tr><tr/>
                         
                        @endfor
                        </td>
                        
                    </tr>
                    </td>
                    </tr>
                    </table>
                    



