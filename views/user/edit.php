<?php

  require_once '../header.php';
  require_once '../../controllers/userController.php';

  $controller = new UserController();

  if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"]))
    $controller->editUser($_POST["id"],$_POST["name"],$_POST["email"]);

  $user = $controller->findUserById($_GET['id']);

?>

<div class="container">
  <div>
    <a href="../../index.php" class="btn btn-success text-white">Voltar</a>
  </div>
  <div class="row flex-center">

    <div class="form-div">
      <form class="form" action="../user/edit.php" method="POST">
        <input type="hidden" name="id" value="<?=$user['id']?>" required/>
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?=$user['name']?>" required/>
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?=$user['email']?>" required/>

        <button class="btn btn-success text-white" type="submit">Salvar</button>
      </form>
    </div>
  </div>
</div>

<?php require_once '../footer.php'?>