<?php
require_once "./templates/header.php";

session_start();

if (isset($_SESSION["user"]))
  header("location:pictures");
?>

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
      class="w-[38%] absolute bottom-0 mt-4">
  </div>
  <div class="h-full w-full md:w-1/2 flex flex-col justify-center items-center">
    <h1 class="md:hidden text-3xl font-bold absolute top-28">Minhas Fotos</h1>

    <form class="flex flex-col justify-center w-[80%] gap-3 text-xl" action="" method="post">
      <h2 class="text-2xl font-bold text-center">Login</h2>

      <div class="flex flex-col">
        <label for="email">Email</label>
        <input type="email" name="email" id="inpEmail" value="<?= $_POST["email"] ?? "" ?>"
          class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1">
      </div>

      <div class="flex flex-col">
        <label for="email">Senha</label>
        <div id="inpPassContainer" class="relative w-full">
          <input type="password" name="pass" id="inpPass" value="<?= $_POST["pass"] ?? "" ?>"
            class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1 w-full">
          <span class="absolute right-0 mt-2 mr-2 z-10 material-symbols-outlined cursor-pointer"
            id="eye">visibility</span>
        </div>
      </div>

      <button type="submit"
        class="bg-zinc-100 hover:bg-zinc-200 text-zinc-800 cursor-pointer rounded font-semibold p-2 mt-2">
        Entrar
      </button>


      <a href="./register.php" class="underline cursor-pointer text-center text-lg hover:text-zinc-100">Não possui uma
        conta?
        Criar</a>
    </form>
  </div>
</div>

<?php
use Controllers\UserController;
use Exceptions\PublicException;

$alert_messages = [];

function alert(string $message)
{
  global $alert_messages;
  array_push($alert_messages, $message);
}

switch ($_SERVER["REQUEST_METHOD"]) {
  case "POST":
    $controller = new UserController();

    if (
      !isset($_POST["email"], $_POST["pass"]) ||
      trim($_POST["email"]) === "" ||
      trim($_POST["pass"]) === ""
    ) {
      alert("Atenção: preencha todos os campos obrigatórios!");
      break;
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      alert("Atenção: insira um e-mail válido!");
      break;
    }

    try {
      $email = htmlspecialchars($_POST["email"]);
      $pass = htmlspecialchars($_POST["pass"]);

      $_SESSION["user"] = $controller->login($email, $pass);
      header("location:pictures");
      exit;
    } catch (PublicException $pe) {
      alert($pe->getMessage());
      break;
    } catch (Exception $e) {
      die("❌: {$e->getMessage()}");
    }
  default:
    # code...
    break;
}

?>

<?php if (count($alert_messages) !== 0): ?>

  <?php foreach ($alert_messages as $message): ?>

    <script>
      alert("<?= htmlspecialchars($message) ?>")
    </script>

    <?php
  endforeach;
  $alert_messages = [];
  ?>


<?php endif ?>

<?php require_once "./templates/footer.php" ?>