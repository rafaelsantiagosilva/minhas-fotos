<?php
require_once "../templates/header.php";
require_once "../templates/navbar.php";

use Controllers\ImageController;
use Exceptions\ImageNotFoundException;

$image = null;
$timezone = new \DateTimeZone("America/Sao_Paulo");

if (!isset($_GET["id"]))
  header("location:/index.php");

try {
  $imageId = $_GET["id"];
  $controller = new ImageController();
  $image = $controller->find_by_id($imageId);
} catch (ImageNotFoundException $ine) {
  header("location:/index.php");
} catch (Exception $e) {
  die("❌: {$e->getMessage()}");
}

?>

<a href="/pictures"
  class="border border-zinc-100 cursor-pointer mt-4 ml-4 text-lg flex items-center gap-2 w-fit px-2 py-1 rounded transition-colors hover:bg-zinc-100 hover:text-zinc-800">
  <i class="material-symbols-outlined">arrow_back</i> <span>Voltar</span>
</a>


<main class="w-full flex flex-col justify-center items-center pb-5">
  <h1 class="mt-10 text-4xl font-semibold"><?= $image->title ?></h1>
  <p class="text-sm mt-1"><?= $image->created_at->setTimezone($timezone)->format("d/m/Y") ?></p>

  <div class="w-[80%] mt-10">
    <p class="p-4 overflow-y-scroll text-justify text-lg"><?= $image->description ?>
    </p>
    <div class="flex justify-center">
      <img src="<?= $image->path ?>" alt="Imagem de <?= $image->title ?>"
        class="max-h-[700px] border-3 border-zinc-100 rounded mt-5 mx-0">
    </div>
  </div>
</main>

<?php require_once "../templates/footer.php" ?>