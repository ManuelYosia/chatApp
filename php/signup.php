<?php 
    include_once "config.php";

    $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    class SignUp {
        protected $firstName;
        protected $lastName;
        protected $email;
        protected $password;
        private $response;
        
        function __constructor($firstName, $lastName, $email, $password) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }

        function validateForm() {
            if(!empty($this->firstName) && !empty($this->lastName) && !empty($this->email) && !empty($this->password)) {
                if(filter_var($this->email,FILTER_VALIDATE_EMAIL)) {

                }else{
                    $this->response = "$this->email - is not valid!";  
                }
            }else{
              $this->response = "All input are required";  
            }
        }

        function getResponse() {
            $this->validateForm();

            return $this->firstName;
        }
        
    }

    $signUp = new SignUp($firstName, $lastName, $email, $password);

    echo $signUp->getResponse();
?>