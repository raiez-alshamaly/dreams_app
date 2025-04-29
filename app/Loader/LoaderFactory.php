<?php 

namespace App\Loader;


use App\Loader\EmptyLoader;


class LoaderFactory {
    public static function create($type , $content= null)  : Loader{
        return match (strtolower($type)) {
            'empty' => new EmptyLoader($content),
            'image' => new ImageLoader($content),
            'video' => new VideoLoader($content),
            default => throw new \InvalidArgumentException("Unsupported laoder type: {$type}"),
        };
    }
}




