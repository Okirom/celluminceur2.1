
                
                    
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
                        
                        @for($i=0;$i<(count($plage)-1);$i++)
                            
                            @for($j=0;$j<(count($plage[$i]));$j++)
                            @if($plage[$i][$j]==false)
                                <td style="background-color:red;width:50px">
                            @else
                                <td style="background-color:green;width:50px">
                            @endif
                                    
                                    @if($j==0)
                                    
                                    <p><?php echo($plage[$i][$j]->format('H:i'));?></p>
                                    @else
                                    <form action="enregistrement/{{$client->id}}"method="get">
                                    
                                    <input type="hidden" name="id_abonnement"value="<?php echo($abonnement->id)?>">
                                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                    <input type="hidden"name="jour"value="{{$plage[0][0]->format('y-m-d')}}">
                                    <input type="hidden" name="dispo"value="<?php echo($plage[$i][$j]);?>">
                                    <input type="hidden" name="heure" value="<?php echo($plage[$i][0]->format('H:i'));?>">
                                    <p><?php echo($plage[$i][$j]);?></p>
                                    <input type="submit" value="reserver">
                                    </form>
                                    @endif
                                    
                                </td>
                            @endfor
                        

                        
                            <tr><tr/>
                         
                        @endfor
                        </td>
                        
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    



