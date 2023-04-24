@extends('layouts.app')
 
@section('content')
<div class="container">
     <iv class="row jusify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div cass="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </dv>
                    @endif
                </div>
             </div>
    

        </div>
    </div>
</div>
    
@endsection