@extends('user.layouts.app')
@section('title', 'My office')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    <form action="{{ route('user.office.request_add', $user->id) }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <label for="office"></label>
                        <input list="office_list" name="office" class="form-control" id="offices">
                        <datalist id="office_list">
                            @foreach($offices as $office)
                            <option value="{{ $office }}">
                            @endforeach
                        </datalist>
                        <button type="submit" class="btn btn-primary text-white float-right">Požiadať o pridanie</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection