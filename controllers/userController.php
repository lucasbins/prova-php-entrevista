<?php

require_once __DIR__ . '/../models/connection.php';

class UserController {
  private $list;
  private $user;

  public function __construct(){
    $this->user = new connection();
  }

  public function getAllUsers(){
    $this->list = $this->user->getAllUsers();

    return $this->list;
  }

  public function findUserById($id){
    $user = $this->user->findById($id);

    return $user;
  }

  public function createUser($name, $email){
    $createUser = $this->user->setUser($name,$email);
    $response = $createUser ? 'Usuário Criado com Sucesso' : 'Erro na criação do Usuário';
    return header("Location: ./read.php?response=$response");
  }

  public function editUser($id, $name, $email){
    $updateUser = $this->user->updateUser($id,$name,$email);
    $response = $createUser ? 'Usuário editado com Sucesso' : 'Erro na edição do Usuário';
    return header("Location: ./read.php?response=$response");
  }

  public function deleteUser($id){
    $deleteUser = $this->user->deleteUser($id);
    $response = $deleteUser ? 'Usuário apagado com Sucesso' : 'Erro ao apagar o Usuário';
    return header("Location: ./read.php?response=$response");
  }

}