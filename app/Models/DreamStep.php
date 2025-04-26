<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DreamStep extends Model
{
    protected $fillable = [
        'dream_id' ,
        'description',
       
    ];


    public function dream() : BelongsTo {
        return $this->belongsTo(Dream::class );
    }
    public function media() : HasMany {
        return $this->hasMany(StepMedia::class , 'step_id') ;
    }
}
