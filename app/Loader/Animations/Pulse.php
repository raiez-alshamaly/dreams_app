<?php

namespace App\Loader\Animations;

class Pulse extends Animation
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setDuration(1.5);
    }

    public function renderCss(): string
    {
        $render = <<<EOL
        <style>
            .{$this->getAnimationClass()} {
                animation: pulse {$this->getDuration()}s {$this->getTimingFunction()} {$this->getIterationCount()};
                animation-direction: {$this->getDirection()};
                animation-fill-mode: {$this->getFillMode()};
                animation-play-state: {$this->getPlayState()};
            }
            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }
        </style>
        EOL;
        return $render;
    }
}
