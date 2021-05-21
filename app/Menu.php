<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['kategori_id', 'nama', 'kategori', 'harga', 'keterangan', 'created_at', 'updated_at'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
