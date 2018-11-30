<form method="post" id="my_form" action="{{ route('filter') }}">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            <label for="description">Nadpis:</label>
            <input id="description"type="text" class="form-control" name="description" placeholder="Nadpis inzerátu">
        </div>
    </div>
    <label for="price">Cena:</label>
    <div class="row">
        <div id="price" class="form-group col-md-6 float-left">
            <input id="price_min" type="text" class="form-control" name="price_min" placeholder="od">
        </div>
        <div class="form-group col-md-6 float-right">
            <input id="price_max" type="text" class="form-control" name="price_max" placeholder="do">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="type">Druh nehnuteľnosti:</label>
            <select name="type" id="type" class="form-control">
                <option value="" selected></option>
                <option value="byt">Byt</option>
                <option value="dom">Dom</option>
                <option value="pozemok">Pozemok</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="category">Kategória:</label>
            <select name="category" id="category" class="form-control">
                <option value="" selected></option>
                <option value="predaj">Predaj</option>
                <option value="prenájom">Prenájom</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="city">Mesto:</label>
            <input id="city" type="text" class="form-control" name="city" placeholder="Mesto">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 mb-1">
            <button type="submit" class="btn btn-primary btn-block text-white float-right">Filtrovať</button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 text-center">
            <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">Zobraziť rozšírené možnosti filtrovania</a>
        </div>
    </div>
</form>