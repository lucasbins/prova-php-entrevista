<?php

  require_once '../header.php';
  require_once '../../controllers/userController.php';

  $controller = new UserController();

  if(isset($_POST["name"]) && isset($_POST["email"]))
    $controller->createUser($_POST["name"],$_POST["email"]);

?>

<div class="container">
  <div>
    <a href="../../index.php" class="btn btn-success text-white">Voltar</a>
  </div>
  <div class="row flex-center">
    <div class="form-div">
      <form class="form" action="../user/create.php" method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" required/>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required/>

        <button class="btn btn-success text-white" type="submit">Salvar</button>
      </form>
    </div>
  </div>
</div>

<?php require_once '../footer.php'?>