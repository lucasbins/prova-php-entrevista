<?php

require_once __DIR__ . '/../models/connection.php';

class ColorController {

  private $colordb;
  private $listColors;

  public function __construct(){
    $this->colordb = new connection();
  }

  public function getAllColors(){
    $this->listColors = $this->colordb->getAllColors();

    return $this->listColors;
  }
}