<?php

namespace Exceptions;

class ImageNotFoundException extends PublicException
{
  public function __construct()
  {
    parent::__construct("Imagem não encontrada.");
  }
}