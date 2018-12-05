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
    <form method="post" action="{{ route('admin.estates.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <select name="type" id="type" class="form-control">
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
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_ares">Rozloha:</label>
                <input id="area_ares" type="text" class="form-control" name="area_ares">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price_per_ares">Cena za ár:</label>
                <input id="price_per_ares" type="text" class="form-control" name="price_per_ares">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.estates.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection