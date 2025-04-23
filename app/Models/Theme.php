<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Theme extends Model
{
    protected $fillable = [
        'id',
        // 'user_id',
        'is_global',
        'key',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_global' => 'boolean',
        'is_active' => 'boolean',
    ];
}
