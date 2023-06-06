@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row my-2">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Hasil Pencarian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pencarian</li>
            </ol>
          </nav>
    </div>
    <div>
        <div class="col-md-12">
            <img src="img/image.png" class="gambar-rumah" alt="gambar rumah"/>
        </div>
        <div class="col-md-12 mt-3">
            <p class="my-2 alternatif-name">Cluster Heyfield Grand City Balikpapan</p>
        </div>
        <div class="row">
                <div class="col-md-6 p-0 m-0 d-flex justify-content-start">
                    <div class="col-md-4" style="margin-right:1rem">
                        <p class="harga-detail">IDR. 1.300.000.000</p>   
                    </div>
                    <div class="col-md-2" style="margin-right:1rem">
                        <p class="lt-detail">LT. 2000 m²</p>
                    </div>
                    <div class="col-md-2" style="margin-right:1rem">
                        <p class="lb-detail">LB. 600 m²</p>
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
        <div class="container cvertical-divider">
            <div class="vertical-divider"></div>
        </div>
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
                        <p>Grand City forestville cluster ruko palladium blok j no 16, Jl. MT Haryono No.20, Kalimantan Timur, Balikpapan</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>Harga Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>IDR. 1.300.000.000</p>
                    </div>
                    <div class="col-md-6 ">
                        <h6>DP Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>IDR. 10.000.000</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Sertifikat Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>SHM</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Daya Listrik</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>4000 Watt</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Bangunan</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>600 m²</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Luas Tanah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>2000 m²</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Tipe Rumah</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>125</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Tidur</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>3</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Kamar Mandi</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>2</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Ketersediaan Unit</h6>
                    </div>
                    <div class="col-md-6 text-detail">
                        <p>10 Unit</p>
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

{{-- L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Mengambil koordinat dari database dan menambahkan marker ke peta
var locations = {!! json_encode($locations) !!};
locations.forEach(function(location) {
    L.marker([location.latitude, location.longitude]).addTo(map);
}); --}}