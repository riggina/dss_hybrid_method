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
                                  <li><a class="dropdown-item" href="/register">Create New Admin</a></li>
                                </ul>
                              </li>   
                        </ul>
                    </nav>
                @endif
            </div>  
        </div>
        <div class="col-md-2 my-3">
            <a href="/dashboard/create" class="btn add-data">
                <i class='bx bxs-plus-circle'></i>Tambahkan data
            </a>
        </div>
        <div class="col-md-12"> 
            <table>
                <thead>
                    <tr>
                        <th class="date">Alternatif</th>
                        <th class="date">Tanggal</th>
                        <th class="date">Harga Rumah</th>
                        <th class="date">Luas Bangunan</th>
                        <th class="date">Luas Tanah</th>
                        <th class="date">Sertifikat Rumah</th>
                        <th class="date">Kamar Tidur</th>
                        <th class="date">Kamar Mandi</th>
                        <th ></th>
                    </tr> 
                </thead>
                    <tbody>
                        @foreach($alternatives as $alternative)
                        {{-- @php
                        dd($alternatives);
                        @endphp --}}
                        <tr>
                            <td class="date">{{ $alternative->alternative_name }}</td>
                            <td class="date">{{  $alternative->created_at->format('Y-m-d') }}</td>
                            <td class="date">Rp. {{  number_format($alternative->C1, 0, ',', '.' )}}</td>
                            <td class="date">{{  $alternative->C15 }} m²</td>
                            <td class="date">{{  $alternative->C16}} m²</td>
                            <td class="date">
                                @if($alternative->C13 == 4)
                                SHM
                                @elseif($alternative->C13 == 3)
                                SHGB
                                @elseif($alternative->C13 == 2)
                                AJB
                                @elseif($alternative->C13 == 1)
                                GIRIK
                                @endif</td>
                            <td class="date">{{  $alternative->C18 }}</td>
                            <td class="date">{{  $alternative->C19 }}</td>
                            <td class="btn-CUD">
                                <a class="btn edit-icon" href="/dashboard/{{ $alternative->id }}">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a class="btn edit-icon" href="/dashboard/{{ $alternative->id }}/edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="/dashboard/{{ $alternative->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn delete-icon border-0" onclick="return confirm('Are you sure?')" >
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
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

    {{-- modal for delete --}}
    {{-- <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
      </div>   --}}
@endsection

@php
    $showHeader = false;
    $showFooter = false;
@endphp