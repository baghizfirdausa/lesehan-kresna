<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kategori_transaksi', 'nama_pelaku', 'nama_transaksi', 'jenis_transaksi', 'total', 'created_at', 'updated_at',
    ];
}
