<?php 
    session_start();
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
        private $conn;
        private $response;
        
        function __construct($conn, $firstName, $lastName, $email, $password) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->conn = $conn;
        }

        function validateForm() {
            if(!empty($this->firstName) && !empty($this->lastName) && !empty($this->email) && !empty($this->password)) {
                if(filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
                    $sql = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '{$this->email}'");
                    if(mysqli_num_rows($sql) > 0){
                        $this->response = "$this->email - already taken"; 
                    }else{
                        if(isset($_FILES['image'])) {//if file is uploaded
                            $img_name = $_FILES['image']['name'];
                            $img_type = $_FILES['image']['type'];
                            $tmp_name = $_FILES['image']['tmp_name'];

                            $extension = ['JPG', 'PNG', 'JPEG'];

                            $time = time();

                            $img_explode = explode(".", $img_name); //seperate name and ext

                            $img_ext = end($img_explode);

                            if(in_array($img_ext, $extension)) {
                                
                                $new_img_name = $time.$img_name;
                                
                                if(move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                                    $status = "Offline";
                                    $rand_id = rand($time, 1000000);
    
                                    $sql1 = mysqli_query($this->conn, "INSERT INTO users(unique_id, firstname, lastname, email, password, img, status) VALUES ('{$rand_id}', '{$this->firstName}', '{$this->lastName}', '{$this->email}', '{$this->password}', '{$new_img_name}', '{$status}')");

                                    if($sql1){
                                        $sql2 = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$this->email}'");
                                        $row = mysqli_fetch_assoc($sql2);

                                        $_SESSION['unique_id'] = $row['unique_id'];
                                        $this->response = "Success";
                                    }else{
                                        $this->response = "Something went wrong";
                                    }
                                    
                                }
                            }else{
                                $this->response = "Extension must be JPG, PNG, JPEG!"; 
                            }
                        }else{
                            $this->response = "Please select your image!"; 
                        }
                    }
                }else{
                    $this->response = "$this->email - is not valid!";  
                }
            }else{
              $this->response = "All input are required";  
            }
        }

        function getResponse() {
            $this->validateForm();

            return $this->response;
        }
        
    }

    $signUp = new SignUp($conn, $firstName, $lastName, $email, $password);

    echo $signUp->getResponse();
?>