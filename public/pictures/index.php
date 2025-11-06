<?php require_once "../templates/header.php" ?>
<?php require_once "../templates/navbar.php" ?>

<?php
use Controllers\ImageController;

$controller = new ImageController();
$user_id = $_SESSION["user"]->id;
$images = $controller->fetch_by_user_id($user_id);
$timezone = new \DateTimeZone("America/Sao_Paulo");
?>

<div class="w-full flex justify-end">
  <a href="/pictures/add.php"
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

  <div class="flex flex-wrap justify-center md:justify-start w-full h-full gap-4 overflow-x-auto pt-4 px-6">
    <?php foreach ($images as $idx => $image): ?>
      <section class="w-64 h-[400px] shadow border-4 border-zinc-700 bg-zinc-900 transition-all rounded-sm">
        <div class="relative">
          <img src="<?= $image->path ?>" alt="Imagem de <?= $image->title ?>"
            class="w-full h-40 object-cover rounded border-b-4 border-zinc-700 rounded-b-none">
          <div class="flex items-center justify-end gap-1 absolute bottom-2 right-1">
            <a href="/pictures/view.php?id=<?= $image->id ?>"
              class="rounded-full cursor-pointer text-sky-500 bg-zinc-800 hover:bg-zinc-700 flex items-center justify-center size-9 border-2 border-sky-900 shadow">
              <i class="material-symbols-outlined">search</i>
            </a>
            <button
              class="btnDeleteImage rounded-full cursor-pointer text-red-500 bg-zinc-800 hover:bg-zinc-700 flex items-center justify-center size-9 border-2 border-red-900 shadow">
              <i class="material-symbols-outlined">delete</i>
            </button>
          </div>
        </div>
        <h2 class="text-zinc-100 text-lg font-semibold p-2 w-full border-b-4 border-zinc-700 truncate">
          <?= $image->title ?>
        </h2>
        <p class="p-2 h-[160px] line-clamp-7"><?= $image->description ?></p>
        <footer class="w-full border-t-4 border-zinc-700 text-sm pt-1">
          <?= $image->created_at->setTimezone($timezone)->format("d/m/Y") ?>
        </footer>
      </section>

      <div class="overlay hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 transition-all">
      </div>

      <dialog
        class="dlgDeleteDialog hidden fixed border-4 border-zinc-700 bg-zinc-800 py-2 px-4 text-zinc-100 rounded md:w-[60%] h-1/2 md:h-1/4 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50"
        open>
        <h3 class="text-lg underline font-bold text-center">Atenção!</h3>
        <p class="mt-3">Você tem certeza que deseja excluir a imagem "<?= $image->title ?>"? Essa ação não pode ser
          desfeita.</p>
        <div class="flex flex-col md:flex-row items-center justify-center md:justify-end gap w-full">
          <a href="/pictures/delete.php?id=<?= $image->id ?>"
            class="text-center p-2 bg-zinc-100 hover:bg-zinc-200 rounded text-zinc-800 cursor-pointer flex items-center gap-1 mt-10 mr-5 transition-all w-24">
            Confirmar
          </a>
          <button
            class="btnCloseDialog text-center p-2 bg-zinc-900 hover:bg-zinc-700 rounded cursor-pointer flex items-center gap-1 mt-10 mr-5 transition-all w-24">
            Cancelar
          </button>
        </div>
      </dialog>
    <?php endforeach; ?>
  </div>
</main>

<?php require_once "../templates/footer.php" ?>