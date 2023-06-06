@extends('layouts.main')

@section('container')
    @include('partials/sidebars')
    <div class="container dashboard">
        <div class="col-md-12 my-5 d-flex">
            <div class="col-md-6">
                <h4>Dashboard</h4>
            </div>
            <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                <nav class="navbar navbar-expand-sm">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbar-list-4">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Dashboard</a>
                                    <a class="dropdown-item" href="#">Edit Profile</a>
                                    <a class="dropdown-item" href="#">Log Out</a>
                                </div>
                          </li>   
                        </ul>
                      </div>
                </nav>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <button class="btn add-data" data-bs-toggle="modal" data-bs-target="#add"><i class='bx bxs-plus-circle'></i>Tambahkan data</button>
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
                    <tr>
                        <td>Rumah 1</td>
                        <td class="date">12 Mei 2020</td>
                        <td>Harga Rumah</td>
                        <td>DP Rumah</td>
                        <td>Luas Bangunan</td>
                        <td>Luas Tanah</td>
                        <td>Tipe Rumah</td>
                        <td>Sertifikat Rumdh</td>
                        <td>Kamar Tidur</td>
                        <td>Kamar Mandi</td>
                        <td class="btn-CUD">
                            <button class="btn edit-icon" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button  class="btn delete-icon" data-bs-toggle="modal" data-bs-target="#delete">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </td>
                    </tr>
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
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="row dash">
                                <div class="col-md-3 preview-foto">
                                    <i class='bx bxs-image'></i>
                                </div>
                                <div class="col-md-9 post-foto">
                                    <p>Unggah gambar rumah. Ukuran max 2MB</p>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" required>
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput1" class="form-label title">Nama Rumah</label>
                                <input type="name" class="form-control place-date" id="exampleFormControlInput1" placeholder="Rumah Perumahan....">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlTextarea1" class="form-label title">Alamat</label>
                                <textarea class="form-control place-date" id="exampleFormControlTextarea1" rows="3" placeholder="Jalan..."></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput3" class="form-label title">Harga Rumah</label>
                                <input class="form-control place-date" id="exampleFormControlInput3" placeholder="Rp....">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput4" class="form-label title">DP Rumah</label>
                                <input class="form-control place-date" id="exampleFormControlInput4" placeholder="%">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput5" class="form-label title">Cicilan Rumah</label>
                                <select class="form-select" id="exampleFormControlInput5" aria-label="Default select example">
                                    <option value="1">5 Tahun</option>
                                    <option value="2">10 Tahun</option>
                                    <option value="3">20 Tahun</option>
                                  </select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput20" class="form-label title">Koordinat Lokasi Unit</label>
                                <input class="form-control place-date mb-2" id="exampleFormControlInput20" placeholder="longitude">
                                <input class="form-control place-date" id="exampleFormControlInput20" placeholder="latitude">  
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="my-2">
                                <label for="exampleFormControlInput6" class="form-label title">Luas Bangunan</label>
                                <input class="form-control place-date" id="exampleFormControlInput6" placeholder="m²"> 
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput7" class="form-label title">Luas Tanah</label>
                                <input class="form-control place-date" id="exampleFormControlInput7" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput8" class="form-label title">Sertifikat Rumah</label>
                                <select class="form-select" id="exampleFormControlInput8" aria-label="Default select example">
                                    <option value="1">SHM</option>
                                    <option value="2">SHGB</option>
                                    <option value="3">AJB</option>
                                    <option value="4">GIRIK</option>
                                  </select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput9" class="form-label title">Daya Listrik</label>
                                <input class="form-control place-date" id="exampleFormControlInput9" placeholder="Watt"> 
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput10" class="form-label title">Tipe Rumah</label>
                                <input type="number" class="form-control place-date" id="exampleFormControlInput10" placeholder="Tipe Rumah"> 
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput11" class="form-label title">Kamar Tidur</label>
                                <input type="number" class="form-control place-date" id="exampleFormControlInput11" placeholder="Jumlah Kamar Tidur"> 
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput12" class="form-label title">Kamar Mandi</label>
                                <input type="number" class="form-control place-date" id="exampleFormControlInput12" placeholder="Jumlah Kamar Mandi"> 
                            </div>
                            <div>
                                <label for="exampleFormControlInput13" class="form-label title">Lebar Jalan</label>
                                <input class="form-control place-date" id="exampleFormControlInput13" placeholder="m²"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="my-2">
                                <label for="exampleFormControlInput14" class="form-label title">Jarak ke Pinggir Kota</label>
                                <input class="form-control place-date" id="exampleFormControlInput14" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput15" class="form-label title">Jarak ke Pusat Kota</label>
                                <input class="form-control place-date" id="exampleFormControlInput15" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput16" class="form-label title">Jarak ke Jalan Raya</label>
                                <input class="form-control place-date" id="exampleFormControlInput16" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput17" class="form-label title">Jarak ke Pusat Perbelanjaan</label>
                                <input class="form-control place-date" id="exampleFormControlInput17" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput18" class="form-label title">Jarak ke Tempat Hiburan</label>
                                <input class="form-control place-date" id="exampleFormControlInput18" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput19" class="form-label title">Jarak ke Sekolah</label>
                                <input class="form-control place-date" id="exampleFormControlInput6" placeholder="m²"> 
                            </div>
                            <div class="my-2">
                                <label for="exampleFormControlInput21" class="form-label title">Jumlah Ketersediaan Unit</label>
                                <input type="number" class="form-control place-date" id="exampleFormControlInput21" placeholder="Jumlah Ketersediaan Unit"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-submit px-5">Simpan</button>
              </div>
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
        
    </script> 
@endsection

@section('footer')
  <p>&copy; 2023 Sistem Pendukung Keputusan Rekomendasi Rumah Tinggal Balikpapan. All rights reserved.</p>
@endsection
{{-- <div class="col-md-12 mt-3 data-post">
            <div class="row">
                <div class="col-md-10">
                    Data 1
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <button class="btn edit-icon">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button  class="btn delete-icon">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </div>
            </div> --}}