
                   
                    <form method="POST" action="{{action('PackController@store')}}">
                        @include('vuePack')
                        <input type="submit" name="Valider" >
                        <input type="reset" name="Annuler" >
                        <input type="submit" value="MAJ"formaction=""formmethode="GET">
                    </form>
                 