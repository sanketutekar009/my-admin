<?php
class SignUp
{
  protected $connection;
  
  public function __construct()
  {
    // Load database file
    require_once(getcwd()."/models/Login_Model.php");
    $this->connection = new Login_Model();
  }

  /**
   * @abstract Loads sign up html
   */
  public function signUp()
  {
    require_once(getcwd().'/views/SignUp.php');
  }
}
?>