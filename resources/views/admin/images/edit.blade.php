@extends('admin.layouts.app')
@section('title', 'Images')

@section('content')
    <br>
    <form method="post" action="{{ route('admin.images.update', $image->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Názov:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $image->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="width">Šírka (x):</label>
                <input id="width" type="text" class="form-control" name="width" value="{{ $image->width }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="height">Výška (y):</label>
                <input id="height" type="text" class="form-control" name="height" value="{{ $image->height }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <select name="type" id="type" class="form-control">
                    <option value=""></option>
                    <option value="GIF" @php if(strcmp($image->type,'GIF') == 0) echo 'selected';@endphp>GIF</option>
                    <option value="JPG" @php if(strcmp($image->type,'JPG') == 0) echo 'selected';@endphp>JPG</option>
                    <option value="PNG" @php if(strcmp($image->type,'PNG') == 0) echo 'selected';@endphp>PNG</option>
                    <option value="BMP" @php if(strcmp($image->type,'BMP') == 0) echo 'selected';@endphp>BMP</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="image_string">&lt;img&gt; string:</label>
                <input id="image_string" type="text" class="form-control" name="image_string" value="{{ $image->image_string }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('ad_id', 'ID inzerátu:') !!}
                {!! Form::select('ad_id', $ad, $selected_ad_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.images.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection