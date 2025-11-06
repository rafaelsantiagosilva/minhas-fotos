<?php

namespace Controllers;

use Models\Image;
use UseCases\UploadImageUseCase;

class ImageController
{
  public function upload(string $title, ?string $description, string $user_id)
  {
    $image = new Image("", $title, "", $description, new \DateTime(), $user_id);
    $uploadImageUseCase = new UploadImageUseCase();
    $uploadImageUseCase->execute($image);
  }
}