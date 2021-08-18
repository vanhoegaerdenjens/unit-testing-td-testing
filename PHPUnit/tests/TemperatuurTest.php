<?php

use PHPUnit\Framework\TestCase;
use App\Entities\Temperatuur;
use App\Exceptions\TemperatureChangedWithZeroException;

class TemperatuurTest extends \PHPUnit\Framework\TestCase
{
    private Temperatuur $temperatuur;

    public function setUp(): void
    {
        $this->temperatuur = new temperatuur();

    }

    /** @test */
    public function objects_can_be_made_without_parameters()
    {
        $this->assertTrue($this->temperatuur instanceof Temperatuur);
    }

    /** @test */
    public function temperature_can_be_set_and_get()
    {
        $this->temperatuur->setTemperatuur(20.1);
        $this->assertEquals(20.1, $this->temperatuur->getTemperatuur());
        $this->assertIsFloat($this->temperatuur->getTemperatuur());
    }

    /** @test */
    public function temperature_can_be_increased()
    {
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->verhoog(3.5);

        $this->assertEquals(13.5, $this->temperatuur->getTemperatuur());
    }

    /** @test */
    public function temperature_can_be_decreased()
    {
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->verlaag(3.5);

        $this->assertEquals(6.5, $this->temperatuur->getTemperatuur());
    }

    /** @test */
    public function temperature_increase_of_zero_throws_exception()
    {
        $this->expectException(TemperatureChangedWithZeroException::class);
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->verhoog(0);
    }

    /** @test */
    public function temperature_decrease_of_zero_throws_exception()
    {
        $this->expectException(TemperatureChangedWithZeroException::class);
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->verhoog(0);
    }
    /** @test */
    public function temperature_can_be_changed_to_celsius()
    {
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->toCelsius();

        $this->assertNotEquals(10, $this->temperatuur->getTemperatuur());
    }
    /** @test */
    public function temperature_can_be_changed_to_fahrenheit()
    {
        $this->temperatuur->setTemperatuur(10);
        $this->temperatuur->toFahrenheit();

        $this->assertNotEquals(10, $this->temperatuur->getTemperatuur());
    }
}