@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Hasil Pencarian</li>
        </ol>
      </nav>
    <div class="title-of">
        <p>Hasil Pencarian</p>
    </div>
    <div class="row gy-3">
        @foreach($items as $key => $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="card" >
                    <span class="status @if ($item['available_status'] == 0) bg-red @endif">
                        @if ($item['available_status'] == 1)
                            Tersedia
                        @else
                            Tidak Tersedia
                        @endif
                    </span>
                    <img src="{{ asset('/storage/images/alternative/'. $item['img_url']) }}" class="card-img-top img-cards" alt="...">
                    <div class="card-body p-0 ">
                        <p class="text-card">{{ $item['alternative_name'] }}</p>
                        <p class="text-card-price">Rp. {{ number_format($item['C1'], 0, ',', '.') }}</p>
                        <p class="text-card-wide">LT. {{ $item['C16']}} m²</p>
                        <p class="text-card-wide">LB. {{ $item['C15']}} m²</p>
                        <a class="btn btn-more" href="alternative/{{$item['id']}}" >Selengkapnya</a>
                    </div>
                </div>
            </div> 
        @endforeach
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