<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Dream extends Model
{
    /** @use HasFactory<\Database\Factories\DreamFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'full_name',
        'status',
        'amount',
        'description',
        'phone',
        'image_path',
        'id_image_path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
   
    public $timestamps = true;

    public function scopeAmount(Builder $query, $min = 0, $max = 0): void
    {

        if (!$min == 0) {
            $query->where('amount', '=>', $min);
        }
        if (!$max == 0) {
            $query->where('amount', '=<', $max);
        }
    }

    public function scopeStatus(Builder $query, $status = null): void
    {
        if (!$status) {
            $query->where('status' , $status);
        }
    }
}
