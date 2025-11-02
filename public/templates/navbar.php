<?php

session_start();

if (!isset($_SESSION["user"]))
  header("location:/index.php");

$username = explode(" ", $_SESSION["user"]->name)[0];

?>

<header class="w-full h-14 shadow bg-zinc-900 py-2 px-4 flex justify-between items-center">
  <a href="/pictures">
    <h1 class="text-slate-100 font-bold text-lg text-center">Minhas Fotos</h1>
  </a>

  <span class="flex gap-2 cursor-pointer">
    <i class="material-symbols-outlined text-xl">account_circle</i>
    <p class="truncate w-fit max-w-28"><?= $username ?></p>
  </span>
</header>