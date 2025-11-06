<?php
require_once "../templates/header.php";

use Controllers\ImageController;
use Exceptions\ImageNotFoundException;

session_start();

if (!isset($_SESSION["user"], $_GET["id"]))
  header("location:/index.php");

try {
  $imageId = $_GET["id"];
  $controller = new ImageController();
  $controller->delete($imageId);
  header("location:/index.php");
} catch (ImageNotFoundException $ine) {
  header("location:/index.php");
} catch (Exception $e) {
  die("❌: {$e->getMessage()}");
}

require_once "../templates/footer.php";