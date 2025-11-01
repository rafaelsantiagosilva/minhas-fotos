<?php

namespace Database;

class Connection
{
  private static ?\PDO $instance = null;

  public static function getConnection(): \PDO
  {
    if (self::$instance === null) {
      $config = require __DIR__ . "/../config.php";
      self::$instance = new \PDO(
        "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8",
        $config['db_user'],
        $config['db_pass']
      );

      self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    return self::$instance;
  }
}
