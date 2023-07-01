@extends('layouts.main')

@section('container')
@include('partials/sidebars')
<div class="container">
    <div class="row my-5">
        <div class="col-md-12 gambar-rumah">
            <img src="{{ asset('/storage/images/alternative/'. $alternative->img_url) }}" class="gambar-rumah" alt="gambar rumah"/>
        </div>
    </div>
    <div class="row">
        <div class="row my-3">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h4>Detail Rumah</h4>
                </div>
                <div class="col-md-12">
                    {{-- <h5>{{ $user->user_id}}</h5> --}}
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Alamat</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->alamat }}</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>Harga Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>Rp. {{ number_format($alternative->C1, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>DP Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>IDR. {{ number_format($alternative->C2, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Sertifikat Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>
                            @if($alternative->C13 == 4)
                            SHM
                            @elseif($alternative->C13 == 3)
                            SHGB
                            @elseif($alternative->C13 == 2)
                            AJB
                            @elseif($alternative->C13 == 1)
                            GIRIK
                            @endif
                            
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6>Daya Listrik</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C14 }} Watt</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Bangunan</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C15 }} m²</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Tanah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C16 }} m²</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Tipe Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C17 }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Tidur</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C18 }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Mandi</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>{{ $alternative->C19 }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Ketersediaan Unit</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p> 
                            @if ($alternative->available_status == 1)
                            Tersedia
                            @else
                            Tidak Tersedia
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 mx-3">
                    <h4>Jarak</h4>
                </div>
                <br/>
                <div class="col-md-12 mx-3 text-detail d-flex">
                    <div class="col">
                        <ul>
                            <li>Jarak ke Pinggir Kota {{ $alternative->C5 }} m²</li>
                            <li>Jarak ke Pusat Kota {{ $alternative->C6 }} m²</li>
                            <li>Jarak ke Jalan Raya {{ $alternative->C7 }} m²</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li>Jarak ke Tempat Hiburan {{ $alternative->C9 }} m²</li>
                            <li>Jarak ke Sekolah {{ $alternative->C10 }} m²</li>
                            <li>Jarak ke Bandara {{ $alternative->C11 }} m²</li>
                            <li>Jarak ke Pusat Perbelanjaan {{ $alternative->C8 }} m²</li>
                        </ul>
                    </div>
                </div>
                    
                <div class="col-md-12 mx-3">
                    <h4>Lokasi</h4>
                </div>
                <div class="col-md-12 mx-3">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([-1.269160, 116.825264], 15); // Koordinat default (Balikpapan)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);

    var alternatives = @json($alternative);

    Object.keys(alternatives).forEach(function (key) {
        var alternative = alternatives[key];
        var latitude = alternatives.latitude;
        var longitude = alternatives.longitude;
        var marker = L.marker([latitude, longitude]).addTo(map);
        var customIcon = L.icon({
                iconUrl: '/img/placeholder.png',
                iconSize: [32, 32], // ukuran ikon dalam piksel
                iconAnchor: [16, 32], // titik anchor ikon relatif terhadap titik pada lokasi
                popupAnchor: [0, -32] // titik popup relatif terhadap titik pada lokasi
            });

        marker.setIcon(customIcon);
        marker.bindPopup(alternative.alternative_name); // Menambahkan informasi pada marker
    });
})
</script>
@endsection


@php
    $showHeader = false;
    $showFooter = false;
@endphp