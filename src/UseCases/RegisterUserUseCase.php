<?php

namespace UseCases;

use Models\User;
use Repositories\UsersRepository;
use Ramsey\Uuid\Uuid;

class RegisterUserUseCase
{
  private UsersRepository $users_repository;

  public function __construct()
  {
    $this->users_repository = new UsersRepository();
  }

  public function execute(User $user)
  {
    $user->id = Uuid::uuid4()->toString();
    $user->password = password_hash($user->password, PASSWORD_DEFAULT);
    $this->users_repository->create_user($user);
  }
}