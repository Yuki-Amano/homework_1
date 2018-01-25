<?php
interface Drivable
{
    public function startEngine();
    public function stopEngine();
    public function drive();
    public function brake();
}