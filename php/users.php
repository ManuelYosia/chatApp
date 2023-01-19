<?php 
    session_start();
    include_once "config.php";

    class Users {
        private $conn;
        private $output;

        function __construct($conn) {
           $this->conn = $conn;
        }

        function query() {
            $sql = mysqli_query($this->conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}' AND status = 'online'");

            if(mysqli_num_rows($sql) > 0){
                include_once "data.php";
            }else{
                $this->output .= "No users are available to chat";
            }
        }

        function getOutput() {
            $this->query();

            return $this->output;
        }
    }

    $users = new Users($conn);

    echo $users->getOutput();
?>