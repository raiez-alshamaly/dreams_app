<?php

namespace App\Loader\Animations;

class SlideInOut extends Animation
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setDuration(2.0);
    }

    public function renderCss(): string
    {
        $render = <<<EOL
        <style>
            .{$this->getAnimationClass()} {
                animation: slide-in-out {$this->getDuration()}s {$this->getTimingFunction()} {$this->getIterationCount()};
                animation-direction: {$this->getDirection()};
                animation-fill-mode: {$this->getFillMode()};
                animation-play-state: {$this->getPlayState()};
            }
            @keyframes slide-in-out {
                0% { transform: translateY(-20px); opacity: 0; }
                50% { transform: translateY(0); opacity: 1; }
                100% { transform: translateY(20px); opacity: 0; }
            }
        </style>
        EOL;
        return $render;
    }
}
