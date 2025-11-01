<?php

use App\Connection;

class ImagesRepository
{
  private PDO $conn;
  public function __construct()
  {
    $this->conn = Connection::getConnection();

    $usersRepository = new UsersRepository(); // create the users table

    $sql = "CREATE TABLE IF NOT EXISTS images (
    id VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    created_at DATETIME NOT NULL,
    user_id VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";

    $this->conn->exec($sql);
  }
}