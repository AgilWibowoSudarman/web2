<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Model
{
    protected $table = 'barangkeluars';
    protected $fillable = array('barang_id','tanggal','jumlah');

    public function barang() {
        return $this->belongsTo('App\barang', 'barang_id', 'id');
    }
}
