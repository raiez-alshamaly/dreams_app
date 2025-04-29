<?php

namespace App\Loader\Texts;

use App\Loader\Animations\Animation;

class NormalLoaderText extends LoaderText
{
    public function __construct($text, $textColor, Animation $animation)
    {
        parent::__construct($text, $textColor, $animation);
    }

    public function render(): string
    {
       
        return <<<EOL
        <div class="{$this->getAnimation()->getAnimationClass()}" style="color: {$this->getTextColor()};">
            {$this->getText()}
        </div>
        {$this->getAnimation()->renderCss()}
        EOL;
    }
}
