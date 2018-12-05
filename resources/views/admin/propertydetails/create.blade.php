@extends('admin.layouts.app')
@section('title', 'Property details')

@section('content')
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('admin.propertydetails.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_square_meters">Výmera:</label>
                <input id="area_square_meters" type="text" class="form-control" name="area_square_meters">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <select name="type" id="type" class="form-control">
                    <option value="novostavba">novostavba</option>
                    <option value="prerobený">prerobený</option>
                    <option value="čiastočne prerobený">čiastočne prerobený</option>
                    <option value="v pôvodnom stave">v pôvodnom stave</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="window_type">Druh okien:</label>
                <select name="window_type" id="window_type" class="form-control">
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
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="direction">Orientácia:</label>
                <select name="direction" id="direction" class="form-control">
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
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="balcony">Balkón:</label>
                <select name="balcony" id="balcony" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="cellar">Pivnica:</label>
                <select name="cellar" id="cellar" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="garage">Garáž:</label>
                <select name="garage" id="garage" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="insulated">Zateplený:</label>
                <select name="insulated" id="insulated" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="heating">Kúrenie:</label>
                <select name="heating" id="heating" class="form-control">
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
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="internet">Internet:</label>
                <select name="internet" id="internet" class="form-control">
                    <option value="bezdrôtové spojenie">bezdrôtové spojenie</option>
                    <option value="káblové pripojenie">káblové pripojenie</option>
                    <option value="optický kábel">optický kábel</option>
                    <option value="bez internetu">bez internetu</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.propertydetails.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection