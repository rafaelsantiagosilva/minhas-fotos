<?php
namespace Repositories;

use Database\Connection;
use Models\User;
use PDO;
use RecursiveArrayIterator;

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

  public function get_by_email(string $user_email)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":email", $email);

    $email = $user_email;

    $data = [];
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $user)
      foreach ($user as $k => $row)
        $data[$k] = $row;

    if (count($data) === 0)
      return null;

    return new User(
      $data["id"],
      $data["name"],
      $data["email"],
      $data["password"]
    );
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