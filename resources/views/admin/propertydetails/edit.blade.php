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
    <form method="post" action="{{ route('admin.propertydetails.update', $propertydetail->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_square_meters">Veľkosť:</label>
                <input id="area_square_meters" type="text" class="form-control" name="area_square_meters" value="{{$propertydetail->area_square_meters}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <select name="type" id="type" class="form-control">
                    <option value="novostavba" @php if(strcmp($propertydetail->type,'novostavba') == 0) echo 'selected';@endphp>novostavba</option>
                    <option value="prerobený" @php if(strcmp($propertydetail->type,'prerobený') == 0) echo 'selected';@endphp>prerobený</option>
                    <option value="čiastočne prerobený" @php if(strcmp($propertydetail->type,'čiastočne prerobený') == 0) echo 'selected';@endphp>čiastočne prerobený</option>
                    <option value="v pôvodnom stave" @php if(strcmp($propertydetail->type,'v pôvodnom stave') == 0) echo 'selected';@endphp>v pôvodnom stave</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="window_type">Typ okien:</label>
                <select name="window_type" id="window_type" class="form-control">
                    <option value="plastové" @php if(strcmp($propertydetail->window_type,'plastové') == 0) echo 'selected';@endphp>plastové</option>
                    <option value="drevené" @php if(strcmp($propertydetail->window_type,'drevené') == 0) echo 'selected';@endphp>drevené</option>
                    <option value="dreveno-hliníkové" @php if(strcmp($propertydetail->window_type,'dreveno-hliníkové') == 0) echo 'selected';@endphp>dreveno-hliníkové</option>
                    <option value="hliníkové" @php if(strcmp($propertydetail->window_type,'hliníkové') == 0) echo 'selected';@endphp>hliníkové</option>
                    <option value="oceľové" @php if(strcmp($propertydetail->window_type,'oceľové') == 0) echo 'selected';@endphp>oceľové</option>
                    <option value="bezrámové" @php if(strcmp($propertydetail->window_type,'bezrámové') == 0) echo 'selected';@endphp>bezrámové</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="direction">Orientácia:</label>
                <select name="direction" id="direction" class="form-control">
                    <option value="sever" @php if(strcmp($propertydetail->direction,'sever') == 0) echo 'selected';@endphp>sever</option>
                    <option value="juh" @php if(strcmp($propertydetail->direction,'juh') == 0) echo 'selected';@endphp>juh</option>
                    <option value="východ" @php if(strcmp($propertydetail->direction,'východ') == 0) echo 'selected';@endphp>východ</option>
                    <option value="západ" @php if(strcmp($propertydetail->direction,'západ') == 0) echo 'selected';@endphp>západ</option>
                    <option value="severo-východ" @php if(strcmp($propertydetail->direction,'severo-východ') == 0) echo 'selected';@endphp>severo-východ</option>
                    <option value="severo-západ" @php if(strcmp($propertydetail->direction,'severo-západ') == 0) echo 'selected';@endphp>severo-západ</option>
                    <option value="juho-východ" @php if(strcmp($propertydetail->direction,'juho-východ') == 0)echo 'selected';@endphp>juho-východ</option>
                    <option value="juho-západ" @php if(strcmp($propertydetail->direction,'juho-západ') == 0) echo 'selected';@endphp>juho-západ</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="balcony">Balkón:</label>
                <select name="balcony" id="balcony" class="form-control">
                    <option value="1" @php if($propertydetail->balcony == 1) echo 'selected';@endphp>Áno</option>
                    <option value="0" @php if($propertydetail->balcony == 0) echo 'selected';@endphp>Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="cellar">Pivnica:</label>
                <select name="cellar" id="cellar" class="form-control">
                    <option value="1" @php if($propertydetail->cellar == 1) echo 'selected';@endphp>Áno</option>
                    <option value="0" @php if($propertydetail->cellar == 0) echo 'selected';@endphp>Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="garage">Garáž:</label>
                <select name="garage" id="garage" class="form-control">
                    <option value="1" @php if($propertydetail->garage == 1) echo 'selected';@endphp>Áno</option>
                    <option value="0" @php if($propertydetail->garage == 0) echo 'selected';@endphp>Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="insulated">Zateplený:</label>
                <select name="insulated" id="insulated" class="form-control">
                    <option value="1" @php if($propertydetail->insulated == 1) echo 'selected';@endphp>Áno</option>
                    <option value="0" @php if($propertydetail->insulated == 0) echo 'selected';@endphp>Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="heating">Kúrenie:</label>
                <select name="heating" id="heating" class="form-control">
                    <option value="plynom" @php if(strcmp($propertydetail->heating,'plynom') == 0) echo 'selected';@endphp>plynom</option>
                    <option value="drevom" @php if(strcmp($propertydetail->heating, 'drevom') == 0) echo 'selected';@endphp>drevom</option>
                    <option value="elektrickou energiou" @php if(strcmp($propertydetail->heating, 'elektrickou energiou') == 0) echo 'selected';@endphp>elektrickou energiou</option>
                    <option value="kotol" @php if(strcmp($propertydetail->heating, 'kotol') == 0) echo 'selected';@endphp>kotol</option>
                    <option value="solárne systémy" @php if(strcmp($propertydetail->heating, 'solárne systémy') == 0) echo 'selected';@endphp>solárne systémy</option>
                    <option value="tepelné čerpadlá" @php if(strcmp($propertydetail->heating, 'tepelné čerpadlá') == 0) echo 'selected';@endphp>tepelné čerpadlá</option>
                    <option value="hybridné" @php if(strcmp($propertydetail->heating, 'hybridné') == 0) echo 'selected';@endphp>hybridné</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="internet">Internet:</label>
                <select name="internet" id="internet" class="form-control">
                    <option value="bezdrôtové spojenie" @php if(strcmp($propertydetail->internet, 'bezdrôtové spojenie') == 0) echo 'selected';@endphp>bezdrôtové spojenie</option>
                    <option value="káblové pripojenie" @php if(strcmp($propertydetail->internet, 'káblové pripojenie') == 0) echo 'selected';@endphp>káblové pripojenie</option>
                    <option value="optický kábel" @php if(strcmp($propertydetail->internet, 'optický kábel') == 0) echo 'selected';@endphp>optický kábel</option>
                    <option value="bez internetu" @php if(strcmp($propertydetail->internet, 'bez internetu') == 0) echo 'selected';@endphp>bez internetu</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.propertydetails.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
    <div  class="form-group col-md-4 container-fluid">

    </div>

@endsection