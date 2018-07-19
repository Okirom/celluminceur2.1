<table border=3 cellpadding=10 cellspacing=6 >
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>TELEPHONE</th>
                            <th>EMAIL</th>
                            <th>Détail</th>
                            <th>Modifier</th>
                            <th>Abonnement</th>
                            <th>Agenda</th>
                            <th>Supprimer</th>
                        </tr>
                        
                        
                        @foreach($clients as $client)
                        
                        <tr>
                        
                            <td>{{$client->id}}</td>
                            <td>{{$client->nom}}</td>
                            <td>{{$client->prenom}}</td>
                            <td>{{$client->telephone}}</td>
                            <td>{{$client->email}}</td>
                            <td> 
                            <form>
                                    <input type="submit"value="Détail"formaction="detail/{{$client->id}}"formmethod="get">
                            </form>
                            </td>
                            <td>
                            <form>
                                    <input type="submit"value="Modifier"formaction="modifier/{{$client->id}}"formmethod="get">
                                    
                            </form>
                            
                            </td>
                            <td>
                            <form>
                                    
                                    <input type="submit"value="Abonnement"formaction="abonnement/{{$client->id}}"formmethod="get">
                                    
                                </form>
                            
                            </td>
                            <td>
                                 <form>
                                    <input type="submit"value="Agenda"formaction="agenda/{{$client->id}}"formmethod="get">
                                    
                                </form>
                            </td>
                            <td>
                                <form>
                                <input type="submit"value="Supprimer" formaction="supprimer/{{$client->id}}"formmethod="get" >
                                </form>
                            </td>
                        
                        </tr>
                        
                        
                        @endforeach
                    </table><br/>
                   