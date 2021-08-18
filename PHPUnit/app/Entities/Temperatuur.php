<?php

namespace App\Entities;

use App\Exceptions\TemperatureChangedWithZeroException;

class Temperatuur
{
    private float $temperatuur;

    public function setTemperatuur(float $temp)
    {
        if ($temp >= 250) {
            $this->temperatuur = 250;
        } else if ($temp <= -100) {
            $this->temperatuur = -100;
        } else {
            $this->temperatuur = $temp;
        }
    }

    public function getTemperatuur(): float
    {
        return $this->temperatuur;
    }

    public function verhoog(float $temp)
    {
        if ($temp === 0.0) {
            throw new TemperatureChangedWithZeroException();
        }
        if ($this->temperatuur + $temp >= 250) {
            $this->temperatuur = 250;
        } else {
            $this->temperatuur += $temp;
        }
    }

    public function verlaag(float $temp)
    {
        if ($temp === 0.0) {
            throw new TemperatureChangedWithZeroException();
        }
        if ($this->temperatuur - $temp <= -100) {
            $this->temperatuur = -100;
        } else {
            $this->temperatuur -= $temp;
        }
    }

    public function toCelsius()
    {
        $this->temperatuur = ($this->temperatuur - 32) * 5/9;
    }
    public function toFahrenheit() {
        $this->temperatuur = $this->temperatuur * 9/5 +32;
    }
}