<?php

namespace Repositories;

use Models\User;
use PDO;
use Database\Connection;

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

  public function create_user(User $user)
  {
    $sql = "INSERT INTO users (id, name, email, password)
    VALUES (:id, :name, :email, :password)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);

    $id = $user->id;
    $name = $user->name;
    $email = $user->email;
    $password = $user->password;

    $stmt->execute();
  }
}