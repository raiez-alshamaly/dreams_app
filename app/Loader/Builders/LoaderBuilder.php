<?php

namespace App\Loader\Builders;


use App\Loader\Texts\LoaderText;
use App\Loader\Loader ;

class LoaderBuilder
{
    protected  ?Loader $loader;
    protected ?LoaderText $text;

    public function __construct(?Loader $loader = null, ?LoaderText $text  = null)
    {
        $this->loader = $loader;
        $this->text = $text;
      
    }



    public function getLoader(): Loader
    {
        return $this->loader;
    }
    public function getText(): LoaderText
    {
        return $this->text;
    }
   
    public function setLoader(Loader $loader): LoaderBuilder
    {
        $this->loader = $loader;
        return $this;
    }
    public function setText(LoaderText $text): LoaderBuilder
    {
        $this->text = $text;
        return $this;
    }
   



    public function build(): string
    {
        $loaderBgColor = $this->loader->getBgColor();
        $id = $this->loader->getId();
        return <<<HTML
            <div id='{$id}' class="fixed inset-0 z-50 flex items-center justify-center" style='background-color: $loaderBgColor;'>
                <div class="text-center">
                {$this->loader->render()}
                {$this->text->render()}

                </div>

            </div>
            {$this->loader->renderJS()}
            HTML;
    }
}
