<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Hybrid;

class FilterController extends Controller
{
    use Hybrid;

    public function filter(Request $request)
    {
        $rankedAlternatives = $this->hybrid();
       
        // $token = $request->input('_token');
        $min_harga = $request->input('min_harga');
        $max_harga = $request->input('max_harga');
        $sertifikat = $request->input('C13');
        $luasBangunan = $request->input('C15');
        $luasTanah = $request->input('C16');
        $kamarTidur = $request->input('C18');
        $kamarMandi = $request->input('C19');

        if (!empty($min_harga) && !empty($max_harga) && $min_harga > $max_harga && $max_harga < $min_harga) {
            return redirect()->back()->with('error', 'Nilai Min Harga tidak boleh lebih besar dari Max Harga');
        }

        $filteredAlternatives = array_filter($rankedAlternatives, function ($alternative) use ($min_harga, $max_harga, $sertifikat, $luasBangunan, $luasTanah, $kamarTidur, $kamarMandi) {
            $passMinHarga = empty($min_harga) || ($alternative['C1'] >= $min_harga);
            $passMaxHarga = empty($max_harga) || ($alternative['C1'] <= $max_harga);
            $passSertifikat = empty($sertifikat) || ($alternative['C13'] == $sertifikat);
            $passLuasBangunan = empty($luasBangunan) || ($alternative['C15'] == $luasBangunan);
            $passLuasTanah = empty($luasTanah) || ($alternative['C16'] == $luasTanah);
            $passKamarTidur = empty($kamarTidur) || ($alternative['C18'] == $kamarTidur);
            $passKamarMandi = empty($kamarMandi) || ($alternative['C19'] == $kamarMandi);

        
            return $passMinHarga && $passMaxHarga && $passSertifikat && $passLuasBangunan && $passLuasTanah && $passKamarTidur && $passKamarMandi ;
        });

        if(empty($filteredAlternatives)) {
            return view('pages.error', [
                'message' => 'Tidak ada hasil pencarian yang cocok.'
            ]);
        }

        $ranking = 1;
        foreach ($filteredAlternatives as &$alternative) {
            $alternative['rank'] = $ranking;
            $ranking++;
        }
        

        return view('pages.filterresult', [
            'items' => $filteredAlternatives
        ]);
        

    }
}
