<?php
require_once 'connection.php';

class Users extends Connection{
  
  private $id;
  private $name;
  private $email;

  //Setters
  public function setName($string){
    $this->name = $string;
  }
  public function setEmail($string){
    $this->email = $string;
  }

  //Getters
  public function getName(){
    return $this->name;
  }
  public function getEmail(){
    return $this->email;
  }
}