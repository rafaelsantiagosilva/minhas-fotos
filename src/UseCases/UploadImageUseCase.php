<?php

namespace UseCases;

use Exceptions\InvalidImageSizeException;
use Exceptions\InvalidImageTypeException;
use Models\Image;
use Repositories\ImagesRepository;
use Ramsey\Uuid\Uuid;
use Exceptions\UploadImageErrorException;

class UploadImageUseCase
{
  private $imagesRepository;

  public function __construct()
  {
    $this->imagesRepository = new ImagesRepository();
  }

  public function execute(Image $image)
  {
    if (!$this->is_file_size_valid())
      throw new InvalidImageSizeException();

    if (!$this->is_file_type_valid())
      throw new InvalidImageTypeException();

    $imageExtension = substr($_FILES["image"]["name"], -3);
    $image->id = Uuid::uuid4()->toString();
    $image->path = "\\uploads\\{$image->user_id}\\";

    $dir = $_SERVER["DOCUMENT_ROOT"] . $image->path;
    if (!is_dir($dir))
      mkdir($dir, 0777, true);

    $dir .= "{$image->id}.$imageExtension";

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir))
      $this->imagesRepository->create_image($image);
    else
      throw new UploadImageErrorException();
  }

  private function is_file_type_valid()
  {
    $allowedTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"];
    return in_array($_FILES["image"]["type"], $allowedTypes);
  }

  private function is_file_size_valid()
  {
    $MAX_SIZE = 15 * 1024 * 1024; // 15MB
    return $_FILES["image"]["size"] <= $MAX_SIZE;
  }
}