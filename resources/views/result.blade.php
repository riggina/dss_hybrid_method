@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row g-1">
        <div class="col-md-3 col-sm-4 col-xs-4">
            @include('partials/card')
        </div>
        <div class="col-md-3 col-sm-4 col-xs-4">
            @include('partials/card')
        </div>
        <div class="col-md-3 col-sm-4 col-xs-4">
            @include('partials/card')
        </div>
        <div class="col-md-3 col-sm-4 col-xs-4">
            @include('partials/card')
        </div>
    </div>
</div>

@endsection