@extends('layouts.app')

@section('includes')
    <script src="{{asset('js/bootstrap3-typeahead.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
@endsection

@section('content')
<div class="row mt-2">
    <div class="col-sm-4">
        <input type="text" class="form-control" id="search">
    </div>
</div>
@endsection
