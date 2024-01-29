<?php

  require_once '../header.php';
  require_once '../../controllers/colorUserController.php';

  $controller = new ColorUserController();

  if(isset($_POST["color_id"]) && isset($_POST["user_id"]))
    $controller->removeUserColor($_POST["user_id"],$_POST["color_id"]);

?>

<div class="container">
  <div>
    <a href="./create.php?id=<?=$_GET["user_id"]?>" class="btn btn-success text-white">Voltar</a>
  </div>
  <div class="row flex-center">
    <div class="form-div">
      <form class="form" action="../colorUser/delete.php" method="POST">
        <label>Voce deseja desvincular esta cor ao usuario ?</label>
        <input type="hidden" name="color_id" value="<?=$_GET["color_id"]?>" required/>
        <input type="hidden" name="user_id" value="<?=$_GET["user_id"]?>" required/>
        <button class="btn btn-danger text-white" type="submit">Desvincular</button>
      </form>
    </div>
  </div>
</div>

<?php require_once '../footer.php'?>