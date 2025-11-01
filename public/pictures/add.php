<?php require_once "../templates/header.php" ?>
<?php require_once "../templates/navbar.php" ?>

<main class="w-full flex flex-col justify-center items-center">
  <form class="w-full h-full flex flex-col md:flex-row mt-4">
    <div class="w-full md:w-1/2 h-[80%] flex flex-col px-4 py-2 items-center justify-between">
      <input type="text" name="title" id="inpTitle"
        class="rounded border border-zinc-100 p-2 w-full mt-2 focus:outline-none" placeholder="Título">

      <input type="file" name="image" id="inpImage" class="hidden" accept="image/*">
      <label for="inpImage"
        class="flex flex-col relative items-center justify-center  text-3xl cursor-pointer mt-10 border border-zinc-100 rounded p-4 w-full">
        <img src="/images/photos.png" class="w-80" id="imgPreview">
        <button id="btnRemoveImage"
          class="material-symbols-outlined text-xl absolute right-2 top-2 invisible transition-transform hover:scale-110 cursor-pointer">
          cancel
        </button>
        <br>
        <span class="text-center" id="spnImageLabel">Enviar imagem</span>
      </label>
    </div>

    <div class="w-full md:w-1/2 p-4">
      <textarea rows="10" name="description" id="txtDescription"
        class="border rounded border-zinc-100 w-full h-[80%] p-2 focus:outline-none"
        placeholder="Descrição da imagem"></textarea>
      <button type="submit"
        class="rounded p-2 text-zinc-800 bg-zinc-100 hover:bg-zinc-200 cursor-pointer font-semibold w-full">Adicionar
        imagem</button>
    </div>

  </form>
</main>

<a href="/pictures"
  class="border border-zinc-100 cursor-pointer mt-4 ml-4 text-lg flex items-center gap-2 w-fit px-2 py-1 rounded transition-colors hover:bg-zinc-100 hover:text-zinc-800">
  <i class="material-symbols-outlined">arrow_back</i> <span>Voltar</span>
</a>

<?php require_once "../templates/footer.php" ?>