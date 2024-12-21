<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with('fasilitas:id,produk_id,keterangan')
            ->select(
                'id',
                'judul_pendek',
                'judul_panjang',
                'subjudul',
                'deskripsi',
                'foto',
                'harga',
                'satuan'
            )
            ->get();

        return response()->json([
            'message' => 'Data produk berhasil diambil',
            'data'    => $produk
        ], 201);
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
    public function show(Produk $produk)
    {
        
        if (!$produk) {
            return response()->json([
                'message' => 'Produk tidak ditemukan'
            ], 422);
        }

        // Memuat fasilitas terkait
        $produk->load('fasilitas');

        return response()->json([
            'message' => 'Data produk berhasil ditemukan',
            'data'    => $produk
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
