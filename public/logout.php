<?php
require_once "./templates/header.php";

session_start();
unset($_SESSION["user"]);
session_destroy();
header("location:/index.php");

require_once "./templates/footer.php";
