<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku; 
use Illuminate\Http\Request;

class Bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all(); 
        return view('admin.buku.index', compact('bukus')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([             
            'kode_buku' => 'required|unique:bukus,kode_buku',             
            'judul' => 'required',             
            'pengarang' => 'required',             
            'penerbit' => 'required',             
            'stok' => 'required|integer',         
        ]);  

        Buku::create($request->all());          
        return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil ditambahkan.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.buku.edit', compact('buku')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([             
                'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,             
                'judul' => 'required',             
                'pengarang' => 'required',             
                'penerbit' => 'required',             
                'stok' => 'required|integer',         
            ]);          
            $buku->update($request->all());          
            return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil diperbarui.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $buku->delete();         
          return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil dihapus.'); 
    }
}
