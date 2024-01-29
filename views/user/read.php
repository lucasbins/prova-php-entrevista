<?php
  require_once '../../controllers/userController.php';
  require_once '../header.php';

  $userController = new UserController();

  $users = $userController->getAllUsers();

  function createTable($rows) {
      foreach ($rows as $value){
          echo sprintf("<tr>
                            <td scope='row'>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>cores</td>
                            <td>
                            <a class='btn btn-warning text-white' href='../colorUser/create.php?id=%s'>Vincular Cor</a>
                                <a class='btn btn-primary text-white' href='./edit.php?id=%s'>Editar</a>
                                <a class='btn btn-danger text-white' href='./delete.php?id=%s'>Excluir</a>
                            </td>
                        </tr>",
                        $value['id'], $value['name'], $value['email'], $value['id'], $value['id'],$value['id']);
        }
  }
?>

<div>
  <div>
    <a href="../../">
      <h1>Usuários</h1>
    </a>
  </div>
  <div class="row flex-center">
		<?php 
      if(isset($_GET['response'])){
        echo ("<div class='alert alert-succes' role='alert'>");
        echo ($_GET['response']);
        echo ('</div>');
      }
     ?>
	</div>
  <table class='table'>
      <thead>
          <tr>
              <th scope='col'>ID</th>
              <th scope='col'>Nome</th>
              <th scope='col'>Email</th>
              <th scope='col'>Cores</th>
              <th scope='col'>Acões</th>
          </tr>
      </thead>
      <tbody>
          <?php createTable($users);?>
      </tbody>
  </table>
  <div>
  <a class="btn btn-success text-white" href="./create.php">Novo Usuário</a>
  </div>
</div>

<?php require_once '../footer.php'?>