@extends('layouts.main')

@section('container')
    @include('partials/sidebars')
    <div class="container dashboard">
        <div class="col-md-12 my-5 d-flex">
            <div class="col-md-6">
                <h4>Peringkat</h4>
            </div>
            <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                <a href="#">
                    <img src="img/foto.jpg" class="foto-profile" alt="..."/>
                </a>
            </div>  
        </div>
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                        <th  class="date">Peringkat</th>
                        <th  class="date">Nama Alternatif</th>
                        <th  class="date">Skor Akhir Perhitungan</th>
                        <th  class="date">Created Date</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td  class="date">1</td>
                        <td  class="date">12 Mei 2020</td>
                        <td  class="date">1.00</td>
                        <td  class="date">12:30:00 1 Mei 2022</td>
                    </tr>
                    <tr>
                        <td  class="date">2</td>
                        <td  class="date">12 Mei 2020</td>
                        <td  class="date">1.00</td>
                        <td  class="date">12:30:00 1 Mei 2022</td>
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
    
@endsection