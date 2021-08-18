<?php

namespace App\Entities;

class User
{
    private string $firstName;
    private string $lastName;

 public function setFirstName(string $first_name): void
{
    $this->firstName = trim($first_name);
}
/**
 * @return string
 */public function getFirstName(): string
{
    return $this->firstName;
}
/**
 * @param string $lastName
 */public function setLastName(string $last_name): void
{
    $this->lastName = trim($last_name);
}
/**
 * @return string
 */public function getLastName(): string
{
    return $this->lastName;
}
public function getFullName(): string{
     return $this->firstName . " " . $this->lastName;
}
}