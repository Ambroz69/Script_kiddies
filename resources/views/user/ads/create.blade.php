@extends('user.layouts.app')
@section('title', 'Moj inzerat')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div style="float: left; margin-right: 0.5em">
                    <a href="{{ route('user.ads') }}" class="btn btn-primary">
                        <span data-feather="arrow-left-circle"></span>
                    </a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('user.ads.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description">Názov:</label>
                            <input id="description" type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="price">Cena:</label>
                            <input id="price" type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="address_name">Ulica:</label>
                            <input id="address_name" type="text" class="form-control" name="address_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="address_number">Popisné číslo:</label>
                            <input id="address_number" type="text" class="form-control" name="address_number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="city">Mesto:</label>
                            <input id="city" type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="region">Kraj:</label>
                            <select name="region" id="region" class="form-control">
                                <option value="Bratislavský">Bratislavský</option>
                                <option value="Trnavský">Trnavský</option>
                                <option value="Trenčiansky">Trenčiansky</option>
                                <option value="Nitriansky">Nitriansky</option>
                                <option value="Žilinský">Žilinský</option>
                                <option value="Banskobystrický">Banskobystrický</option>
                                <option value="Prešovský">Prešovský</option>
                                <option value="Košický">Košický</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="zip">PSČ:</label>
                            <input id="zip" type="text" class="form-control" name="zip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="category">Kategória:</label>
                            <select name="category" id="category" class="form-control">
                                <option value="predaj">Predaj</option>
                                <option value="prenájom">Prenájom</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="notes">Popis:</label>
                            <textarea rows="5" class="form-control" name="notes" id="notes"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="property_type">Druh nehnuteľnosti:</label>
                            <select name="property_type" id="property_type" onchange="displayMoreOptions()"
                                    class="form-control">
                                <option value=""></option>
                                <option value="byt">byt</option>
                                <option value="dom">dom</option>
                                <option value="pozemok">pozemok</option>
                            </select>
                        </div>
                    </div>

                    <div id="byt" style="display: none"> <!-- MOZNOSTI PRE BYT -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_room_count">Počet izieb:</label>
                                <input id="a_room_count" type="text" class="form-control" name="a_room_count">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_floor">Poschodie:</label>
                                <input id="a_floor" type="text" class="form-control" name="a_floor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_area_square_meters">Výmera:</label>
                                <input id="a_area_square_meters" type="text" class="form-control"
                                       name="a_area_square_meters">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_type">Typ:</label>
                                <select name="a_type" id="a_type" class="form-control">
                                    <option value="novostavba">novostavba</option>
                                    <option value="prerobený">prerobený</option>
                                    <option value="čiastočne prerobený">čiastočne prerobený</option>
                                    <option value="v pôvodnom stave">v pôvodnom stave</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_window_type">Druh okien:</label>
                                <select name="a_window_type" id="a_window_type" class="form-control">
                                    <option value="plastové">plastové</option>
                                    <option value="drevené">drevené</option>
                                    <option value="dreveno-hliníkové">dreveno-hliníkové</option>
                                    <option value="hliníkové">hliníkové</option>
                                    <option value="oceľové">oceľové</option>
                                    <option value="bezrámové">bezrámové</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_direction">Orientácia:</label>
                                <select name="a_direction" id="a_direction" class="form-control">
                                    <option value="sever">sever</option>
                                    <option value="juh">juh</option>
                                    <option value="východ">východ</option>
                                    <option value="západ">západ</option>
                                    <option value="severo-východ">severo-východ</option>
                                    <option value="severo-západ">severo-západ</option>
                                    <option value="juho-východ">juho-východ</option>
                                    <option value="juho-západ">juho-západ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_balcony">Balkón:</label>
                                <select name="a_balcony" id="a_balcony" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_cellar">Pivnica:</label>
                                <select name="a_cellar" id="a_cellar" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_garage">Garáž:</label>
                                <select name="a_garage" id="a_garage" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_insulated">Zateplený:</label>
                                <select name="a_insulated" id="a_insulated" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_heating">Kúrenie:</label>
                                <select name="a_heating" id="a_heating" class="form-control">
                                    <option value="plynom">plynom</option>
                                    <option value="drevom">drevom</option>
                                    <option value="elektrickou energiou">elektrickou energiou</option>
                                    <option value="kotol">kotol</option>
                                    <option value="solárne systémy">solárne systémy</option>
                                    <option value="tepelné čerpadlá">tepelné čerpadlá</option>
                                    <option value="hybridné">hybridné</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="a_internet">Internet:</label>
                                <select name="a_internet" id="a_internet" class="form-control">
                                    <option value="bezdrôtové spojenie">bezdrôtové spojenie</option>
                                    <option value="káblové pripojenie">káblové pripojenie</option>
                                    <option value="optický kábel">optický kábel</option>
                                    <option value="bez internetu">bez internetu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="dom" style="display: none"> <!-- MOZNOSTI PRE DOM -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_floor_count">Počet poschodí:</label>
                                <input id="h_floor_count" type="text" class="form-control" name="h_floor_count">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_area_square_meters">Výmera:</label>
                                <input id="h_area_square_meters" type="text" class="form-control"
                                       name="h_area_square_meters">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_garden">Záhrada:</label>
                                <input id="h_garden" type="text" class="form-control" name="h_garden">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_type">Typ:</label>
                                <select name="h_type" id="h_type" class="form-control">
                                    <option value="novostavba">novostavba</option>
                                    <option value="prerobený">prerobený</option>
                                    <option value="čiastočne prerobený">čiastočne prerobený</option>
                                    <option value="v pôvodnom stave">v pôvodnom stave</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_window_type">Druh okien:</label>
                                <select name="h_window_type" id="h_window_type" class="form-control">
                                    <option value="plastové">plastové</option>
                                    <option value="drevené">drevené</option>
                                    <option value="dreveno-hliníkové">dreveno-hliníkové</option>
                                    <option value="hliníkové">hliníkové</option>
                                    <option value="oceľové">oceľové</option>
                                    <option value="bezrámové">bezrámové</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_direction">Orientácia:</label>
                                <select name="h_direction" id="h_direction" class="form-control">
                                    <option value="sever">sever</option>
                                    <option value="juh">juh</option>
                                    <option value="východ">východ</option>
                                    <option value="západ">západ</option>
                                    <option value="severo-východ">severo-východ</option>
                                    <option value="severo-západ">severo-západ</option>
                                    <option value="juho-východ">juho-východ</option>
                                    <option value="juho-západ">juho-západ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_balcony">Balkón:</label>
                                <select name="h_balcony" id="h_balcony" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_cellar">Pivnica:</label>
                                <select name="h_cellar" id="h_cellar" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_garage">Garáž:</label>
                                <select name="h_garage" id="h_garage" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_terrace">Terasa:</label>
                                <select name="h_terrace" id="h_terrace" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_insulated">Zateplený:</label>
                                <select name="h_insulated" id="h_insulated" class="form-control">
                                    <option value="1">Áno</option>
                                    <option value="0">Nie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_heating">Kúrenie:</label>
                                <select name="h_heating" id="h_heating" class="form-control">
                                    <option value="plynom">plynom</option>
                                    <option value="drevom">drevom</option>
                                    <option value="elektrickou energiou">elektrickou energiou</option>
                                    <option value="kotol">kotol</option>
                                    <option value="solárne systémy">solárne systémy</option>
                                    <option value="tepelné čerpadlá">tepelné čerpadlá</option>
                                    <option value="hybridné">hybridné</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="h_internet">Internet:</label>
                                <select name="h_internet" id="h_internet" class="form-control">
                                    <option value="bezdrôtové spojenie">bezdrôtové spojenie</option>
                                    <option value="káblové pripojenie">káblové pripojenie</option>
                                    <option value="optický kábel">optický kábel</option>
                                    <option value="bez internetu">bez internetu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="pozemok" style="display: none"> <!-- MOZNOSTI PRE POZEMOK -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="e_type">Typ:</label>
                                <select name="e_type" id="e_type" class="form-control">
                                    <option value="záhrada">záhrada</option>
                                    <option value="orná pôda">orná pôda</option>
                                    <option value="sad/chmelnica/vinica">sad/chmelnica/vinica</option>
                                    <option value="lesná pôda">lesná pôda</option>
                                    <option value="lúka/pasienok">lúka/pasienok</option>
                                    <option value="rekreačný pozemok">rekreačný pozemok</option>
                                    <option value="priemyselná zóna">priemyselná zóna</option>
                                    <option value="stavebný pozemok">stavebný pozemok</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="e_area_ares">Rozloha:</label>
                                <input id="e_area_ares" type="text" class="form-control" name="e_area_ares">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="e_price_per_ares">Cena za ár:</label>
                                <input id="e_price_per_ares" type="text" class="form-control" name="e_price_per_ares">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                    <a role="button" href="{{ route('user.ads') }}"
                       class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
                </div>
            </div>
        </form>
    </div>

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
@endsection
