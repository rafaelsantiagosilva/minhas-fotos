<?php

namespace Repositories;

use PDO;
use RecursiveArrayIterator;
use Database\Connection;
use Models\Image;

class ImagesRepository
{
  private PDO $conn;
  public function __construct()
  {
    $this->conn = Connection::getConnection();

    new UsersRepository(); // create the users table

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

  public function get_by_id(string $image_id)
  {
    $sql = "SELECT * FROM images WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $id);

    $id = $image_id;

    $data = [];
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $user)
      foreach ($user as $k => $row)
        $data[$k] = $row;

    if (count($data) === 0)
      return null;

    return new Image(
      $data["id"],
      $data["title"],
      $data["path"],
      $data["description"],
      new \DateTime($data["created_at"]),
      $data["user_id"]
    );
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

  public function fetch_by_user_id(string $user_id): array
  {
    $images = [];

    $sql = "SELECT * FROM images WHERE user_id = :user_id ORDER BY created_at ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":user_id", $user_id);

    $stmt->execute();

    $data = [];
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $image) {
      $data = [];

      foreach ($image as $k => $row)
        $data[$k] = $row;

      $images[] = new Image(
        $data["id"],
        $data["title"],
        $data["path"],
        $data["description"],
        new \DateTime($data["created_at"]),
        $data["user_id"]
      );
    }

    return $images;
  }

  public function delete($image_id)
  {
    $sql = "DELETE FROM images WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":id", $image_id);

    $stmt->execute();
  }
}