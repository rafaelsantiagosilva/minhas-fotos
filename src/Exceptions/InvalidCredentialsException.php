<?php

namespace Exceptions;

class InvalidCredentialsException extends PublicException
{
  public function __construct()
  {
    parent::__construct("Credenciais inválidas");
  }
}