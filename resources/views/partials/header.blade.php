<div class="section-header">
    {{-- Filter --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header mx-2">
            <h4 class="offcanvas-title" id="offcanvasRightLabel">Filter</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <form action="{{ route('filter') }}" method="POST">
                    @csrf
                <div class="row gx-1">
                    <div class="my-2">
                        <label for="exampleFormControlInput22" class="form-label title">Harga Rumah</label>
                        <div class="row d-flex no-gutters">
                            <div class="col-5 wrapper">
                                <select class="form-select" name="min_harga" onchange="checkMinMax()">
                                    <option value="" disabled selected>Min Harga Rumah</option>
                                    <option value="50000000">Rp.50.000.000</option>
                                    <option value="100000000">Rp.100.000.000</option>
                                    <option value="150000000">Rp.150.000.000</option>
                                    <option value="200000000">Rp.200.000.000</option>
                                    <option value="250000000">Rp.250.000.000</option>
                                    <option value="300000000">Rp.300.000.000</option>
                                    <option value="350000000">Rp.350.000.000</option>
                                    <option value="400000000">Rp.400.000.000</option>
                                    <option value="450000000">Rp.450.000.000</option>
                                    <option value="500000000">Rp.500.000.000</option>
                                    <option value="550000000">Rp.550.000.000</option>
                                    <option value="600000000">Rp.600.000.000</option>
                                    <option value="650000000">Rp.650.000.000</option>
                                    <option value="700000000">Rp.700.000.000</option>
                                    <option value="750000000">Rp.750.000.000</option>
                                    <option value="800000000">Rp.800.000.000</option>
                                    <option value="850000000">Rp.850.000.000</option>
                                    <option value="900000000">Rp.900.000.000</option>
                                    <option value="950000000">Rp.950.000.000</option>
                                    <option value="1000000000">Rp.1.000.000.000</option>
                                    <option value="1500000000">Rp.1.500.000.000</option>
                                    <option value="2000000000">Rp.2.000.000.000</option>
                                    <option value="3000000000">Rp.3.000.000.000</option>
                                    <option value="4000000000">Rp.4.000.000.000</option>
                                    <option value="5000000000">Rp.5.000.000.000</option>
                                    <option value="8000000000">Rp.8.000.000.000</option>
                                    <option value="10000000000">Rp.10.000.000.000</option>
                                    <option value="50000000000">Rp.50.000.000.000</option>
                                    <option value="100000000000">Rp.100.000.000.000</option>
                                </select>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center p-0">
                                s/d
                            </div>
                            <div class="col-5 wrapper">
                                <select class="form-select" name="max_harga" onchange="checkMinMax()">
                                    <option value="" disabled selected>Max Harga Rumah</option>
                                    <option value="100000000">Rp.100.000.000</option>
                                    <option value="150000000">Rp.150.000.000</option>
                                    <option value="200000000">Rp.200.000.000</option>
                                    <option value="250000000">Rp.250.000.000</option>
                                    <option value="300000000">Rp.300.000.000</option>
                                    <option value="350000000">Rp.350.000.000</option>
                                    <option value="400000000">Rp.400.000.000</option>
                                    <option value="450000000">Rp.450.000.000</option>
                                    <option value="500000000">Rp.500.000.000</option>
                                    <option value="550000000">Rp.550.000.000</option>
                                    <option value="600000000">Rp.600.000.000</option>
                                    <option value="650000000">Rp.650.000.000</option>
                                    <option value="700000000">Rp.700.000.000</option>
                                    <option value="750000000">Rp.750.000.000</option>
                                    <option value="800000000">Rp.800.000.000</option>
                                    <option value="850000000">Rp.850.000.000</option>
                                    <option value="900000000">Rp.900.000.000</option>
                                    <option value="950000000">Rp.950.000.000</option>
                                    <option value="1000000000">Rp.1.000.000.000</option>
                                    <option value="1500000000">Rp.1.500.000.000</option>
                                    <option value="2000000000">Rp.2.000.000.000</option>
                                    <option value="3000000000">Rp.3.000.000.000</option>
                                    <option value="4000000000">Rp.4.000.000.000</option>
                                    <option value="5000000000">Rp.5.000.000.000</option>
                                    <option value="8000000000">Rp.8.000.000.000</option>
                                    <option value="10000000000">Rp.10.000.000.000</option>
                                    <option value="50000000000">Rp.50.000.000.000</option>
                                    <option value="100000000000">Rp.100.000.000.000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleFormControlInput22" class="form-label title">Luas Bangunan</label>
                        <select class="form-select" name="C15" id="exampleFormControlInput5" aria-label="Default select example">
                            <option value="" disabled selected>Luas Bangunan</option>
                            <option value="1">36m² - 45m²</option>
                            <option value="2">54m² - 60m²</option>
                            <option value="3">70m² - 90m²</option>
                            <option value="4">120m² - 200m²</option>
                            <option value="5">>200m²</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlInput23" class="form-label title">Luas Tanah</label>
                        <select name="C16" class="form-select" id="exampleFormControlInput23" aria-label="Default select example">
                            <option value="" disabled selected>Luas Tanah</option>
                            <option value="1">60m² - 89m²</option>
                            <option value="2">90m² - 119m²</option>
                            <option value="3">120m² - 149m²</option>
                            <option value="4">150m² - 179m²</option>
                            <option value="5">180m² - 209m²</option>
                            <option value="6">>210m²</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-2">
                        <label for="exampleFormControlInput24" class="form-label title">Sertifikat Rumah</label>
                        <select name="C13" class="form-select" id="exampleFormControlInput24" aria-label="Default select example">
                            <option value="" disabled selected>Sertifikat Rumah</option>
                            <option value="4">SHM</option>
                            <option value="3">SHGB</option>
                            <option value="2">AJB</option>
                            <option value="1">GIRIK</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-2">
                        <label for="exampleFormControlInput22" class="form-label title">Kamar Tidur</label>
                        <select name="C18" class="form-select" id="exampleFormControlInput5" aria-label="Default select example">
                            <option value="" disabled selected>Kamar Tidur</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">>3</option>
                        </select>
                    </div>
                    <div class="col-6 my-2">
                        <label for="exampleFormControlInput23" class="form-label title">Kamar Mandi</label>
                        <select name="C19" class="form-select" id="exampleFormControlInput23" aria-label="Default select example">
                            <option value="" disabled selected>Kamar Mandi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">>3</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-submit my-2 px-5" type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div> 

        </div>
    </div>
    {{-- Header --}}
    <section class="header-main border-none bg-white">
        <div class="container">
        <div class="row pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-2 col-sm-12 col-xs-12">
                <img src="{{ asset("img/Logo.png")}}" alt="SPK Rumah Balikpapan"/>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-6">
                    <form action="/alternative" method="GET" id="search-form">
                        <div class="d-flex form-inputs">
                            <span class="bi bi-search form-control-feedback"></span>
                            <input class="form-control search" type="text" name="search" id="search-input" placeholder="Cari Perumahan Berdasarkan Lokasi..." value="{{ request('search') }}">
                        </div>
                    </form>
            </div>
            <div class="col-md-1 col-sm-6 col-xs-6">
                    <button class="btn filter-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Filter</button>         
            </div>
            <div class="col-md-1">
                @if(session('isLoggedIn'))
                    <a class="btn admin-button" href="/dashboard"><i class="bi bi-person-fill"></i></a>
                @else
                    <a class="btn admin-button" href="login"><i class="bi bi-person-fill"></i></a>
                @endif 
            </div>
        </div>
        </div> 
    </section>
</div>
<script>
    function checkMinMax() {
      var minSelect = document.getElementsByName('min_harga')[0];
      var maxSelect = document.getElementsByName('max_harga')[0];
  
      var minVal = parseInt(minSelect.value);
      var maxVal = parseInt(maxSelect.value);
  
      if (minVal > maxVal || maxVal < minVal) {
        alert('Nilai Max Harga harus lebih tinggi dari Min Harga');
      }
    }
  </script>
