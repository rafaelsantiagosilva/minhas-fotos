<?php

use App\Connection;

class UsersRepository
{
  private PDO $conn;
  public function __construct()
  {
    $this->conn = Connection::getConnection();

    $sql = "CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";

    $this->conn->exec($sql);
  }
}