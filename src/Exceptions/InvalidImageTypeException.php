<?php

namespace Exceptions;

class InvalidImageTypeException extends PublicException
{
  public function __construct()
  {
    parent::__construct("Os tipos aceitos são: JPG, JPEG, PNG, GIF e WEBP.");
  }
}