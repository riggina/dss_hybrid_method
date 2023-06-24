<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.dashboard', [
            'alternatives' => Alternative::all()
        ]);
        // , [
        //     "alternatives" => Alternative::latest()->filter(request(['search']))->paginate(4)->withQueryString()
        // ]);
    }

    public function show($id)
    {
        $alternative = Alternative::find($id);
        return view('pages.dashboard.detailalternative', [
            "alternative" => $alternative
        ]);  
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'alternative_name' => 'required|max:255',
            'slug' => 'required|unique:alternatives',
            'alamat'=> 'required',
            // 'img_url'= ,
            'available_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'harga_rumah' => 'required',
            'dp_rumah' => 'required',
            'cicilan_rumah' => 'required',
            'jarak_pinggir_kota' => 'required',
            'jarak_pusat_kota' => 'required',
            'jarak_jalan_raya' => 'required',
            'jarak_pusat_perbelanjaan' => 'required',
            'jarak_tempat_hiburan'=> 'required',
            'jarak_sekolah' => 'required',
            'sertifikat_rumah' => 'required',
            'daya_listrik' => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'tipe_rumah' => 'required',
            'kamar_tidur' => 'required',
            'kamar_mandi' => 'required',
            'lebar_jalan' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Alternative::create($validateData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        return view('pages.dashboard.edit', compact('alternative'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'alternative_name' => 'required|max:255',
            'slug' => 'required',
            'alamat'=> 'required',
            // 'img_url'= ,
            'available_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'harga_rumah' => 'required',
            'dp_rumah' => 'required',
            'cicilan_rumah' => 'required',
            'jarak_pinggir_kota' => 'required',
            'jarak_pusat_kota' => 'required',
            'jarak_jalan_raya' => 'required',
            'jarak_pusat_perbelanjaan' => 'required',
            'jarak_tempat_hiburan'=> 'required',
            'jarak_sekolah' => 'required',
            'sertifikat_rumah' => 'required',
            'daya_listrik' => 'required',
            'luas_bangunan' => 'required',
            'luas_tanah' => 'required',
            'tipe_rumah' => 'required',
            'kamar_tidur' => 'required',
            'kamar_mandi' => 'required',
            'lebar_jalan' => 'required'
        ];  
        
        // if($request->slug != $alternative->slug) {
        //     $rules['slug'] = 'required|unique:alternatives';
        // }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        $alternative = Alternative::find($id);

        $alternative->update([
            'alternative_name' => $request->alternative_name,
            'slug' => $request->slug,
            'alamat'=> $request->alamat,
            // 'img_url'= ,
            'available_status' => $request->available_status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'harga_rumah' => $request->harga_rumah,
            'dp_rumah' => $request->dp_rumah,
            'cicilan_rumah' => $request->cicilan_rumah,
            'jarak_pinggir_kota' => $request->jarak_pinggir_kota,
            'jarak_pusat_kota' => $request->jarak_pusat_kota,
            'jarak_jalan_raya' => $request->jarak_jalan_raya,
            'jarak_pusat_perbelanjaan' => $request->jarak_pusat_perbelanjaan,
            'jarak_tempat_hiburan'=> $request->jarak_tempat_hiburan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'sertifikat_rumah' => $request->sertifikat_rumah,
            'daya_listrik' => $request->daya_listrik,
            'luas_bangunan' => $request->luas_bangunan,
            'luas_tanah' => $request->luas_tanah,
            'tipe_rumah' => $request->tipe_rumah,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'lebar_jalan' => $request->lebar_jalan,
        ]);
        $alternative->save();

        // Alternative::where('id', $alternative->id)
        //         ->update($validatedData);

        return redirect('/dashboard');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternative::where('id', $id)->delete();
        return redirect('/dashboard');
    }

    
    public function checkSlug(Request $request)
    {
        // $slug = SlugService::createSlug(Alternative::class, 'slug', $request->alternative_name);
        // return response()->json(['slug' => $slug]);

        try {
            $slug = SlugService::createSlug(Alternative::class, 'slug', $request->alternative_name);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            // Handle the exception, log the error, and return an appropriate response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
}
