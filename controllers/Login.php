<?php
class Login
{
  protected $connection;

  public function __construct()
  {
    // Load database file
    require_once(getcwd()."/models/Login_Model.php");
    $this->connection = new Login_Model();
  }

  /**
   * @abstract Loads login html
   */
  public function login()
  {
    require_once(getcwd().'/views/Login.php');
  }

  /**
   * @abstract Validate user login
   */
  public function validateUser()
  {
    if (isset($_POST["emailID"]) && isset($_POST["password"])) {
      $emailID = $_POST["emailID"];
      $password = $_POST["password"];
      
      // Load InputValidation library file
      require_once(getcwd()."/libraries/InputValidation.php");
      $inputValidationObj = new InputValidation();
      $response = $inputValidationObj->validateLoginInput($emailID, $password);

      if (!is_array($response)) {
        // If email id & password data format is invalid
        $returnArray = array(
          "status" => "error",
          "message" => "Invalid data format"
        );
      } else {
        $queryResponse = $this->connection->validateUser($response);
        if (is_array($queryResponse)) {
          // If the response is an array
          $returnArray = array(
            "status" => "success",
            "message" => "Login successful"
          );
        } else {
          // If the login credentials do not match
          $returnArray = array(
            "status" => "error",
            "message" => "Invalid email and password"
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
   * @abstract Logouts the user
   */
  public function logout()
  {
    session_start();
    session_destroy(); // Destroy the session
    header("Location: http://localhost/login/login"); // Once the session is destroyed, redirect the user to login page
  }
}
?>