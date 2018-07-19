

                    @if($errors->any())
                    <div>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </div> 
                    @endif

                    <form methode="POST" action="enregistrement">
                    @include('vueClient')
                        <input type="submit" name="Valider" >
                        <input type="reset" name="Annuler" >
                        <input type="submit" value="MAJ"formaction="miseAjour/{{$client->id}}"formmethode="GET">
                    </form>
             