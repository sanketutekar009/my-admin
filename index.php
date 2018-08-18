<?php
  /**
   * Following MVC URL structure
   * E.g localhost/controller/function
   */
  // error_reporting(E_ALL);
  // ini_set("display_errors", 1);
  // echo "<pre>";print_r($_SERVER);exit;
  $url = ltrim($_SERVER["REDIRECT_URL"], "/");
  if (strlen($url) > 0) {
    $url_array = explode("/", $url);
    // echo $_SERVER["REDIRECT_URL"];
    // echo "<pre>";print_r($url_array);
    if (!empty($url_array)) { // If $url array is not empty
      if (file_exists("controllers/".$url_array["0"].".php")) { // Check if the file exist
        require_once("controllers/".$url_array["0"].".php"); // Load the class
        if (class_exists($url_array["0"])) { // Check if the class exist
          $classObj = new $url_array["0"]; // Creating class object
          $functionName = $url_array["1"]; // Dynamic function name
          if (method_exists($classObj, $functionName)) { // Check if the method exists inside the class
            $classObj->$functionName();
          } else {
            // Function does not exist
            // Load 404 Page
            require_once("views/PageNotFound.php");
          }
        } else {
          // Class does not exist
          // Load 404 Page
          require_once("views/PageNotFound.php");
        }
      } else {
        // File does not exist 
        // Load 404 Page
        require_once("views/PageNotFound.php");
      }
    }
  } else { // else load landing page
    require_once("views/Login.php");
  }
?>