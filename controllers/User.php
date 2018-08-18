<?php 
class User
{
  protected $connection;

  public function __construct () 
  {
    // Load database file
    require_once(getcwd()."/models/User_Model.php");
    $this->connection = new User_Model();
  }

  /**
   * @abstract Function to create new user
   * @verb POST
   */
  public function createUser()
  {
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["emailID"]) && isset($_POST["password"]) && isset($_POST["contactNumber"])) {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $emailID = $_POST["emailID"];
      $password = $_POST["password"];
      $contactNumber = $_POST["contactNumber"];

      // Load InputValidation library file
      require_once(getcwd()."/libraries/InputValidation.php");
      $inputValidationObj = new InputValidation();
      $response = $inputValidationObj->validateSignUpInput($firstName, $lastName, $emailID, $password, $contactNumber);
      if (!is_array($response)) {
        // If first name, last name, email id, password & contact number data format is invalid
        $returnArray = array(
          "status" => "error",
          "message" => "Invalid data format"
        );
      } else {
        $queryResponse = $this->connection->createUser($response);
        if ($queryResponse) {
          // If the response is an array
          $returnArray = array(
            "status" => "success",
            "message" => "User successfully created"
          );
        } else {
          // If the login credentials do not match
          $returnArray = array(
            "status" => "error",
            "message" => "Please try again"
          ); 
        }
      }
    } else {
      // If POST is empty
      $returnArray = array(
        "status" => "error",
        "message" => "Invalid data format"
      );
    }
    echo json_encode($returnArray);
  }

  /**
   * @abstract Function to get users
   * @verb POST
   */
  public function getUsers()
  {
    session_start();
    if (!empty($_SESSION)) {
      $users = $this->connection->getUsers();
      // echo "<pre>";print_r($users);
      $returnArray = array();
      if (!empty($users)) {
        $returnArray["status"] = "success";
        $returnArray["message"] = $users;
      } else {
        $returnArray["status"] = "error";
        $returnArray["message"] = array();
      }
    } else {
      // Redirect the user to login page
      $returnArray = array(
        "status" => "unauthorized",
        "message" => array()
      );
    }
    echo json_encode($returnArray);
  }

  /**
   * @abstract Function to update user's data
   * @verb POST
   */
  public function updateUser()
  {
    session_start();
    if (!empty($_SESSION)) {
      if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["emailID"]) && isset($_POST["contactNumber"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $emailID = $_POST["emailID"];
        $contactNumber = $_POST["contactNumber"];
        $userID = $_POST["userID"];
  
        // Load InputValidation library file
        require_once(getcwd()."/libraries/InputValidation.php");
        $inputValidationObj = new InputValidation();
        $response = $inputValidationObj->validateUpdateInput($firstName, $lastName, $emailID, $contactNumber, $userID);
        if (!is_array($response)) {
          // If first name, last name, email id, & contact number data format is invalid
          $returnArray = array(
            "status" => "error",
            "message" => "Invalid data format"
          );
        } else {
          $queryResponse = $this->connection->updateUser($response);
          if ($queryResponse) {
            // If the response is an array
            $returnArray = array(
              "status" => "success",
              "message" => "User successfully updated"
            );
          } else {
            // If the login credentials do not match
            $returnArray = array(
              "status" => "error",
              "message" => "Please try again"
            ); 
          }
        }
      } else {
        // If POST is empty
        $returnArray = array(
          "status" => "error",
          "message" => "Invalid data format"
        );
      }
    } else {
      // Redirect the user to login page
      $returnArray = array(
        "status" => "unauthorized",
        "message" => array()
      );
    }
    echo json_encode($returnArray);
  }

  /**
   * @abstract Function to delete user i.e. internally the user is deactivated
   * @verb POST
   */
  public function deleteUser()
  {
    session_start();
    if (!empty($_SESSION)) {
      $response = $this->connection->deleteUser();
      // echo $response;exit;
      if (!$response) {
        $returnArray = array(
          "status" => "error",
          "message" => "Please try again"
        );
      } else {
        $returnArray = array(
          "status" => "success",
          "message" => "User successfully deleted"
        );
      }
    } else {
      // Redirect the user to login page
      $returnArray = array(
        "status" => "unauthorized",
        "message" => array()
      );
    }
    echo json_encode($returnArray);
  }
}
?>