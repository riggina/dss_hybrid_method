<?php

use Illuminate\Support\Facades\Route;
use App\Models\alternatif;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $card_posts = [
        [
            "nama_rumah" => "Rumah Gadang",
            "slug" => "rumah_load1",
            "harga_rumah" => "200 M",
            "DP_rumah" => "10 JT"
        ],
        [
            "nama_rumah" => "Rumah Gading",
            "slug" => "rumah_load2",
            "harga_rumah" => "500 M",
            "DP_rumah" => "50 JT"
        ],
        ];
    return view('home', [
        "title" => "Sistem Pendukung Keputusan Pemilihan Rumah Tinggal Kota Balikpapan",
        "posts" => $card_posts
    ]);
});

Route::get('/result', function () {
    $card_posts = [
        [
            "nama_rumah" => "Rumah Gadang",
            "slug" => "rumah_load1",
            "harga_rumah" => "200 M",
            "DP_rumah" => "10 JT"
        ],
        [
            "nama_rumah" => "Rumah Gading",
            "slug" => "rumah_load2",
            "harga_rumah" => "500 M",
            "DP_rumah" => "50 JT"
        ],
        ];
    return view('result', [
        "title" => "Hasil Pencarian",
        "posts" => $card_posts
    ]);
});

//halaman single post
Route::get('result/{slug}', function($slug){
    $card_posts = [
        [
            "nama_rumah" => "Rumah Gadang",
            "slug" => "rumah_load1",
            "harga_rumah" => "200 M",
            "DP_rumah" => "10 JT"
        ],
        [
            "nama_rumah" => "Rumah Gading",
            "slug" => "rumah_load2",
            "harga_rumah" => "500 M",
            "DP_rumah" => "50 JT"
        ],
    ];

    $new_post = [];
    foreach($card_posts as $post) {
        if($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('partials.card', [
        "title" => "single post",
        "post" =>$new_post
    ]);
});



