<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    protected $table = 'barangmasuks';
    protected $fillable = array('barang_id','tanggal','jumlah');

    public function barang() {
        return $this->belongsTo('App\barang', 'barang_id', 'id');
    }
}
