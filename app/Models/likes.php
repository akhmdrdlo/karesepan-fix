<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','resep_id'];
}
