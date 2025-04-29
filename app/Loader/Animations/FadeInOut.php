<?php

namespace App\Loader\Animations;


class FadeInOut extends Animation
{

    public function renderCss(): string
    {
        $render = <<<EOL
        <style>
            .animation-fade {
                animation: fade-in-out 2s ease-in-out infinite;
            }
            @keyframes fade-in-out {
                0%, 100% { opacity: 0; }
                50% { opacity: 1; }
            }
        </style>
        EOL;
        return $render;
    }
}
