<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = [
        'id',
        'key',
        'primary-color',
        'secondary-color',
        'light-primary',
        'light-secondary',
        'accent-color',
        'text-light',
        'text-dark',
        'dark-background',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
