<?php

namespace Repositories;

use PDO;
use Database\Connection;
use Models\Image;

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

  public function create_image(Image $image): void
  {
    $sql = "INSERT INTO images (id, title, path, description, created_at, user_id) 
    VALUES (:id, :title, :path, :description, :created_at, :user_id)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(":id", $image->id);
    $stmt->bindParam(":title", $image->title);
    $stmt->bindParam(":path", $image->path);
    $stmt->bindParam(":description", $image->description);

    $createdAt = $image->created_at->format("Y-m-d H:i:s");
    $stmt->bindParam(":created_at", $createdAt);
    $stmt->bindParam(":user_id", $image->user_id);

    $stmt->execute();
  }
}