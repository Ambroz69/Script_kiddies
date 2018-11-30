@extends('admin.layouts.app')
@section('title', 'Estates')

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
    <form method="post" action="{{ route('admin.estates.update', $estate->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <select name="type" id="type" class="form-control">
                    <option value="záhrada" @php if(strcmp($estate->type,'záhrada') == 0) echo 'selected';@endphp>záhrada</option>
                    <option value="orná pôda" @php if(strcmp($estate->type,'orná pôda') == 0) echo 'selected';@endphp>orná pôda</option>
                    <option value="sad/chmelnica/vinica" @php if(strcmp($estate->type,'sad/chmelnica/vinica') == 0) echo 'selected';@endphp>sad/chmelnica/vinica</option>
                    <option value="lesná pôda" @php if(strcmp($estate->type,'lesná pôda') == 0) echo 'selected';@endphp>lesná pôda</option>
                    <option value="lúka/pasienok" @php if(strcmp($estate->type,'lúka/pasienok') == 0) echo 'selected';@endphp>lúka/pasienok</option>
                    <option value="rekreačný pozemok" @php if(strcmp($estate->type,'rekreačný pozemok') == 0) echo 'selected';@endphp>rekreačný pozemok</option>
                    <option value="priemyselná zóna" @php if(strcmp($estate->type,'priemyselná zóna') == 0) echo 'selected';@endphp>priemyselná zóna</option>
                    <option value="stavebný pozemok" @php if(strcmp($estate->type,'stavebný pozemok') == 0) echo 'selected';@endphp>stavebný pozemok</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_ares">Ár:</label>
                <input id="area_ares" type="text" class="form-control" name="area_ares" value="{{$estate->area_ares}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price_per_ares">Cena za ár:</label>
                <input id="price_per_ares" type="text" class="form-control" name="price_per_ares" value="{{$estate->price_per_ares}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.estates.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection