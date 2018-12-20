<form method="post" id="myform" action="{{ route('filter') }}">
    @csrf

    <div class="row">
        <div class="form-group col-md-12">
            <label for="description">Nadpis:</label>
            <input id="description" type="text" class="form-control" name="description" placeholder="Nadpis inzerátu"
                   value="{{ $filter_data['description'] }}">
        </div>
    </div>
    <label for="price">Cena:</label>
    <div class="row">
        <div id="price" class="form-group col-md-6 float-left">
            <input id="price_min" type="number" min="0" class="form-control" name="price_min" placeholder="od"
                   value="{{ $filter_data['price_min'] }}">
        </div>
        <div class="form-group col-md-6 float-right">
            <input id="price_max" type="number" min="0" class="form-control" name="price_max" placeholder="do"
                   value="{{ $filter_data['price_max'] }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="category">Kategória:</label>
            <select name="category" id="category" class="form-control">
                <option value="" @php if(strcmp($filter_data['category'],'') == 0) echo 'selected';@endphp></option>
                <option value="predaj" @php if(strcmp($filter_data['category'],'predaj') == 0) echo 'selected';@endphp>
                    predaj
                </option>
                <option value="prenájom" @php if(strcmp($filter_data['category'],'prenájom') == 0) echo 'selected';@endphp>
                    prenájom
                </option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="ad__city">Mesto:</label>
            <input id="ad__city" type="text" class="form-control" name="ad__city" placeholder="Mesto"
                   value="{{ $filter_data['ad__city'] }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="property_type">Druh nehnuteľnosti:</label>
            <select name="property_type" id="property_type" onchange="displayMoreOptions()" class="form-control">
                <option value="" @php if(strcmp($filter_data['property_type'],'') == 0) echo 'selected';@endphp></option>
                <option value="byt" @php if(strcmp($filter_data['property_type'],'byt') == 0) echo 'selected';@endphp>
                    byt
                </option>
                <option value="dom" @php if(strcmp($filter_data['property_type'],'dom') == 0) echo 'selected';@endphp>
                    dom
                </option>
                <option value="pozemok" @php if(strcmp($filter_data['property_type'],'pozemok') == 0) echo 'selected';@endphp>
                    pozemok
                </option>
            </select>
        </div>
    </div>

    <div id="byt" style="display: none"> <!-- MOZNOSTI PRE BYT -->
        <label for="ap__area">Výmera (m<sup>2</sup>):</label>
        <div class="row">
            <div id="ap__area" class="form-group col-md-6 float-left">
                <input id="ap__area_square_meters_min" type="number" min="0" class="form-control" name="ap__area_square_meters_min" placeholder="od">
            </div>
            <div class="form-group col-md-6 float-right">
                <input id="ap__area_square_meters_max" type="number" min="0" class="form-control" name="ap__area_square_meters_max" placeholder="do">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="a__room_count">Počet izieb:</label>
                <input id="a__room_count" type="number" min="0" class="form-control" name="a__room_count">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="a__floor">Poschodie:</label>
                <input id="a__floor" type="number" min="0" class="form-control" name="a__floor" placeholder="pre prízemie zadajte 0">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__type">Typ nehnuteľnosti:</label>
                <select name="ap__type" id="ap__type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__window_type">Okná:</label>
                <select name="ap__window_type" id="ap__window_type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['window_type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__direction">Orientácia:</label>
                <select name="ap__direction" id="ap__direction" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['direction'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__heating">Kúrenie:</label>
                <select name="ap__heating" id="ap__heating" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['heating'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__internet">Internet:</label>
                <select name="ap__internet" id="ap__internet" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['internet'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__balcony">Balkón:</label>
                <select name="ap__balcony" id="ap__balcony" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__cellar">Pivnica:</label>
                <select name="ap__cellar" id="ap__cellar" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__garage">Garáž:</label>
                <select name="ap__garage" id="ap__garage" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="ap__insulated">Zateplený:</label>
                <select name="ap__insulated" id="ap__insulated" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
    </div>

    <div id="dom" style="display: none"> <!-- MOZNOSTI PRE DOM -->
        <label for="hp__area">Výmera (m<sup>2</sup>):</label>
        <div class="row">
            <div id="hp__area" class="form-group col-md-6 float-left">
                <input id="hp__area_square_meters_min" type="number" min="0" class="form-control" name="hp__area_square_meters_min" placeholder="od">
            </div>
            <div class="form-group col-md-6 float-right">
                <input id="hp__area_square_meters_max" type="number" min="0" class="form-control" name="hp__area_square_meters_max" placeholder="do">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="h__floor_count">Počet podlaží:</label>
                <input id="h__floor_count" type="number" min="0" class="form-control" name="h__floor_count">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__type">Typ nehnuteľnosti:</label>
                <select name="hp__type" id="hp__type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__window_type">Okná:</label>
                <select name="hp__window_type" id="hp__window_type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['window_type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__direction">Orientácia:</label>
                <select name="hp__direction" id="hp__direction" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['direction'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__heating">Kúrenie:</label>
                <select name="hp__heating" id="hp__heating" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['heating'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__internet">Internet:</label>
                <select name="hp__internet" id="hp__internet" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['internet'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__balcony">Balkón:</label>
                <select name="hp__balcony" id="hp__balcony" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__cellar">Pivnica:</label>
                <select name="hp__cellar" id="hp__cellar" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__garage">Garáž:</label>
                <select name="hp__garage" id="hp__garage" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="hp__insulated">Zateplený:</label>
                <select name="hp__insulated" id="hp__insulated" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="h__garden">Záhrada:</label>
                <select name="h__garden" id="h__garden" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="h__terrace">Terasa:</label>
                <select name="h__terrace" id="h__terrace" class="form-control">
                    <option value=""></option>
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
    </div>

    <div id="pozemok" style="display: none"> <!-- MOZNOSTI PRE POZEMOK -->
        <div class="row">
            <div class="form-group col-md-12">
                <label for="e__type">Typ pozemku:</label>
                <select name="e__type" id="e__type" class="form-control">
                    <option value=""></option>
                    @foreach($select_data['estate_type'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label for="e__area">Rozloha (m<sup>2</sup>):</label>
        <div class="row">
            <div id="e__area" class="form-group col-md-6 float-left">
                <input id="e__area_ares_min" type="number" min="0" class="form-control" name="e__area_ares_min" placeholder="od">
            </div>
            <div class="form-group col-md-6 float-right">
                <input id="e__area_ares_max" type="number" min="0" class="form-control" name="e__area_ares_max" placeholder="do">
            </div>
        </div>
        <label for="e__price_per_ares">Cena za m<sup>2</sup>:</label>
        <div class="row">
            <div id="e__price_per_ares" class="form-group col-md-6 float-left">
                <input id="e__price_per_ares_min" type="number" min="0" class="form-control" name="e__price_per_ares_min"
                       placeholder="od">
            </div>
            <div class="form-group col-md-6 float-right">
                <input id="e__price_per_ares_max" type="number" min="0" class="form-control" name="e__price_per_ares_max"
                       placeholder="do">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-secondary btn-block text-white float-right">Filtrovať</button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <a class="btn btn-block float-right" href="#" onclick="clearSelected()" style="color: white;background-color: #9290E2 !important">Reset filtra</a>
        </div>
    </div>
</form>

<script>
    function displayMoreOptions() {
        let type_selected = document.getElementById("property_type").value;
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
<script>
    function clearSelected() {
        let selectTags = document.getElementById('myform').getElementsByTagName("select");
        let inputTags = document.getElementById('myform').getElementsByTagName("input");
        for(let i = 0; i < selectTags.length; i++) {
            selectTags[i].selectedIndex = 0;
        }
        for(let i = 0; i < inputTags.length; i++) {
            inputTags[i].value = '';
        }
    }
</script>