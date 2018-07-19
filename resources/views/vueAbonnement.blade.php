                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                        <p>Choisissez votre pack : </p>
                        <select name="pack">
                        <input list="pack"name="nom_pack">
                        <datalist id="pack">
                        @foreach($packs as $pack)
                        <option value="{{$pack->nom}}">
                        @endforeach
                        </datalist>
                        
                        </select>
                        <p>Prix reel payé</p>
                        <input type="nombre" name="prix_reel" value="">
                        <p>Date d'effet</p>
                        <input type="nombre" name="date_effet" value=""></br>