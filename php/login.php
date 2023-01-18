<?php 
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    class LogIn {
        protected $email;
        protected $password;
        private $response;

        function __construct($conn, $email, $password) {
            $this->email = $email;
            $this->password = $password;
            $this->conn = $conn;
        }

        function validateForm() {
            if(!empty($this->email) && !empty($this->password)) {
                $sql = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '{$this->email}'");

                if(mysqli_num_rows($sql) > 0){
                    $sql1 = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$this->email}'");
                    $row = mysqli_fetch_assoc($sql1);

                    if($row['password'] === $this->password) {


                        $this->response = "Success";
                    }else{
                        $this->response = "Please enter a right password";
                    }
                }else{
                    $this->response = "Email is unregistered"; 
                }
            }else{
                $this->response = "All input are required";
            }
        }

        function getResponse(){
            $this->validateForm();

            return $this->response;
        }
    }

    $login = new LogIn($conn, $email, $password);

    echo $login->getResponse();
?>