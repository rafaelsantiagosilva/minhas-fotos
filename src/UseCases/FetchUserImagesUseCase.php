<?php

namespace UseCases;
use Repositories\ImagesRepository;
use Repositories\UsersRepository;

class FetchUserImagesUseCase
{
  private ImagesRepository $images_repository;
  private UsersRepository $users_repository;

  public function __construct()
  {
    $this->images_repository = new ImagesRepository();
    $this->users_repository = new UsersRepository();
  }

  public function execute(string $user_id): array
  {
    $user = $this->users_repository->get_by_id($user_id);
    if ($user === null)
      throw new \Exception("User not found");

    $images = $this->images_repository->fetch_by_user_id($user_id);
    return $images;
  }
}