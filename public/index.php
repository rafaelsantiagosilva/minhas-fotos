<?php require_once "./templates/header.php" ?>

<div class="flex h-dvh w-full">
  <div class="hidden md:flex flex-col items-center h-full w-1/2">
    <section class="mt-20 text-center flex flex-col items-center">
      <h1 class="text-3xl font-bold ">Minhas Fotos</h1>
      <p class="mt-12 text-2xl w-[80%] leading-relaxed">Aqui você pode guardar suas memórias, recordações e melhores
        momentos de
        sua
        jornada.
        Reviva os dias
        especiais, as conquinstas e os instantes de sua vida. Coloque-os aqui para os valorizar e não perdê-los ao
        longo do tempo.</p>
    </section>

    <img src="./images/picture.png" alt="Um quadro marrom de madeira com um desenho de uma montanha."
      class="w-[600px] absolute bottom-2">
  </div>
  <div class="h-full w-full md:w-1/2 flex flex-col justify-center items-center">
    <form class="flex flex-col justify-center w-[80%] gap-3 text-xl" action="" method="post">
      <h2 class="text-2xl font-bold text-center">Login</h2>

      <div class="flex flex-col">
        <label for="email">Email</label>
        <input type="email" name="email" id="inpEmail"
          class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1">
      </div>

      <div class="flex flex-col">
        <label for="email">Senha</label>
        <input type="password" name="pass" id="inpPass"
          class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1">
      </div>

      <button type="submit"
        class="bg-zinc-100 hover:bg-zinc-200 text-zinc-800 cursor-pointer rounded font-semibold p-2 mt-2">
        Entrar
      </button>


      <a href="#" class="underline cursor-pointer text-center text-lg hover:text-zinc-100">Não possui uma conta?
        Criar</a>
    </form>
  </div>
</div>

<?php require_once "./templates/footer.php" ?>