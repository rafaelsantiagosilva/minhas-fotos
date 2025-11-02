<?php

namespace Controllers;

use UseCases\LoginUseCase;
use UseCases\RegisterUserUseCase;
use Models\User;

class UserController
{
  public function register(string $name, string $email, string $password)
  {
    $registerUserUseCase = new RegisterUserUseCase();
    $registerUserUseCase->execute(new User("", $name, $email, $password));
  }

  public function login(string $email, string $password)
  {
    $loginUseCase = new LoginUseCase();
    return $loginUseCase->execute($email, $password);
  }
}