<?php

session_start();

if (!isset($_SESSION["user"]))
  header("location:/index.php");

$username = $_SESSION["user"]->name;

?>

<header class="w-full h-14 shadow bg-zinc-900 py-2 px-4 flex justify-between items-center">
  <a href="/pictures">
    <h1 class="text-slate-100 font-bold text-lg text-center">Minhas Fotos</h1>
  </a>

  <div>
    <span id="spnProfile" class="flex gap-2 cursor-pointer">
      <i class="material-symbols-outlined text-xl">account_circle</i>
      <p class="truncate w-28"><?= $username ?></p>
    </span>

    <div id="divLogout"
      class="bg-zinc-700 absolute w-fit mt-2 rounded-sm shadow border border-zinc-600 hidden transition-all">
      <ul class="flex flex-col gap-2 w-36">
        <li class="p-2 text-red-500 hover:text-red-400 cursor-pointer">
          <a href="/logout.php" class="flex items-center"><i class="material-symbols-outlined">logout</i> Sair</a>
        </li>
      </ul>
    </div>
  </div>
</header>