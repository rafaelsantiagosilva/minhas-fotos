<?php require_once "./templates/header.php" ?>
<?php require_once "./templates/navbar.php" ?>

<div class="w-full flex justify-end">
  <a href="./pictures/add.php"
    class="p-2 bg-zinc-100 hover:bg-zinc-200 rounded text-zinc-800 cursor-pointer flex items-center gap-1 mt-10 mr-5">
    <i class="material-symbols-outlined">control_point</i>
    Adicionar
  </a>
</div>

<main class="w-full h-[80%] flex items-center justify-center">
  <p class="font-semibold text-zinc-700 text-4xl text-center w-[60%]">Não há nenhuma foto para mostrar. Comece
    adicionando algumas ;)</p>
</main>

<?php require_once "./templates/footer.php" ?>