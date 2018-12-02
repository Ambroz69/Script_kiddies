@extends('admin.layouts.app')
@section('title', 'Images')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>OBRÁZKY</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.images.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Názov</th>
                        <th>Šírka (x)</th>
                        <th>Výška (y)</th>
                        <th>Typ</th>
                        <th>&lt;img&gt; string</th>
                        <th>ID inzerátu</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td>{{$image->name}}</td>
                            <td>{{$image->width}}</td>
                            <td>{{$image->height}}</td>
                            <td>{{$image->type}}</td>
                            <td>{{$image->image_string}}</td>
                            <td>
                                @isset($image->ad)
                                    <a href="{{ route('admin.ads.edit', $image->ad->id) }}">
                                        {{$image->ad->id}}
                                    </a>
                                @endisset
                            </td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.images.destroy', $image->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0px;">
                                        <a  href="{{ route('admin.images.edit', $image->id) }}" class="btn btn-info text-white float-left">
                                            <span data-feather="edit"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection