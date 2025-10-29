<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

return [
  "db_host" => $_ENV["MYSQL_HOST"] ?? "127.0.0.1",
  "db_name" => $_ENV["MYSQL_DATABASE"] ?? "minhas-fotos",
  "db_user" => $_ENV["MYSQL_USER"] ?? "root",
  "db_pass" => $_ENV["MYSQL_PASSWORD"] ?? "root",
];