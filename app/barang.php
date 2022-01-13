<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = array('namabarang','tanggal','jenisbarang','stock');

    public function barangmasuk() {
        return $this->hasMany('App\barangmasuk', 'barang_id', 'id');
    }

    public function barangkeluar() {
        return $this->hasMany('App\barangkeluar', 'barang_id', 'id');
    }
}
