<?php require_once "./templates/header.php" ?>

<div class="h-full w-full flex flex-col justify-center items-center">
  <h1 class="md:hidden text-3xl font-bold absolute top-28">Minhas Fotos</h1>

  <form class="flex w-[90%] md:w-[60%] flex-col justify-center gap-3 text-xl"
    action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h2 class="text-2xl font-bold text-center">Criar conta</h2>

    <div class="flex flex-col">
      <label for="inpName">Nome*</label>
      <input type="text" name="name" id="inpName" value="<?= $_POST["name"] ?? "" ?>"
        class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1">
    </div>

    <div class="flex flex-col">
      <label for="inpEmail">Email*</label>
      <input type="email" name="email" id="inpEmail" value="<?= $_POST["email"] ?? "" ?>"
        class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1">
    </div>

    <div class="flex flex-col">
      <label for="email">Senha*</label>
      <div id="inpPassContainer" class="relative w-full">
        <input type="password" name="pass" id="inpPass" value="<?= $_POST["pass"] ?? "" ?>"
          class="bg-zinc-700 border border-zinc-600 rounded focus:outline-none px-2 py-1 w-full">
        <span class="absolute right-0 mt-2 mr-2 z-10 material-symbols-outlined cursor-pointer"
          id="eye">visibility</span>
      </div>
    </div>

    <p class="text-zinc-600 text-center text-sm my-2">* representa um campo obrigatório</p>

    <button type="submit"
      class="bg-zinc-100 hover:bg-zinc-200 text-zinc-800 cursor-pointer rounded font-semibold p-2 mt-2">
      Criar
    </button>


    <a href="./index.php" class="underline cursor-pointer text-center text-lg hover:text-zinc-100">Já possui uma conta?
      Entrar</a>
  </form>
</div>

<?php
require_once __DIR__ . "/../vendor/autoload.php";
use Controllers\UserController;
use Exceptions\PublicException;

session_start();

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
      !isset($_POST["name"], $_POST["email"], $_POST["pass"]) ||
      trim($_POST["name"]) === "" ||
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

    if (strlen($_POST["pass"]) < 6) {
      alert("Atenção: a senha deve ter 6 ou mais caracteres");
      break;
    }

    try {
      $name = htmlspecialchars($_POST["name"]);
      $email = htmlspecialchars($_POST["email"]);
      $pass = htmlspecialchars($_POST["pass"]);

      $controller->register($name, $email, $pass);
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