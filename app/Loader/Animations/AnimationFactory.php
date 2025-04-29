<?php

namespace App\Loader\Animations;

class AnimationFactory
{
    /**
     * Create an animation instance based on the type
     *
     * @param string $type The type of animation to create
     * @return Animation
     * @throws \InvalidArgumentException if the animation type is not supported
     */
    public static function create(string $type): Animation
    {
        return match (strtolower($type)) {
            'fade' => new FadeInOut(),
            'slide' => new SlideInOut(),
            'bounce' => new Bounce(),
            'pulse' => new Pulse(),
            'typewriter' => new Typewriter(),
            default => throw new \InvalidArgumentException("Unsupported animation type: {$type}"),
        };
    }

    /**
     * Get all available animation types
     *
     * @return array
     */
    public static function getAvailableTypes(): array
    {
        return [
            'fade',
            'slide',
            'bounce',
            'pulse',
            'typewriter',
        ];
    }
}
