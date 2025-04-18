<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'full_name',
        'status',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;


   
}
