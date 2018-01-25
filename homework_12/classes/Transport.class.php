<?php
abstract class Transport extends \Product {
    protected $color;
    protected $wheelCount;
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function getWheelCount()
    {
        return $this->wheelCount;
    }
    public function setWheelCount($wheelCount)
    {
        $this->wheelCount = $wheelCount;
    }
}