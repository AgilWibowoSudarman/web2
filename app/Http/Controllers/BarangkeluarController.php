<?php

namespace App\Http\Controllers;

use App\barangkeluar;
use App\barang;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = barangkeluar::all();
        return view('barangkeluar.index',compact('barangkeluar'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangkeluar = barangkeluar::all();
        $barang = barang::all();
        return view('barangkeluar.create',compact('barangkeluar','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'barang_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        $barang = barang::where(['id' => $request['barang_id']])->first();
        if($barang){
            $stok = $barang->stok - (int) $request->jumlah;
            // $total = $barang->total_stok + (int) $request->total_stock;
            $barang->update(['stok' => $stok]);
        }
        $barangkeluar = new barangkeluar;
        $barang = barang::where(['id' => $request['barang_id']])->first();
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->tanggal = $request->tanggal;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        $barang = barang::all();
        return view('barangkeluar.edit',compact('barangkeluar','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barangkeluar $barangkeluar)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        $barangkeluar = barangkeluar::findOrFail($id);
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->tanggal = $request->tanggal;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = barangkeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index');
    }
}
