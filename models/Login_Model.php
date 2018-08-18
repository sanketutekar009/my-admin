<?php
require_once(getcwd()."/models/DB_Model.php");

class Login_Model extends DB_Model
{
  public function __construct()
  {
    $this->mysqlConnection(); // Load database connection
  }
  
  /**
   * @abstract Validate user login
   */
  public function validateUser($response)
  {
    $query = "SELECT * 
              FROM `user` 
              WHERE emailID = '".$response["emailID"]."'
              AND userType = 'backend'";
    // echo $query;exit;
    $result = $this->connection->query($query);
    // echo "<pre>";print_r($result);exit;
    if ($result->num_rows > 0) {
      $arr = array();
      while($row = $result->fetch_assoc()) {
        // echo "<pre>";print_r($row);exit;
        if (password_verify($response["password"], $row["password"])) {
          @session_start();
          unset($row["password"]); // unset password from the array
          $_SESSION = $row; // set session
          // echo "Session<pre>";print_r($_SESSION);exit;
          $arr[] = $row;
        } else {
          return false;
        }
      }
      $this->connection->close(); // Close the connection
      return $arr;
    } else {
      return false;
    }
  }
}
?>