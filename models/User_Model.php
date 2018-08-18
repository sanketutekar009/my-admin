<?php
require_once(getcwd().'/models/DB_Model.php');

class User_Model extends DB_Model
{
  public function __construct()
  {
    $this->mysqlConnection(); // Load database connection
  }

 /**
  * @abstract Function to create new user
  */
  public function createUser($response)
  {
    $query = "INSERT INTO `user` 
                (firstName, lastName, emailID, password, contactNumber) 
              VALUES 
                ('".$response["firstName"]."', '".$response["lastName"]."', '".$response["emailID"]."', '".$response["password"]."', '".$response["contactNumber"]."')";
    // echo $query;exit;
    if ($this->connection->query($query) === true) {
      @session_start();
      unset($response["password"]); // unset password from the array
      $_SESSION = $response; // set session
      return true;
    } else {
      return false;
    }
  }

 /**
  * @abstract Function to get active users
  */
  public function getUsers()
  {
    $query = "SELECT userID, userType, firstName, lastName, emailID, contactNumber
              FROM `user`
              WHERE isActive = '1'";
              if (isset($_POST["userID"])) {
                $query .= " AND userID = ".$_POST["userID"];
              }
    $query .= " AND userType = 'user'";
    $result = $this->connection->query($query);
    if ($result->num_rows > 0) {
      $arr = array();
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
        // echo "<pre>";print_r($row);
      }
      $this->connection->close();
      return $arr;
    } else {
      return false;
    }
  }

 /**
  * @abstract Function to update user's data
  */
  public function updateUser($response)
  {
    // echo "<pre>";print_r($response);exit;
    $query = "UPDATE `user`
              SET firstName = '".$response["firstName"]."',
              lastName = '".$response["lastName"]."',
              emailID = '".$response["emailID"]."',
              contactNumber = '".$response["contactNumber"]."' 
              WHERE userID = ".$response["userID"];
    // echo $query;exit;
    if ($this->connection->query($query) === true) {
      return true;
    } else {
      return false;
    }
  }

 /**
  * @abstract Function to delete user i.e. internally we are deactivating the user
  */
  public function deleteUser()
  {
    $query = "UPDATE `user`
              SET isActive = '0'
              WHERE userID = ".$_POST["userID"];
    // echo $query;exit;
    if ($this->connection->query($query) === true) {
      return true;
    } else {
      return false;
    }
  }
}
?>