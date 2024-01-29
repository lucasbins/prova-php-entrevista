<?php

require_once __DIR__ . '/../models/connection.php';

class ColorUserController {

  private $listUserColor;
  private $userColor;

  public function __construct(){
    $this->userColor = new connection();
  }

  public function getAllColorsUser($id_user){
    $this->listUserColor = $this->userColor->getUserColor($id_user);

    return $this->listUserColor;
  }

  public function setColorUser($user_id, $color_id){
    $createUserColor = $this->userColor->createUserColor($user_id,$color_id);
    $response = $createUserColor ? 'Cor vinculada com Sucesso' : 'Erro na vinculação da cor';
    return header("Location: ./create.php?id=$user_id&response=$response");
  }

  public function removeUserColor($user_id, $color_id){
    $createUserColor = $this->userColor->deleteUserColor($user_id,$color_id);
    $response = $createUserColor ? 'Cor desvinculada com Sucesso' : 'Erro na desvinculação da cor';
    return header("Location: ./create.php?id=$user_id&response=$response");
  }
}