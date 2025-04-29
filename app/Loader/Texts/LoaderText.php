<?php 

namespace App\Loader\Texts;

use App\Loader\Animations\Animation;

abstract class LoaderText implements TextLoaderInterface {

    protected $text;
    protected $textColor ;
    protected Animation $animation;

    protected function __construct($text, $textColor,  Animation $animation){
        $this->text = $text;
        $this->textColor = $textColor;
        $this->animation = $animation;
    }
    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }

    public function setTextColor(string $textColor): self
    {
        $this->textColor = $textColor;
        return $this;
    }

    public function getAnimation(): Animation
    {
        return $this->animation;
    }

    public function setAnimation(Animation $animation): self
    {
        $this->animation = $animation;
        return $this;
    }

    public abstract function  render(): string;


}



