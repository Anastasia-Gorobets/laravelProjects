@extends('layouts.app')

@section('includes')
    <script src="{{asset('js/bootstrap3-typeahead.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
@endsection

@section('content')
    <div class="row mt-2">
        <div class="col">

            <form method="post" action="{{route('import_csv.store')}}" enctype="multipart/form-data">

                @csrf

                <div class="form-group mb-3">
                    <label for="csv">Csv file</label>
                    <input type="file" class="form-control" name="csv" id="csv">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

            @errors
            @enderrors

        </div>
    </div>

    @status
    @endstatus

@endsection
