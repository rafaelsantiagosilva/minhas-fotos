<?php

namespace Models;

class Image
{
  public function __construct(
    string $id,
    string $title,
    string $path,
    ?string $description,
    DateTime $created_at,
    string $user_id
  ) {
    $this->id = $id;
    $this->title = $title;
    $this->path = $path;
    $this->description = $description;
    $this->created_at = $created_at;
    $this->user_id = $user_id;
  }
}