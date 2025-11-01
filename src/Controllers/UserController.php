<?php

namespace Controllers;

use UseCases\RegisterUserUseCase;
use Models\User;

class UserController
{
  public function register(string $name, string $email, string $password)
  {
    $registerUserUseCase = new RegisterUserUseCase();
    $registerUserUseCase->execute(new User("", $name, $email, $password));
  }
}