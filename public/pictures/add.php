<?php require_once "../templates/header.php" ?>
<?php require_once "../templates/navbar.php" ?>

<a href="/pictures.php" class="hover:underline cursor-pointer ml-4 pt-4 text-lg mt-16">
  &lt; Voltar
</a>

<main class="w-full flex flex-col justify-center items-center">
  <form class="w-full h-full flex flex-col md:flex-row mt-4">
    <div class="w-full md:w-1/2 h-[80%] p-4 flex flex-col items-center justify-between">
      <input type="text" name="title" id="inpTitle"
        class="rounded border border-zinc-100 p-2 w-full mt-2 focus:outline-none" placeholder="Título">

      <input type="file" name="image" id="inpImage" class="hidden">
      <label for="inpImage"
        class="flex flex-col items-center justify-center  text-3xl cursor-pointer mt-10 border border-zinc-100 rounded p-4 w-full">
        <img src="/images/photos.png" class="w-80" alt="">
        <br>
        <span class="text-center">Enviar imagem</span>
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

<?php require_once "../templates/footer.php" ?>