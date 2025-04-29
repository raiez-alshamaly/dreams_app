<?php

namespace App\Loader;

abstract class Loader implements LoaderInterface
{
    protected $bgColor ;
    protected $id =  "page-loader";
    protected $displayTime = 3000;
    public function __construct($bgColor = null, $displayTime = 1000)
    {
        $this->bgColor = $bgColor;
        $this->displayTime = $displayTime;
    }

    public function getBgColor()
    {
        return $this->bgColor;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;
        return $this;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getDisplayTime()
    {
        return $this->displayTime;
    }
    public function setDisplayTime($time)
    {
        $this->displayTime = $time;
        return $this;
    }
    abstract public function render(): string;

    public function renderJS()
    {
        $displayTime = $this->getDisplayTime();
        $id = $this->getId();
        return  <<<HTML
        <script>
            window.onload = function() {
                const loader = document.getElementById('{$id}');
                if (loader) {
                    setTimeout(function() {
                        loader.style.opacity = '0';
                        loader.style.transition = 'opacity 0.5s ease';
                        setTimeout(function() {
                            loader.style.display = 'none';
                        }, 500);
                    }, {$displayTime});
                }
            };
        </script>
        HTML;
    }
}
