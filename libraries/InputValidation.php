<?php
class InputValidation
{
    protected $emailErr = "";
    protected $passwordErr = "";
    protected $contactNumberErr = "";

   /**
    * @abstract Functionto validate login data
    */
    public function validateLoginInput($emailID, $password)
    {
        $emailID = $this->testInput($emailID);
        // Check if email address is well-formed
        if (!filter_var($emailID, FILTER_VALIDATE_EMAIL)) {
            $this->emailErr = "Invalid email format"; 
        }

        $password = $this->testInput($password);
        // Check if password has
        // 1. at least one lowercase char
        // 2. at least one uppercase char
        // 3. at least one digit
        // 4. at least one special sign of @#-_$%^&+=§!?
        // 5. at least 8 characters and maximum 20
        if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)) {
            $this->passwordErr = "Invalid password format";
        }

        // echo strlen($this->emailErr).' -> '.strlen($this->passwordErr);
        if ($this->emailErr !== "" || $this->passwordErr !== "") {
            return false;
        } else {
            return array(
                "emailID" => $emailID,
                "password" => $password
            );
        }
    }

   /**
    * @abstract Function to validate sign up data
    */
    public function validateSignUpInput($firstName, $lastName, $emailID, $password, $contactNumber)
    {
        // Validate google recaptcha response
        $data = array(
            'secret' => "6LdjcmoUAAAAAHcW516HrYp2LcTwPNKw85sePMdw",
            'response' => $_POST["recaptcha"]
        );
        // echo "<pre>";print_r($data);exit;
      
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $responseArray = json_decode($response, true);
        
        if ($responseArray["success"]) {
            // If the response is true then validate input data
            // First name
            $firstName = $this->testInput($firstName);

            // Last name
            $lastName = $this->testInput($lastName);

            $emailID = $this->testInput($emailID);
            // Check if email address is well-formed
            if (!filter_var($emailID, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Invalid email format";
            }

            $password = $this->testInput($password);
            // Check if password has
            // 1. at least one lowercase char
            // 2. at least one uppercase char
            // 3. at least one digit
            // 4. at least one special sign of @#-_$%^&+=§!?
            // 5. at least 8 characters and maximum 20
            if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)) {
                $this->passwordErr = "Invalid password format";
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }

            $contactNumber = $this->testInput($contactNumber);
            // Check if number is well-formed
            if (!preg_match('/^[0-9]{10}+$/', $contactNumber)) {
                $this->contactNumberErr = "Invalid number format";
            }

            // echo "<pre>";print_r($_POST);exit;
            if ($this->emailErr !== "" || $this->passwordErr !== "" || $this->contactNumberErr !== "") {
                return false;
            } else {
                return array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "emailID" => $emailID,
                    "password" => $password,
                    "contactNumber" => $contactNumber  
                );
            }
        } else {
            // Response was not verified
            return false;
        }
    }

   /**
    * @abstract Function to validate user's data during user update/edit
    */
    public function validateUpdateInput($firstName, $lastName, $emailID, $contactNumber, $userID)
    {
        // First name
        $firstName = $this->testInput($firstName);

        // Last name
        $lastName = $this->testInput($lastName);

        $emailID = $this->testInput($emailID);
        // Check if email address is well-formed
        if (!filter_var($emailID, FILTER_VALIDATE_EMAIL)) {
            $this->emailErr = "Invalid email format";
        }

        $contactNumber = $this->testInput($contactNumber);
        // Check if number is well-formed
        if (!preg_match('/^[0-9]{10}+$/', $contactNumber)) {
            $this->contactNumberErr = "Invalid number format";
        }

        // echo "<pre>";print_r($_POST);exit;
        if ($this->emailErr !== "" || $this->contactNumberErr !== "") {
            return false;
        } else {
            return array(
                "firstName" => $firstName,
                "lastName" => $lastName,
                "emailID" => $emailID,
                "contactNumber" => $contactNumber,
                "userID" => $userID
            );
        }
    }

   /**
    * @abstract Function to strip special characters
    */
    protected function testInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>