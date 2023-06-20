<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Penonton;
use Illuminate\Http\Request;

class PenontonController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Penonton::select("nama_penonton as value", "id")
                    ->where('nama_penonton', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function show(Penonton $penonton)
    { 
        return response()->json($penonton);
    }

    public function index()
    {
        $title = "Data Barang";
        $penontons = Penonton::orderBy('id', 'asc')->paginate(5);
        return view('penontons.index', compact('penontons', 'title'));
    }

    public function create()
    {
        $title = "Tambah data barang";
        return view('penontons.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penonton' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        Penonton::create($request->all());

        return redirect()->route('penontons.index')->with('success', 'Barang has been created successfully.');
    }


    public function edit(Penonton $penonton)
    {
        $title = "Edit Data Barang";
        return view('barangs.edit', compact('barang', 'title'));
    }

    public function update(Request $request, Barang $penonton)
    {
        $request->validate([
            'nama_penonton' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        $penonton->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang has been updated successfully.');
    }

    public function destroy(Penonton $penonton)
    {
        $penonton->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang has been deleted successfully.');
    }
}
