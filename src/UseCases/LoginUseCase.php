<?php

namespace UseCases;

use Exceptions\InvalidCredentialsException;
use Repositories\UsersRepository;

class LoginUseCase
{
  private UsersRepository $users_repository;

  public function __construct()
  {
    $this->users_repository = new UsersRepository();
  }

  public function execute(string $email, string $password)
  {
    $user = $this->users_repository->get_by_email($email);

    if ($user === null)
      throw new InvalidCredentialsException();

    if (!password_verify($password, $user->password))
      throw new InvalidCredentialsException();

    return $user;
  }
}