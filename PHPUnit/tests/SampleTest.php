<?php
use PHPUnit\Framework\TestCase;
use App\Entities\User;

class UserTest extends TestCase
{
    private User $user;
    public function setUp(): void
    {
        $this->user = new User();
    }

    /** @test */
    public function set_and_get_the_first_name()
    {
        $this->user->setFirstName("Bjorn");

        $this->assertEquals($this->user->getFirstName(), "Bjorn");
    }
    /** @test */
    public function set_and_get_the_last_name()
    {
        $this->user->setLastName("Smeets");

        $this->assertEquals($this->user->getLastName(), "Smeets");
    }
    /** @test */
    public function full_name_is_correct()
    {
        $this->assertEquals($this->user->getFullName(), "Bjorn Smeets");
    }
    /** @test */
    public function first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName("  Bjorn  ");
        $this->user->setLastName("  Smeets  ");

        $this->assertEquals($this->user->getFirstName(), "Bjorn");
        $this->assertEquals($this->user->getLastName(), "Smeets");
    }
}
