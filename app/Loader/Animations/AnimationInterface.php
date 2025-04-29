<?php

namespace App\Loader\Animations;

interface AnimationInterface
{
    /**
     * Render the CSS for the animation
     *
     * @return string
     */
    public function renderCss(): string;
}
