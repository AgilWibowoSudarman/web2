<?php

namespace App\Http\Controllers;

use App\barangmasuk;
use App\barang;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = barangmasuk::all();
        return view('barangmasuk.index',compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangmasuk = barangmasuk::all();
        $barang = barang::all();
        return view('barangmasuk.create',compact('barangmasuk','barang'));
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
            $stok = $barang->stok + (int) $request->jumlah;
            // $total = $barang->total_stok + (int) $request->total_stock;
            $barang->update(['stok' => $stok]);
        }
        $barangmasuk = new barangmasuk;
        $barang = barang::where(['id' => $request['barang_id']])->first();
        $barangmasuk->barang_id = $request->barang_id;
        $barangmasuk->tanggal = $request->tanggal;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->save();
        return redirect()->route('barangmasuk.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $barangmasuk = barangmasuk::findOrFail($id);
       return view('barangmasuk.edit',compact('barangmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
          'barang_id' => 'required',
          'tanggal' => 'required',
            'jumlah' => 'required',
     ]);

        $barangmasuk = new barangmasuk;
        $barangmasuk->barang_id = $request->barang_id;
        $barangmasuk->tanggal = $request->tanggal;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->save();
       return redirect()->route('barangmasuk.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = barangmasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index');;
    }
}
