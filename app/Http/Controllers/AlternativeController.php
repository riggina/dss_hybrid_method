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
        return view('pages.dashboard', [
            'alternatives' => Alternative::all()->take(8)
        ]);
        // , [
        //     "alternatives" => Alternative::latest()->filter(request(['search']))->paginate(4)->withQueryString()
        // ]);

    }

    public function show($id)
    {
        $alternative = Alternative::find($id);
        return view('pages.detailalternative', [
            "alternative" => $alternative
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Alternative::class, 'slug', $request->alternative_name);
        return response()->json(['slug' => $slug]);
    }
    
}
