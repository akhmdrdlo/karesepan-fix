<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resep_makanan extends Model
{    
    protected $table = 'resep_makanan';
    protected $fillable = [
        'nama_makanan',
        'deskripsi',
        'resep',
        'cara_buat',
        'link_gambar',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [
        'id',
        'remember_token',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class,'resep_id');
    }
}
