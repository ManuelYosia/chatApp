<?php 
    session_start();
    include_once "config.php";

    $logout_id = mysqli_real_escape_string($conn, $_SESSION['unique_id']);

    class LogOut {
        private $conn;
        private $response;
        private $logout_id;

        function __construct($conn, $logout_id) {
            $this->conn = $conn;
            $this->logout_id = $logout_id;
        }

        function query() {
            if(isset($_SESSION['unique_id'])) {
                if(isset($this->logout_id)){
                    $status = "offline";
                    $sql = mysqli_query($this->conn, "UPDATE users SET status='{$status}' WHERE unique_id = '{$this->logout_id}'");
                    if($sql) {
                        session_unset();
                        session_destroy();
                        header("location: ../login.php");
                        $this->response = "Log Out";
                    }

                }else{
                    header("location: ../users.php");
                }

                
            }else{
                header("location: ../login.php");
            }
        }

        function getResponse() {
            $this->query();

            return $this->response;
        }
    }

    $logOut = new LogOut($conn, $logout_id);

    echo $logOut->getResponse();
?>