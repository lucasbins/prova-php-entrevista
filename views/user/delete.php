<?php

  require_once '../header.php';
  require_once '../../controllers/userController.php';

  $controller = new UserController();

  if(isset($_POST["id"]))
    $controller->deleteUser($_POST["id"]);

?>

<div class="container">
  <div>
    <a href="../../index.php" class="btn btn-success text-white">Voltar</a>
  </div>
  <div class="row flex-center">
    <div class="form-div">
      <form class="form" action="../user/delete.php" method="POST">
        <label>Voce deseja apagar este usuário ?</label>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>" required/>

        <button class="btn btn-danger text-white" type="submit">Apagar</button>
      </form>
    </div>
  </div>
</div>

<?php require_once '../footer.php'?>