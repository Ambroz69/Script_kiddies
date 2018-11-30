<form method="post" action="{{ route('filter') }}">
    @csrf
    BIG FILTER
    <div class="row">
        <div class="form-group col-md-12">
            <label for="description">Nadpis:</label>
            <input id="description"type="text" class="form-control" name="description" placeholder="Nadpis inzerátu"
                   value="{{ $filter_data['description'] }}">
        </div>
    </div>
    <label for="price">Cena:</label>
    <div class="row">
        <div id="price" class="form-group col-md-6 float-left">
            <input id="price_min" type="number" class="form-control" name="price_min" placeholder="od"
                   value="{{ $filter_data['price_min'] }}">
        </div>
        <div class="form-group col-md-6 float-right">
            <input id="price_max" type="number" class="form-control" name="price_max" placeholder="do"
                   value="{{ $filter_data['price_max'] }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="category">Kategória:</label>
            <select name="category" id="category" class="form-control">
                <option value="" @php if(strcmp($filter_data['category'],'') == 0) echo 'selected';@endphp></option>
                <option value="predaj" @php if(strcmp($filter_data['category'],'predaj') == 0) echo 'selected';@endphp>predaj</option>
                <option value="prenájom" @php if(strcmp($filter_data['category'],'prenájom') == 0) echo 'selected';@endphp>prenájom</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="city">Mesto:</label>
            <input id="city" type="text" class="form-control" name="city" placeholder="Mesto"
                   value="{{ $filter_data['city'] }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="property_type">Druh nehnuteľnosti:</label>
            <select name="property_type" id="property_type" onchange="displayMoreOptions()" class="form-control">
                <option value="" @php if(strcmp($filter_data['property_type'],'') == 0) echo 'selected';@endphp></option>
                <option value="byt" @php if(strcmp($filter_data['property_type'],'byt') == 0) echo 'selected';@endphp>byt</option>
                <option value="dom" @php if(strcmp($filter_data['property_type'],'dom') == 0) echo 'selected';@endphp>dom</option>
                <option value="pozemok" @php if(strcmp($filter_data['property_type'],'pozemok') == 0) echo 'selected';@endphp>pozemok</option>
            </select>
        </div>
    </div>

    <div id="byt" style="display: none"> <!-- MOZNOSTI PRE BYT -->
        <label for="area">Výmera (m<sup>2</sup>):</label>
        <div class="row">
            <div id="area" class="form-group col-md-6 float-left">
                <input id="area_min" type="number" class="form-control" name="area_min" placeholder="od">
            </div>
            <div class="form-group col-md-6 float-right">
                <input id="area_max" type="number" class="form-control" name="area_max" placeholder="do">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="room_count">Počet izieb:</label>
                <input id="room_count" type="number" class="form-control" name="room_count">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="floor">Poschodie:</label>
                <input id="floor" type="number" class="form-control" name="floor" value="pre prízemie zadajte 0">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="type">Typ nehnuteľnosti:</label>
                <select name="type" id="type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="window_type">Okná:</label>
                <select name="window_type" id="window_type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['window_type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="direction">Orientácia:</label>
                <select name="direction" id="direction" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['direction'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="heating">Vykurovanie:</label>
                <select name="heating" id="heating" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['heating'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="internet">Internet:</label>
                <select name="internet" id="internet" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['internet'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="balcony">Balkón:</label>
                <select name="balcony" id="balcony" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="cellar">Pivnica:</label>
                <select name="cellar" id="cellar" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="garage">Garáž:</label>
                <select name="garage" id="garage" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="insulated">Zateplený:</label>
                <select name="insulated" id="insulated" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
    </div>

    <div id="dom" style="display: none"> <!-- MOZNOSTI PRE DOM -->
        <div class="row">

        </div>
    </div>

    <div id="pozemok" style="display: none"> <!-- MOZNOSTI PRE POZEMOK -->
        <div class="row">

        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary btn-block text-white float-right">Filtrovať</button>
        </div>
    </div>
</form>

<script>
    function displayMoreOptions() {
        var type_selected = document.getElementById("property_type").value;
        if (type_selected.localeCompare("dom") === 0) {
            document.getElementById("byt").style.display = 'none';
            document.getElementById("dom").style.display = 'block';
            document.getElementById("pozemok").style.display = 'none';
        }
        if (type_selected.localeCompare("byt") === 0) {
            document.getElementById("byt").style.display = 'block';
            document.getElementById("dom").style.display = 'none';
            document.getElementById("pozemok").style.display = 'none';
        }
        if (type_selected.localeCompare("pozemok") === 0) {
            document.getElementById("byt").style.display = 'none';
            document.getElementById("dom").style.display = 'none';
            document.getElementById("pozemok").style.display = 'block';
        }
        if (type_selected.localeCompare("") === 0) {
            document.getElementById("byt").style.display = 'none';
            document.getElementById("dom").style.display = 'none';
            document.getElementById("pozemok").style.display = 'none';
        }
    }
</script>