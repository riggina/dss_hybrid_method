@extends('layouts.main')

@section('container')
@include('partials/sidebars')
<div class="container dashboard">
    <div class="col-md-12 my-5 d-flex">
        <div class="col-md-6 title-modal">
            <h4 >Data Alternatif</h4>
            <span>Isi informasi mengenai data alternatif dan kriteria dari alternatif tersebut</span>
        </div>
    </div>
    <div>
        <form action="/dashboard/{{ $alternative->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="row dash">
                            <input type="hidden" name="oldImage" value="{{ $alternative->img_url }}">
                            @if($alternative->img_url)
                            <div class="col-md-3 preview-foto">
                                <img class="preview-foto" id="preview" src="{{ asset('/storage/images/alternative/'. $alternative->img_url) }}">
                            </div>
                            @else
                            <div class="col-md-3 preview-foto">
                                <img class="preview-foto" id="preview">
                            </div>
                            @endif
                            <div class="form-group col-md-9 post-foto">
                                <p>Unggah gambar rumah. Ukuran max 2MB</p>
                                <input class="form-control form-control-sm" id="image" name="img_url" type="file">
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Nama Rumah</label>
                            <input id="alternative_name" type="name" name="alternative_name" class="form-control place-date" placeholder="Rumah Perumahan...." required value="{{  old('alternative_name', $alternative->alternative_name) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">Alamat</label>
                            <input name="alamat" type="address" class="form-control place-date" rows="3" placeholder="Jalan..." required value="{{  old('alamat', $alternative->alamat) }}">
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Narahubung</label>
                            <input id="contact" type="name" name="contact" class="form-control place-date" placeholder="08XXXXXXXXXXXX..." required value="{{  old('alternative_name', $alternative->contact) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">Harga Rumah</label>
                            <input name="C1" class="form-control place-date" placeholder="Rp. " required value="{{  old('C1',$alternative->C1)}}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">DP Rumah</label>
                            <input name="C2" class="form-control place-date" placeholder="Rp. " required value="{{  old('C2',  $alternative->C2) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">Uang Tanda Jadi</label>
                            <input name="C3" class="form-control place-date" placeholder="Rp." required value="{{  old('C3', $alternative->C3) }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label title">Tenor Tahun Cicilan Rumah</label>
                            <select name="tenor_tahun_cicilan" class="form-select" aria-label="Default select example" required>
                                @if(old('tenor_tahun_cicilan', $alternative) === $alternative->tenor_tahun_cicilan)
                                    <option value="{{ $alternative->tenor_tahun_cicilan }}" selected>{{ $alternative->tenor_tahun_cicilan }} Tahun</option>
                                    <option value="5">5 Tahun</option>
                                    <option value="10">10 Tahun</option>
                                    <option value="20">20 Tahun</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">Cicilan Rumah</label>
                            <input name="C4" class="form-control place-date" placeholder="Rp." required value={{  old('C4',  $alternative->C4) }}>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group my-2">
                                <label class="form-label title">Luas Bangunan</label>
                                <input name="C15" class="form-control place-date" placeholder="m²" required value={{  old('C15', $alternative->C15 )}}> 
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label title">Luas Tanah</label>
                                <input name="C16" class="form-control place-date" placeholder="m²" required value={{  old('C16', $alternative->C16) }}> 
                            </div>
                            <div class="form-group my-2">
                                <label class="form-label title">Sertifikat Rumah</label>
                                <select name="C13" class="form-select" aria-label="Default select example" required>
                                    @if(old('C13', $alternative) === $alternative->C13);
                                        <option value="{{ $alternative->C13 }}" selected>
                                            @if($alternative->C13 == 4)
                                            SHM
                                            @elseif($alternative->C13 == 3)
                                            SHGB
                                            @elseif($alternative->C13 == 2)
                                            AJB
                                            @elseif($alternative->C13 == 1)
                                            GIRIK
                                            @endif
                                        </option>
                                        <option value="4">SHM</option>
                                        <option value="3">SHGB</option>
                                        <option value="2">AJB</option>
                                        <option value="1">GIRIK</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label title">Daya Listrik</label>
                                <input name="C14" class="form-control place-date" placeholder="Watt" required value={{  old('C14', $alternative->C14) }}> 
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label title">Tipe Rumah</label>
                                <input name="C17" type="number" class="form-control place-date" placeholder="Tipe Rumah" required value={{  old('C17', $alternative->C17) }}> 
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label title">Kamar Tidur</label>
                                <input name="C18" type="number" class="form-control place-date" placeholder="Jumlah Kamar Tidur" required value={{  old('C18', $alternative->C18) }}> 
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label title">Kamar Mandi</label>
                                <input name="C19" type="number" class="form-control place-date" placeholder="Jumlah Kamar Mandi" required value={{  old('C19', $alternative->C19) }}> 
                            </div>
                            <div class="form-group">
                                <label class="form-label title">Lebar Jalan</label>
                                <input name="C20" class="form-control place-date" placeholder="m²" required value={{  old('C20', $alternative->C20) }}> 
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Pinggir Kota</label>
                            <input name="C5" class="form-control place-date" placeholder="m²" required value={{  old('C5', $alternative->C5) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label  class="form-label title">Jarak ke Pusat Kota</label>
                            <input name="C6" class="form-control place-date" placeholder="m²" required value={{  old('C6', $alternative->C6) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Jalan Raya</label>
                            <input name="C7" class="form-control place-date" placeholder="m²" required value={{  old('C7', $alternative->C7) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Pusat Perbelanjaan</label>
                            <input name="C8" class="form-control place-date" placeholder="m²" required value={{  old('C8', $alternative->C8) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Tempat Hiburan</label>
                            <input name="C9" class="form-control place-date" placeholder="m²" required value={{  old('C9', $alternative->C9) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Sekolah</label>
                            <input name="C10" class="form-control place-date" placeholder="m²" required value={{  old('C10', $alternative->C10) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Jarak ke Bandara</label>
                            <input name="C11" class="form-control place-date" placeholder="m²" required value={{  old('C11', $alternative->C11) }}> 
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label title">Kemiringan Tanah</label>
                            <input name="C12" class="form-control place-date" placeholder="m²" required value={{  old('C12', $alternative->C12) }}> 
                        </div>
                        <div class="mb-2">
                            <label class="form-label title">Ketersediaan Unit</label>
                            <select name="available_status" class="form-select" aria-label="Default select example" required>
                                @if(old('available_status', $alternative) === $alternative->available_status);
                                    <option value="{{ $alternative->available_status }}" selected>
                                            @if($alternative->available_status === 1)
                                            Tersedia
                                            @elseif($alternative->available_status == 0)
                                            Tidak Tersedia
                                            @endif
                                    </option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label title">Koordinat Lokasi Unit</label>
                            <input name="longitude" class="form-control place-date mb-2" placeholder="longitude" required value={{  old('longitude', $alternative->longitude) }}>
                            <input name="latitude" class="form-control place-date" placeholder="latitude" required value={{  old('latitude', $alternative->latitude) }}> 
                        </div>
                    </div>
                    <div class="my-5 d-flex justify-content-end">
                        <a href="/dashboard" class="btn px-5 mx-3">Batalkan</a>
                        <button type="submit" class="btn btn-submit px-5">Simpan</button>
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