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
        <form action="/dashboard" method="POST">
            @csrf
                <div class="container">
                        <div class="row">
                            <div class="col-md-4 ">
                                {{-- <div class="row dash">
                                    <div class="col-md-3 preview-foto">
                                        <i class='bx bxs-image'></i>
                                    </div>
                                    <div class="form-group col-md-9 post-foto">
                                        <p>Unggah gambar rumah. Ukuran max 2MB</p>
                                        <input class="form-control form-control-sm" id="rumah" type="file" required>
                                    </div>
                                </div> --}}
                                <div class="form-group my-2">
                                    <label class="form-label title">Nama Rumah</label>
                                    <input id="alternative_name" type="text" name="alternative_name" class="form-control place-date" placeholder="Rumah Perumahan...." required>
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Slug</label>
                                    <input id="slug" type="text" name="slug" class="form-control place-date" placeholder="slug">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Alamat</label>
                                    <textarea name="alamat" type="address" class="form-control place-date" rows="3" placeholder="Jalan..."></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Harga Rumah</label>
                                    <input name="harga_rumah" class="form-control place-date" placeholder="Rp....">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">DP Rumah</label>
                                    <input name="dp_rumah" class="form-control place-date" placeholder="%">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label title">Cicilan Rumah</label>
                                    <select name="cicilan_rumah" class="form-select" aria-label="Default select example">
                                        <option value="5">5 Tahun</option>
                                        <option value="10">10 Tahun</option>
                                        <option value="20">20 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group my-2">
                                        <label class="form-label title">Luas Bangunan</label>
                                        <input name="luas_bangunan" class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Luas Tanah</label>
                                        <input name="luas_tanah" class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Sertifikat Rumah</label>
                                        <select name="sertifikat_rumah" class="form-select" aria-label="Default select example">
                                            <option value="4">SHM</option>
                                            <option value="3">SHGB</option>
                                            <option value="2">AJB</option>
                                            <option value="1">GIRIK</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Daya Listrik</label>
                                        <input name="daya_listrik" class="form-control place-date" placeholder="Watt"> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Tipe Rumah</label>
                                        <input name="tipe_rumah" type="number" class="form-control place-date" placeholder="Tipe Rumah"> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Kamar Tidur</label>
                                        <input name="kamar_tidur" type="number" class="form-control place-date" placeholder="Jumlah Kamar Tidur"> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Kamar Mandi</label>
                                        <input name="kamar_mandi" type="number" class="form-control place-date" placeholder="Jumlah Kamar Mandi"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label title">Lebar Jalan</label>
                                        <input name="lebar_jalan" class="form-control place-date" placeholder="m²"> 
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Pinggir Kota</label>
                                    <input name="jarak_pinggir_kota" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label  class="form-label title">Jarak ke Pusat Kota</label>
                                    <input name="jarak_pusat_kota" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Jalan Raya</label>
                                    <input name="jarak_jalan_raya" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Pusat Perbelanjaan</label>
                                    <input name="jarak_pusat_perbelanjaan" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Tempat Hiburan</label>
                                    <input name="jarak_tempat_hiburan" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jarak ke Sekolah</label>
                                    <input name="jarak_sekolah" class="form-control place-date" placeholder="m²"> 
                                </div>
                                <div class="form-group my-2">
                                    <label class="form-label title">Jumlah Ketersediaan Unit</label>
                                    <input name="available_status" type="number" class="form-control place-date" placeholder="Jumlah Ketersediaan Unit"> 
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label title">Koordinat Lokasi Unit</label>
                                    <input name="longitude" class="form-control place-date mb-2" placeholder="longitude">
                                    <input name="latitude" class="form-control place-date" placeholder="latitude">  
                                </div>
                                <div class="my-5 d-flex justify-content-end">
                                    <a href="/dashboard" class="btn px-5">Batalkan</a>
                                    <button type="submit" class="btn btn-submit px-5">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div> 
</div>
<script>
    $("#alternative_name").change(function () {
        $.ajax({
            url: '{{ route("alternative_slug") }}',
            type: 'get',
            data: {alternative_name: $(this).val()},
            dataType: 'json',
            success: function(response) {
                $('#slug').val(response.slug);
            }
        });
    })
    // const alternative_name = document.querySelector('#alternative_name');
    // const slug = document.querySelector('#slug');

    // alternative_name.addEventListener('change', function() {
    //     fetch('/dashboard/checkSlug?alternative_name=' + alternative_name.value)
    //     .then(response => response.json())
    //     .then(data => slug.value = data.slug)
        
    // });
</script>
@endsection

@php
    $showHeader = false;
    $showFooter = false;
@endphp