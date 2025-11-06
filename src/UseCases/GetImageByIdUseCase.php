<?php

namespace UseCases;

use Exceptions\ImageNotFoundException;
use Models\Image;
use Repositories\ImagesRepository;

class GetImageByIdUseCase
{
  private $imagesRepository;

  public function __construct()
  {
    $this->imagesRepository = new ImagesRepository();
  }

  public function execute(string $image_id): Image
  {
    $image = $this->imagesRepository->get_by_id($image_id);

    if ($image === null)
      throw new ImageNotFoundException();

    return $image;
  }
}