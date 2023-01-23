<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: ../login.php");
    }
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    class InsertChat {
        private $outgoing_id;
        private $incoming_id;
        private $msg;
        private $conn;
        private $response;

        function __construct($conn, $outgoing_id, $incoming_id, $message) {
            $this->outgoing_id = $outgoing_id;
            $this->incoming_id = $incoming_id;
            $this->msg = $message;
            $this->conn = $conn;
        }

        function query() {
            if(!empty($this->msg)) {
                $sql = mysqli_query($this->conn, "INSERT INTO messages(outgoing_msg_id, incoming_msg_id, msg) 
                                                    VALUES ({$this->outgoing_id}, {$this->incoming_id}, '{$this->msg}')") or die();
            }
        }

        function sendMessage() {
            $this->query();

        }
    }

    $insert_chat = new InsertChat($conn, $outgoing_id, $incoming_id, $message);

    $insert_chat->sendMessage();
?>