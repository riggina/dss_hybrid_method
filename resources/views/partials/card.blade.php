@foreach ($alternatives as $item)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
        <div class="card" >
            <span class="status">{{ $item->available_status}}</span>
            <img src="{{ $item->img_url }}" class="card-img-top img-cards" alt="...">
            <div class="card-body p-0 ">
                <p class="text-card">{{ $item->alternative_name}}</p>
                <p class="text-card-price">IDR. {{ $item->harga_rumah}}</p>
                <p class="text-card-wide">LT. {{ $item->luas_tanah}} m²</p>
                <p class="text-card-wide">LB. {{ $item->luas_bangunan}} m²</p>
                <a class="btn btn-more" href="/{{$item->id}}" >Selengkapnya</a>
            </div>
        </div>
    </div> 
@endforeach