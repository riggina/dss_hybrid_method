<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use App\Traits\Hybrid;

class HomeController extends Controller
{
    use Hybrid;

    public function index()
    {
        return view('pages.home', [
            "alternatives" => Alternative::latest()->take(4)->get()
        ]);
    }

    public function search(Request $request)
    {
        $filters = $request->only('search');
        $rankedAlternatives = $this->hybrid();

        $result = collect($rankedAlternatives)->filter(function ($item) use ($filters) {
            $search = $filters['search'] ?? false;
            
            return (stripos($item['alternative_name'], $search) !== false) || (stripos($item['alamat'], $search) !== false);
        });

        if ($result->isEmpty()) {
            return view('pages.error', [
                'message' => 'Tidak ada hasil pencarian yang sesuai.'
            ]);
        }

        $result = $result->values()->map(function ($item, $index) {
            $item['rank'] = $index + 1;
            return $item;
        });
    
        return view('pages.result', [
            'alternatives' => $result
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alternatives = Alternative::find($id);
        return view('pages.detailresult', [
            "alternative" => $alternatives
        ]);  
    }

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
}
