<?php

namespace Controllers;

use Models\Image;
use UseCases\GetImageByIdUseCase;
use UseCases\UploadImageUseCase;
use UseCases\FetchUserImagesUseCase;
use UseCases\DeleteImageUseCase;

class ImageController
{
  public function find_by_id(string $image_id): Image
  {
    $getImageByIdUseCase = new GetImageByIdUseCase();
    return $getImageByIdUseCase->execute($image_id);
  }

  public function upload(string $title, ?string $description, string $user_id)
  {
    $image = new Image(
      "",
      $title,
      "",
      $description,
      new \DateTime("now", new \DateTimeZone("UTC")),
      $user_id
    );

    $uploadImageUseCase = new UploadImageUseCase();
    $uploadImageUseCase->execute($image);
  }

  public function fetch_by_user_id(string $user_id): array
  {
    $fetchUserImagesUseCase = new FetchUserImagesUseCase();
    return $fetchUserImagesUseCase->execute($user_id);
  }

  public function delete(string $image_id): void
  {
    $deleteImageUseCase = new DeleteImageUseCase();
    $deleteImageUseCase->execute($image_id);
  }
}