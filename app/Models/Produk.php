<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'produk';
    // protected $fillable = [
    //     'name',
    //     'deskripsi',
    //     'created_by'
    // ];

    
}
