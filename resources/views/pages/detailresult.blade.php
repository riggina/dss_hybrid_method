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
            <img src="{{ $alternative->img_url }}" class="gambar-rumah" alt="gambar rumah"/>
        </div>
        <div class="col-md-12 mt-3">
            <p class="my-2 alternatif-name">{{ $alternative->alternative_name }}</p>
        </div>
        <div class="row">
                <div class="col-md-6 p-0 m-0 d-flex justify-content-start">
                    <div class="col-md-4" style="margin-right:1rem">
                        <p class="harga-detail">IDR. {{ $alternative->harga_rumah }}</p>   
                    </div>
                    <div class="col-md-2" style="margin-right:1rem">
                        <p class="lt-detail">LT. {{ $alternative->luas_tanah }} m²</p>
                    </div>
                    <div class="col-md-2" style="margin-right:1rem">
                        <p class="lb-detail">LB. {{ $alternative->luas_bangunan }} m²</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container contact-prop">
                        <div class="col-md-6 mx-3 my-1">
                            <h6>Kontak Properti</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="https://wa.me/6287716301634" target="_blank">
                            <button class="btn contact">
                                <i class="bi bi-whatsapp"></i>
                                <span>087716301634</span>
                            </button>
                            </a>
                        </div>
                    </div>
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
                    <h5>Detail Rumah</h5>
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
                    </div>
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
        <div class="divider"></div>
    </div>
</div>
@endsection

@section('footer')
  <p>&copy; 2023 Sistem Pendukung Keputusan Rekomendasi Rumah Tinggal Balikpapan. All rights reserved.</p>
@endsection

@php
    $showHeader = true;
    $showFooter = true;
@endphp