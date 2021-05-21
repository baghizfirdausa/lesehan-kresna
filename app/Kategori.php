<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori', 'created_at', 'updated_at'];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
