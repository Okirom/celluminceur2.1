
                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                        <p>Veuillez entrer le nom</p>
                        <input type="hidden" name="id" value=<?php echo $client->id;?>>
                        <input type="text" name="nom" value=<?php echo $client->nom;?>>
                        <p>Le prénom</p>
                        <input type="text" name="prenom" value=<?php echo $client->prenom ; ?>>
                        <p>Date de naissance</p>
                        <input type="text" name="date_de_naissance" value=<?php echo $client->date_de_naissance ; ?>>
                        <p>Les coordonnées , l'adresse</p>
                        <textarea name="adresse" rows="3" cols="40" value="<?php echo $client->adresse;?>"><?php echo $client->adresse;?></textarea></br>
                        <p>Le telephone</p>
                        <input type="text" name="telephone" value=<?php echo $client->telephone; ?>>
                        <p>Ainsi que l'e-mail</p>
                        <input type="text" name="email" value=<?php echo $client->email ; ?>>
                        <p>Commentaire sur le client</p>
                        <textarea name="commentaire" rows="6" cols="40" value="<?php echo $client->commentaire;?>"><?php echo $client->commentaire;?></textarea></br>
                    