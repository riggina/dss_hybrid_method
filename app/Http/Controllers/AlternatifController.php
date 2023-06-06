<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlternatifController extends Controller
{
   // public function index(){
   //    return view('home', [
   //       "title" => "Sistem Pendukung Keputusan Pemilihan Rumah Tinggal Kota Balikpapan",
   //       "posts" => Alternatif::all()
   //   ]);
   // }

   public function index()
    {
         $location = new Alternatif;
         $location->alternatif_name = "Batakan Village Kelurahan Manggar";
         $location->alamat = "Jalan dikelurahan";
         $location->harga_rumah = 123;
         $location->dp_rumah= 12;
         $location->cicilan_rumah = 2;
         $location->jarak_pinggir_kota = 12.3;
         $location->jarak_pusat_kota = 12.3;
         $location->jarak_jalan_raya = 12.3;
         $location->jarak_pusat_perbelanjaan = 12.3;
         $location->jarak_tempat_hiburan = 12.3;
         $location->jarak_sekolah = 12.3;
         $location->sertifikat_rumah = 4;
         $location->daya_listrik = 2200;
         $location->luas_bangunan = 12.3;
         $location->luas_tanah = 12.3;
         $location->tipe_rumah = 12;
         $location->kamar_tidur = 1;
         $location->kamar_mandi = 1;
         $location->lebar_jalan = 6;
         $location->available_status = true;
         $location->latitude = 1.23456789;
         $location->longitude = 9.87654321;
         $location->save();
        $locations = Alternatif::all(); // Mengambil semua data koordinat dari tabel "locations"

        return view('detailresult', compact('locations'));
    }
   
   public function show(Alternatif $alternatif)
   {
      return view('partials.card', [
         "title" => "single post",
         "post" =>$alternatif
     ]);
   }
}

// Menyimpan data koordinat baru
