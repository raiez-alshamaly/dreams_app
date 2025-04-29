<?php

namespace App\Loader\Animations;

class Bounce extends Animation
{
    
    public function __construct()
    {
        parent::__construct();
        $this->setDuration(1.0);
    }

    public function renderCss(): string
    {
        $render = <<<EOL
        <style>
            .{$this->getAnimationClass()} {
                animation: bounce {$this->getDuration()}s {$this->getTimingFunction()} {$this->getIterationCount()};
                animation-direction: {$this->getDirection()};
                animation-fill-mode: {$this->getFillMode()};
                animation-play-state: {$this->getPlayState()};
            }
            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
        </style>
        EOL;
        return $render;
    }
}
