@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <div class="title-of">
        <p>Hasil Pencarian</p>
    </div>
    <div class="row gy-3">
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

@section('footer')
  <p>&copy; 2023 Sistem Pendukung Keputusan Rekomendasi Rumah Tinggal Balikpapan. All rights reserved.</p>
@endsection