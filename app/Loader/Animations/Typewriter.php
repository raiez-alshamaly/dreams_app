<?php

namespace App\Loader\Animations;

class Typewriter extends Animation
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setDuration(3.5)
            ->setTimingFunction('steps(30, end)');
    }

    public function renderCss(): string
    {
        $render = <<<EOL
        <style>
            .{$this->getAnimationClass()} {
                overflow: hidden;
                border-right: .15em solid;
                white-space: nowrap;
                margin: 0 auto;
                animation: typing {$this->getDuration()}s {$this->getTimingFunction()} {$this->getIterationCount()},
                           blink-caret .75s step-end {$this->getIterationCount()};
                animation-direction: {$this->getDirection()};
                animation-fill-mode: {$this->getFillMode()};
                animation-play-state: {$this->getPlayState()};
            }
            @keyframes typing {
                0% { width: 0 }
                50% { width: 100% }
                90% { width: 100% }
                100% { width: 0 }
            }
            @keyframes blink-caret {
                from, to { border-color: transparent }
                50% { border-color: currentColor; }
            }
        </style>
        EOL;
        return $render;
    }
}
