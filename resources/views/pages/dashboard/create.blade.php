@extends('layouts.main')

@section('container')
@include('partials/sidebars')
<div class="container dashboard">
    <div class="col-md-12 my-5 d-flex">
        <div class="col-md-6 title-modal">
            <h4 >Data Alternatif</h4>
            <span>Isi informasi mengenai data alternatif dan kriteria dari alternatif tersebut</span>
        </div>
        <div class="col-md-6 col-sm-6 d-flex justify-content-end">
            @if (auth()->check())
                <nav class="navbar navbar-expand-sm">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="/register">Create New Admin</a></li>
                            </ul>
                          </li>   
                    </ul>
                </nav>
            @endif
        </div>  
    </div>
    <div>
        <form action="/dashboard" method="POST"  enctype="multipart/form-data">
            @csrf
                <div class="container">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="row dash">
                                    <div class="col-md-3 preview-foto">
                                        <img class="preview-foto" id="preview" src="" alt="...">
                                    </div>
                                    <div class="form-group col-md-9 post-foto">
                                        <p>Unggah gambar rumah. Ukuran max 2MB</p>
                                        <input class="form-control form-control-sm" id="image" name="img_url" type="file">
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Nama Rumah</label>
                                    <input id="alternative_name" type="name" name="alternative_name" class="form-control place-date" placeholder="Rumah Perumahan...." required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Alamat</label>
                                    <input name="alamat" type="address" class="form-control place-date" rows="3" placeholder="Jalan..." required>
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Narahubung</label>
                                    <input id="contact" type="name" name="contact" class="form-control place-date" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Harga Rumah</label>
                                    <input name="C1" class="form-control place-date" placeholder="Rp. " required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">DP Rumah</label>
                                    <input name="C2" class="form-control place-date" placeholder="Rp. " required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Uang Tanda Jadi</label>
                                    <input name="C3" class="form-control place-date" placeholder="Rp." required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label title">Tenor Tahun Cicilan Rumah</label>
                                    <select name="tenor_tahun_cicilan" class="form-select" aria-label="Default select example" required>
                                        <option value="5">5 Tahun</option>
                                        <option value="10">10 Tahun</option>
                                        <option value="20">20 Tahun</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Cicilan Rumah</label>
                                    <input name="C4" class="form-control place-date" placeholder="Rp." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group my-2">
                                        <label class="form-label title">Luas Bangunan</label>
                                        <input name="C15" class="form-control place-date" placeholder="m²" required> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Luas Tanah</label>
                                        <input name="C16" class="form-control place-date" placeholder="m²" required> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Sertifikat Rumah</label>
                                        <select name="C13" class="form-select" aria-label="Default select example" required>
                                            <option value="4">SHM</option>
                                            <option value="3">SHGB</option>
                                            <option value="2">AJB</option>
                                            <option value="1">GIRIK</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Daya Listrik</label>
                                        <input name="C14" class="form-control place-date" placeholder="Watt" required> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Tipe Rumah</label>
                                        <input name="C17" type="number" class="form-control place-date" placeholder="Tipe Rumah" required> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Kamar Tidur</label>
                                        <input name="C18" type="number" class="form-control place-date" placeholder="Jumlah Kamar Tidur" required> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Kamar Mandi</label>
                                        <input name="C19" type="number" class="form-control place-date" placeholder="Jumlah Kamar Mandi" required> 
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label title">Lebar Jalan</label>
                                        <input name="C20" class="form-control place-date" placeholder="m²" required> 
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Pinggir Kota</label>
                                    <input name="C5" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label  class="form-label title">Jarak ke Pusat Kota</label>
                                    <input name="C6" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Jalan Raya</label>
                                    <input name="C7" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Pusat Perbelanjaan</label>
                                    <input name="C8" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Tempat Hiburan</label>
                                    <input name="C9" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Sekolah</label>
                                    <input name="C10" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Bandara</label>
                                    <input name="C11" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Kemiringan Tanah</label>
                                    <input name="C12" class="form-control place-date" placeholder="m²" required> 
                                </div>
                                <div class="mb-2">
                                    <label class="form-label title">Ketersediaan Unit</label>
                                    <select name="available_status" class="form-select" aria-label="Default select example" required>
                                        <option value="1">Tersedia</option>
                                        <option value="0">Tidak Tersedia</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Koordinat Lokasi Unit</label>
                                    <input name="longitude" class="form-control place-date mb-2" placeholder="longitude" required>
                                    <input name="latitude" class="form-control place-date" placeholder="latitude" required> 
                                </div>
                                <div class="my-5 d-flex justify-content-end">
                                    <a href="/dashboard" class="btn px-5">Batalkan</a>
                                    <button type="submit" class="btn btn-submit px-5">Simpan</button>
                                </div>
                            </div>
                        </div>
                </div>
        </form>
    </div> 
</div>
<script>
    const imageInput = document.querySelector('#image');
    const previewImage = document.querySelector('#preview');

    imageInput.addEventListener('change', function() {

        const file = imageInput.files[0];
        const reader = new FileReader();
    
        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
</script>
@endsection

@php
    $showHeader = false;
    $showFooter = false;
@endphp