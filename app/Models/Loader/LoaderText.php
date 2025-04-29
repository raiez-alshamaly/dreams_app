<?php

namespace App\Models\Loader;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoaderText extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'text',
        'is_active',
        'display_order'
    ];
    
    /**
     * الحصول على نص عشوائي نشط
     */
    public static function getRandomText()
    {
        return self::where('is_active', true)
            ->inRandomOrder()
            ->first();
    }
    
    /**
     * الحصول على جميع النصوص النشطة
     */
    public static function getActiveTexts()
    {
        return self::where('is_active', true)
            ->orderBy('display_order')
            ->get();
    }
    
    /**
     * العلاقة مع إعدادات اللودر
     */
    public function loaderSetting()
    {
        return $this->belongsTo(LoaderSetting::class);
    }
}
