<?php

namespace UseCases;

use Repositories\ImagesRepository;

class DeleteImageUseCase
{
  private $imagesRepository;

  public function __construct()
  {
    $this->imagesRepository = new ImagesRepository();
  }

  public function execute(string $image_id): void
  {
    $image = $this->imagesRepository->get_by_id($image_id);

    if ($image === null)
      throw new ImageNotFoundException();

    unlink($_SERVER["DOCUMENT_ROOT"] . $image->path);
    $this->imagesRepository->delete($image_id);
  }
}