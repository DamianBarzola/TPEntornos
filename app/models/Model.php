<?php
# Modelo base

class Model
{
  /**
  * @var object
  */
  protected $db;

  /**
  * Inicializa conexion
  */
  public function __construct()
  {
    $this->db = new Mysqli("localhost", "root", "root", "pps");
  }

  /**
  * Finaliza conexion
  */
  public function __destruct()
  {
    $this->db->close();
  }
}