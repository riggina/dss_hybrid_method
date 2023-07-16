@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row my-2">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pencarian</li>
            </ol>
        </nav>
    </div>
    <div>
        <div class="col-md-12">
            @if($alternative->img_url)
                <img src="{{ asset('/storage/images/alternative/'. $alternative->img_url) }}" class="gambar-rumah" alt="Gambar">
            @else
                <img src="{{ asset('img/image.png') }}" class="gambar-rumah" alt="Gambar Default">
            @endif
        </div>
        <div class="row d-flex mt-3">
            <div class="col-md-6">
                <p class="my-2 alternatif-name">{{ $alternative->alternative_name }}</p>
            </div>
            <div class="col-md-6 p-0 d-flex justify-content-end align-items-end">
                <h6 class="mt-2 mx-3 text-align-center">Narahubung Properti</h6>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-6 p-0 m-0 d-flex justify-content-start">
                <div class="col-md-4" style="margin-right:1rem">
                    <p class="harga-detail">Rp. {{ number_format($alternative->C1, 0, ',', '.') }}</p>   
                </div>
                <div class="col-md-2" style="margin-right:1rem">
                    <p class="lt-detail">LT. {{ $alternative->C16 }} m²</p>
                </div>
                <div class="col-md-2" style="margin-right:1rem">
                    <p class="lb-detail">LB. {{ $alternative->C15 }} m²</p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="https://wa.me/{{ $alternative->contact }}" target="_blank">
                <button class="btn contact">
                    <i class="bi bi-whatsapp"></i>
                    <span>{{ $alternative->contact }}</span>
                </button>
                </a>
            </div>
        </div>
        <br/>
        <div class="divider"></div>
        {{-- <div class="container cvertical-divider">
            <div class="vertical-divider"></div>
        </div> --}}
        <div class="row my-3">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h4>Detail Rumah</h4>
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
                        <p>
                            Rp. {{ number_format($alternative->C1, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>DP Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>Rp. {{ number_format($alternative->C2, 0, ',', '.') }}</p>
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
                    <div class="col-md-6">
                        <h6>Status Kemiringan Tanah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p> 
                            @if ($alternative->C12 >= 0 && $alternative->C12 <= 0.2)
                                Tanah Datar
                            @elseif ($alternative->C12 >= 0.2 && $alternative->C12 <= 0.5)
                                Tanah Rata
                            @elseif ($alternative->C12 >= 0.5 && $alternative->C12 <= 1)
                                Tanah Rata dengan sedikit kemiringan
                            @elseif ($alternative->C12 >= 1 && $alternative->C12 <= 2)
                                Tanah Rata dengan kemiringan
                            @elseif ($alternative->C12 >= 2 && $alternative->C12 <= 5)
                                Tanah sedikit adanya Kemiringan
                            @elseif ($alternative->C12 >= 5 && $alternative->C12 <= 10)
                                Tanah dengan Kemiringan
                            @elseif ($alternative->C12 >= 10 && $alternative->C12 <= 15)
                                Tanah Kemiringan perbedaan tinggi yang cukup tajam
                            @elseif ($alternative->C12 >= 15 && $alternative->C12 <= 30)
                                Tanah Kemiringan yang sedang hingga Curam
                            @elseif ($alternative->C12 >= 30 && $alternative->C12 <= 60)
                                Tanah Kemiringan yang Curam
                            @elseif ($alternative->C12 > 60)
                                Tanah Kemiringan yang sangat Curam
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
        <div class="divider"></div>
    </div>
</div>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([-1.269160, 116.825264], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var alternatives = @json($alternative);
    Object.keys(alternatives).forEach(function (key) {
        var alternative = alternatives[key];
        var latitude = alternatives.latitude;
        var longitude = alternatives.longitude;
        var name = alternatives.alternative_name;
        L.marker([latitude, longitude])
            .bindPopup(alternatives.alternative_name)
            .addTo(map)
            .openPopup();
    })
})
</script>
@endsection

@section('footer')
  <p>&copy; 2023 Sistem Pendukung Keputusan Rekomendasi Rumah Tinggal Balikpapan. All rights reserved.</p>
@endsection

@php
    $showHeader = true;
    $showFooter = true;
@endphp