<?php

namespace Exceptions;

class UploadImageErrorException extends PublicException
{
  public function __construct()
  {
    parent::__construct("Erro ao fazer upload da imagem. Tente novamente mais tarde.");
  }
}