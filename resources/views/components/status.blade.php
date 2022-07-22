@if(session('status'))
    <div class="row">
        <div class="col">
                <span class="text-success">
                     {{session('status')}}
                </span>
        </div>
    </div>
@endif
