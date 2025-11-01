<?php

class User
{
  public function __construct(string $id, string $name, string $email, string $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
}