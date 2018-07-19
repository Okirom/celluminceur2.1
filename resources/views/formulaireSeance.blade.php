

                     @if($errors->any())
                    <div>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </div> 
                    @endif
                    <form method="POST" action="{{route('seance.store')}}">
                        @include('vueSeance')
                        <input type="submit" name="Valider" >
                        <input type="reset" name="Annuler" >
                        <input type="submit" value="MAJ"formaction=""formmethode="GET">
                    </form>
             