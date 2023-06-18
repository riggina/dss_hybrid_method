@extends('layouts.main')

@section('container')
    @include('partials/sidebars')
    <div class="container dashboard">
        <div class="col-md-12 my-5 d-flex">
            <div class="col-md-6">
                <h4>Dashboard</h4>
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
        <div class="col-md-2 my-3">
            <a href="#" class="btn add-data" data-bs-toggle="modal" data-bs-target="#add">
                <i class='bx bxs-plus-circle'></i>Tambahkan data
            </a>
        </div>
        <div class="col-md-12"> 
            <table>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th class="date">Created Date</th>
                        <th>Harga Rumah</th>
                        <th>DP Rumah</th>
                        <th>Luas Bangunan</th>
                        <th>Luas Tanah</th>
                        <th>Tipe Rumah</th>
                        <th>Sertifikat Rumah</th>
                        <th>Kamar Tidur</th>
                        <th>Kamar Mandi</th>
                        <th></th>
                    </tr> 
                </thead>
                    <tbody>
                        @foreach($alternatives as $alternative)
                        <tr>
                            <td>{{ $alternative->alternative_name }}</td>
                            <td class="date">{{  $alternative->created_at->format('Y-m-d') }}</td>
                            <td>{{  $alternative->harga_rumah }}</td>
                            <td>{{  $alternative->dp_rumah }}</td>
                            <td>{{  $alternative->luas_bangunan }}</td>
                            <td>{{  $alternative->luas_tanah }}</td>
                            <td>{{  $alternative->tipe_rumah }}</td>
                            <td>{{  $alternative->sertifikat_rumah }}</td>
                            <td>{{  $alternative->kamar_tidur }}</td>
                            <td>{{  $alternative->kamar_mandi }}</td>
                            <td class="btn-CUD">
                                <a class="btn edit-icon" href="/dashboard/{{ $alternative->id }}">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a class="btn edit-icon" data-bs-toggle="modal" data-bs-target="#add">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a  class="btn delete-icon" data-bs-toggle="modal" data-bs-target="#delete">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br/>
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>
    </div>

    {{-- modal for add/update data --}}
    <div class="modal fade bd-example-modal-lg" id="add" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-12 title-modal">
                    <h4>Data Alternatif</h4>
                    <span>Isi informasi mengenai data alternatif dan kriteria dari alternatif tersebut</span>
                </div>
            </div>
            <form action="/dashboard" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="row dash">
                                        <div class="col-md-3 preview-foto">
                                            <i class='bx bxs-image'></i>
                                        </div>
                                        <div class="form-group col-md-9 post-foto">
                                            <p>Unggah gambar rumah. Ukuran max 2MB</p>
                                            <input class="form-control form-control-sm" id="rumah" type="file" required>
                                        </div>
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Nama Rumah</label>
                                        <input id="alternative_name" type="name"  class="form-control place-date" placeholder="Rumah Perumahan....">
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Slug</label>
                                        <input id="slug" type="name"  class="form-control place-date" placeholder="slug" onclick="checkSluged()">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Alamat</label>
                                        <textarea type="address" class="form-control place-date" rows="3" placeholder="Jalan..."></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Harga Rumah</label>
                                        <input class="form-control place-date" placeholder="Rp....">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">DP Rumah</label>
                                        <input class="form-control place-date" placeholder="%">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label title">Cicilan Rumah</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="1">5 Tahun</option>
                                            <option value="2">10 Tahun</option>
                                            <option value="3">20 Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label class="form-label title">Luas Bangunan</label>
                                            <input class="form-control place-date" placeholder="m²"> 
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label title">Luas Tanah</label>
                                            <input class="form-control place-date" placeholder="m²"> 
                                        </div>
                                        <div class="form-group my-2">
                                            <label class="form-label title">Sertifikat Rumah</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option value="1">SHM</option>
                                                <option value="2">SHGB</option>
                                                <option value="3">AJB</option>
                                                <option value="4">GIRIK</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label title">Daya Listrik</label>
                                            <input class="form-control place-date" placeholder="Watt"> 
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label title">Tipe Rumah</label>
                                            <input type="number" class="form-control place-date" placeholder="Tipe Rumah"> 
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label title">Kamar Tidur</label>
                                            <input type="number" class="form-control place-date" placeholder="Jumlah Kamar Tidur"> 
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label title">Kamar Mandi</label>
                                            <input type="number" class="form-control place-date" placeholder="Jumlah Kamar Mandi"> 
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label title">Lebar Jalan</label>
                                            <input class="form-control place-date" placeholder="m²"> 
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jarak ke Pinggir Kota</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label  class="form-label title">Jarak ke Pusat Kota</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jarak ke Jalan Raya</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jarak ke Pusat Perbelanjaan</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jarak ke Tempat Hiburan</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jarak ke Sekolah</label>
                                        <input class="form-control place-date" placeholder="m²"> 
                                    </div>
                                    <div class="form-group my-2">
                                        <label class="form-label title">Jumlah Ketersediaan Unit</label>
                                        <input type="number" class="form-control place-date" placeholder="Jumlah Ketersediaan Unit"> 
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label title">Koordinat Lokasi Unit</label>
                                        <input class="form-control place-date mb-2" placeholder="longitude">
                                        <input class="form-control place-date" placeholder="latitude">  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-submit px-5">Simpan</button>
                </div>
            </form>
          </div>
        </div>
    </div> 

    {{-- modal for delete --}}
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content model-content">
            <div class="modal-header p-3 d-flex justify-content-center">
              <img src="img/dustbin.png" alt="..." class="dustbin"/>
            </div>
            <div class="modal-body d-block p-0">
                <p class="p-0 m-0 body-modal">Apakah anda yakin menghapus data ini?</p>
                <p class="p-0 m-0 body-modal-data">Rumah Grand Senayan City, Jakarta</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal">Batalkan</button>
              <button type="button" class="btn btn-danger px-5">Hapus</button>
            </div>
          </div>
        </div>
      </div> 
    <script>

    function checkSluged() {
        const name = document.querySelector('alternative_name');
        const slug = document.querySelector('slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/checkSlug?alternative_name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    }
    </script> 
@endsection

@section('footer')
  <p>&copy; 2023 Sistem Pendukung Keputusan Rekomendasi Rumah Tinggal Balikpapan. All rights reserved.</p>
@endsection

@php
    $showHeader = false;
    $showFooter = false;
@endphp