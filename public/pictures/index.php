<?php require_once "../templates/header.php" ?>
<?php require_once "../templates/navbar.php" ?>

<?php
use Controllers\ImageController;

$controller = new ImageController();
$user_id = $_SESSION["user"]->id;
$images = $controller->fetch_by_user_id($user_id);
?>

<div class="w-full flex justify-end">
  <a href="./add.php"
    class="p-2 bg-zinc-100 hover:bg-zinc-200 rounded text-zinc-800 cursor-pointer flex items-center gap-1 mt-10 mr-5">
    <i class="material-symbols-outlined">control_point</i>
    Adicionar
  </a>
</div>

<main class="w-full h-[80%] flex items-center justify-center mb-10">
  <?php if (count($images) === 0): ?>

    <p class="font-semibold text-zinc-700 text-4xl text-center w-[60%] absolute">Não há nenhuma foto para mostrar. Comece
      adicionando algumas ;)</p>

  <?php endif; ?>

  <section class="flex flex-wrap justify-center md:justify-start w-full h-full gap-4 overflow-x-auto pt-4 px-6">
    <?php foreach ($images as $image): ?>
      <a href="#" class="w-64 h-[400px] shadow border-4 hover:scale-105 border-zinc-700 transition-all rounded-sm">
        <img src="<?= $image->path ?>" alt="Imagem de <?= $image->title ?>"
          class="w-full h-40 object-cover rounded border-b-4 border-zinc-700 rounded-b-none">
        <h2 class="text-zinc-100 text-lg font-semibold p-2 w-full border-b-4 border-zinc-700 truncate">
          <?= $image->title ?>
        </h2>
        <p class="p-2 h-[160px] line-clamp-7"><?= $image->description ?></p>
        <footer class="w-full border-t-4 border-zinc-700 text-sm pt-1"><?= $image->created_at->format("d/m/Y") ?></footer>
      </a>
    <?php endforeach; ?>
  </section>
</main>

<?php require_once "../templates/footer.php" ?>