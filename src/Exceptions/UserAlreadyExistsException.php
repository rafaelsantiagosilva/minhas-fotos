<?php

namespace Exceptions;

use Exception;

class UserAlreadyExistsException extends PublicException
{
  public function __construct()
  {
    parent::__construct("Já existe um usuário com esse e-mail");
  }
}