<?php

class DB_Model
{
  protected $connection;

  /**
   * @abstract Function to connect to mysql server
   */
  protected function mysqlConnection()
  {
    // Connecting to Mysql server through PHP
    $this->connection = mysqli_connect('localhost','root','','my_admin');
    // Check connection
    if (mysqli_connect_errno()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }
}
?>