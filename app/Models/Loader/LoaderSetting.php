<?php

namespace App\Models\Loader;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoaderSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'is_enabled',
        'display_time',
        'background_color',
        'text_color',
        'animation_type',
        'type',
        'is_random_text',
        'default_text'
    ];
    
    /**
     * الحصول على الإعدادات النشطة
     */
    public static function getActive()
    {
        return self::first() ?? self::create();
    }
    
    /**
     * حفظ إعدادات اللودر
     */
    public static function saveSettings($data)
    {
        $settings = self::getActive();
        $settings->fill($data);
        $settings->save();
        
        return $settings;
    }
    
    /**
     * العلاقة مع نصوص اللودر
     */
    public function texts()
    {
        return $this->hasMany(LoaderText::class);
    }
}
