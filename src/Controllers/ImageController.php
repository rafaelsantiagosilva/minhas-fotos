<?php

namespace Controllers;

use Models\Image;
use UseCases\UploadImageUseCase;
use UseCases\FetchUserImagesUseCase;

class ImageController
{
  public function upload(string $title, ?string $description, string $user_id)
  {
    $image = new Image("", $title, "", $description, new \DateTime(), $user_id);
    $uploadImageUseCase = new UploadImageUseCase();
    $uploadImageUseCase->execute($image);
  }

  public function fetch_by_user_id(string $user_id): array
  {
    $fetchUserImagesUseCase = new FetchUserImagesUseCase();
    return $fetchUserImagesUseCase->execute($user_id);
  }
}