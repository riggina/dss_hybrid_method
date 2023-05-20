@foreach ($posts as $post)
    <div class="card" style="width: 18rem;">
        <img src="img/rumah_jual.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">{{ $post["nama_rumah"] }}</p>
        <p class="card-text">{{ $post["harga_rumah"] }}</p>
        <p class="card-text">{{ $post["DP_rumah"] }}</p>
        <a data-bs-toggle="modal" href="/result/{{ $post["slug"] }}/#exampleModal">Selengkapnya...</a>
        </div>
    </div> 
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="card-text">{{ $post["nama_rumah"] }}</p>
            <p class="card-text">{{ $post["harga_rumah"] }}</p>
            <p class="card-text">{{ $post["DP_rumah"] }}</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>
@endforeach