<?php

namespace Exceptions;

class InvalidImageSizeException extends PublicException
{
  public function __construct()
  {
    parent::__construct("O tamanho da image deve ser menor ou igual a 15MB.");
  }
}