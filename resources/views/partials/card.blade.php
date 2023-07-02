@foreach ($alternatives as $item)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
        <div class="card" >
            <span class="status @if ($item->available_status == 0) bg-red @endif">
                @if ($item->available_status == 1)
                    Tersedia
                @else
                    Tidak Tersedia
                @endif
            </span>
            <img src="{{ asset('/storage/images/alternative/'. $item->img_url) }}" class="card-img-top img-cards" alt="...">
            <div class="card-body p-0 ">
                <p class="text-card">{{ $item->alternative_name}}</p>
                <p class="text-card-price">Rp. {{ number_format($item->C1, 0, ',', '.') }}</p>
                <p class="text-card-wide">LT. {{ $item->C16}} m²</p>
                <p class="text-card-wide">LB. {{ $item->C15}} m²</p>
                <a class="btn btn-more" href="alternative/{{$item->id}}" >Selengkapnya</a>
            </div>
        </div>
    </div> 
@endforeach