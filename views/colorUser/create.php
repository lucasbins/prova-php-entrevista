<?php

  require_once '../header.php';
  require_once '../../controllers/userController.php';
  require_once '../../controllers/colorUserController.php';
  require_once '../../controllers/colorController.php';

  $controller = new UserController();
  $colorUserController = new ColorUserController();
  $colorController = new ColorController();

 
  $user = $controller->findUserById($_GET['id']);

  $listUserColors = $colorUserController->getAllColorsUser($_GET['id']);

  $listColors = $colorController->getAllColors();

  if(isset($_POST["color_id"]) && isset($_POST["user_id"]))
      $colorUserController->setUserColor($_POST["user_id"],$_POST["color_id"]);

  


  function showColor($color,$color_id){
    switch($color){
      case 'Blue':
        echo "<a href='./delete.php?color_id=".$color_id."&user_id=".$_GET['id']."' class='bg-primary rounded-circle ' title='Desvincular Cor' style='width: 45;height:45;'> </a>";
        break;
      case 'Red':
        echo "<a href='./delete.php?color_id=".$color_id."&user_id=".$_GET['id']."' class='bg-danger rounded-circle' title='Desvincular Cor' style='width: 45;height:45;'> </a>";
        break;
      case 'Yellow':
        echo "<a href='./delete.php?color_id=".$color_id."&user_id=".$_GET['id']."' class='bg-warning rounded-circle' title='Desvincular Cor' style='width: 45;height:45;'> </a>";
        break;
      case 'Green':
        echo "<a href='./delete.php?color_id=".$color_id."&user_id=".$_GET['id']."' class='bg-success rounded-circle ' title='Desvincular Cor' style='width: 45;height:45;'> </a>";
        break;
    }
  }

?>

<div class="container">
  <div>
    <a href="../../index.php" class="btn btn-success text-white">Voltar</a>
  </div>
  <div class="row flex-center">
    <div>
    <?php 
      if(isset($_GET['response'])){
        echo ("<div class='alert alert-succes' role='alert'>");
        echo ($_GET['response']);
        echo ('</div>');
      }
     ?>
      <table class='table'>
        <thead>
          <th>Nome</th>
          <th>Email</th>
          <th>Cores Vinculadas</th>
        </thead>
        <tbody>
          <tr>
            <td><?=$user['name']?></td>
            <td><?=$user['email']?></td>
            <td class="d-flex flex-row gap-2">
              <?php 
                foreach($listUserColors as $userColor){
                  showColor($userColor->name,$userColor->id);
                }
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="form-div">
      <form class="form-control" action="../colorUser/create.php" method="POST">
        <input type="hidden" name="user_id" value="<?=$_GET['id']?>" required/>
        <select name="color_id" id="color" class="form-control">
          <?php
            foreach($listColors as $color){
              echo sprintf("<option value='%s'>%s</option>",$color['id'],$color['name']);
            }
          ?>
        </select>
        <button class="btn btn-success text-white mt-1" type="submit">Vincular Cor</button>
      </form>
    </div>
  </div>
</div>

<?php require_once '../footer.php'?>