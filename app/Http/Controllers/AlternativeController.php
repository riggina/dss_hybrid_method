<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        dd($alternatives);
    }

    public function show($id)
    {
        $alternatives = Alternative::find($id);
        return view('pages.dashboard.detailalternative', [
            "alternative" => $alternatives
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
            'alamat'=> 'required',
            'contact' => 'required',
            'img_url'=> 'image|mimes:jpeg,jpg,png|max:2048',
            'available_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'tenor_tahun_cicilan' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
            'C7' => 'required',
            'C8' => 'required',
            'C9' => 'required',
            'C10' => 'required',
            'C11' => 'required',
            'C12' => 'required',
            'C13' => 'required',
            'C14' => 'required',
            'C15' => 'required',
            'C16' => 'required',
            'C17' => 'required',
            'C18' => 'required',
            'C19' => 'required',
            'C20' => 'required',
            
        ]);
        if($request->hasFile('img_url'))
        {
            $destination_path = 'public/images/alternative';
            $image = $request->file('img_url');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img_url')->storeAs($destination_path, $image_name);

            $validateData['img_url'] = $image_name;
        }

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
            'alamat'=> 'required',
            'contact' => 'required',
            'img_url'=> 'image|mimes:jpeg,jpg,png|max:2048',
            'available_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
            'C7' => 'required',
            'C8' => 'required',
            'C9' => 'required',
            'C10' => 'required',
            'C11' => 'required',
            'C12' => 'required',
            'C13' => 'required',
            'C14' => 'required',
            'C15' => 'required',
            'C16' => 'required',
            'C17' => 'required',
            'C18' => 'required',
            'C19' => 'required',
            'C20' => 'required',
        ];  

        $validatedData = $request->validate($rules);
        if($request->hasFile('img_url'))
        {
            if ($request->oldImage) {
                $oldImagePath = 'public/images/alternative/' . $request->oldImage;
                Storage::delete($oldImagePath);
            }
            $destination_path = 'public/images/alternative';
            $image = $request->file('img_url');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img_url')->storeAs($destination_path, $image_name);

            $validatedData['img_url'] = $image_name;
        }

        $validatedData['user_id'] = auth()->user()->id;

        $alternative = Alternative::findorFail($id);

        if ($alternative->update($validatedData)) {
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Gagal mengupdate alternative.');
        }
        // $alternative->update($validatedData);
        // $alternative->save();

        // Alternative::where('id', $alternative->id)
        //         ->update($validatedData);

        // return redirect('/dashboard');
            
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
