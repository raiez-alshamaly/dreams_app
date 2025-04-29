<?php

namespace App\Loader\Animations;

abstract class Animation implements AnimationInterface
{
    protected $animationClass = "loader-animation" ;
    protected float $duration;
    protected string $timingFunction;
    protected string $iterationCount;
    protected string $direction;
    protected string $fillMode;
    protected string $playState;

    public function __construct()
    {
        $this->setDefaults();
    }

    protected function setDefaults(): void
    {
        $this->timingFunction = 'ease-in-out';
        $this->iterationCount = 'infinite';
        $this->direction = 'normal';
        $this->fillMode = 'forwards';
        $this->playState = 'running';
    }

    public function getAnimationClass(): string
    {
        return $this->animationClass;
    }

    public function setAnimationClass(string $animationClass): self
    {
        $this->animationClass = $animationClass;
        return $this;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function getTimingFunction(): string
    {
        return $this->timingFunction;
    }

    public function setTimingFunction(string $timingFunction): self
    {
        $this->timingFunction = $timingFunction;
        return $this;
    }

    public function getIterationCount(): string
    {
        return $this->iterationCount;
    }

    public function setIterationCount(string $iterationCount): self
    {
        $this->iterationCount = $iterationCount;
        return $this;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function getFillMode(): string
    {
        return $this->fillMode;
    }

    public function setFillMode(string $fillMode): self
    {
        $this->fillMode = $fillMode;
        return $this;
    }

    public function getPlayState(): string
    {
        return $this->playState;
    }

    public function setPlayState(string $playState): self
    {
        $this->playState = $playState;
        return $this;
    }

    abstract public function renderCss(): string;
}
