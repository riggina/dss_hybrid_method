@extends('layouts.main')

@section('container')
@include('partials/sidebars')
<div class="container">
    <div class="row my-5">
        {{-- <img  style="height:200px" src={{ $alternative->img_url }}> --}}
    </div>
    <div class="row">
        <div class="row my-3">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h5>Detail Rumah</h5>
                </div>
                <div class="col-md-12">
                    {{-- <h5>{{ $user->user_id}}</h5> --}}
                </div>
                <br/>
                <div class="row">
                    {{-- <div class="col-md-6">
                        <h6>Alamat</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->alamat }}</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>Harga Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>IDR. {{ $alternative->harga_rumah }}</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>DP Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>IDR. {{ $alternative->dp_rumah }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Sertifikat Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->sertifikat_rumah }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Daya Listrik</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->daya_listrik }} Watt</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Bangunan</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->luas_bangunan }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Tanah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->luas_tanah }} m²</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Tipe Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->tipe_rumah }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Tidur</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->kamar_tidur }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Mandi</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->kamar_mandi }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Ketersediaan Unit</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->available_status }}</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 mx-3">
                    <h5>Deskripsi</h5>
                </div>
                <br/>
                <div class="col-md-12 mx-3 text-detail">
                    <p>HANYA 10 MENIT KE TOL BOR10 MENIT KE LOTTEMART10 MENIT KE HYPERMART10 MENIT KE TRANSMART15 MENIT KE BOGOR SQUARE15 MENIT KE YOGYA DEPT STORE10 MENIT KE PASAR ANYAR10 MENIT KE STASIUN KA BOGORKAMPUS TERDEKAT 15 MENIT KE UNIVERSITAS NUSA BANGSA, UNIVERSITAS IBNU KALDUN & UNIVERSITAS TERBUKARUMAH SAKIT TERDEKAT 10 MENIT KE HERMINA, 15 MENIT KE BUNDA SURYATNI & 15 MENIT RS ISLAM BOGOR</p> 
                </div>
                <div class="col-md-12 mx-3">
                    <h5>Lokasi</h5>
                </div>
                <div class="col-md-12 mx-3">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@php
    $showHeader = false;
    $showFooter = false;
@endphp