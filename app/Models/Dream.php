<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;

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
