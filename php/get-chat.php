<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: ../login.php");
    }
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    class GetChat {
        private $outgoing_id;
        private $incoming_id;
        private $conn;
        private $output;

        function __construct($conn, $outgoing_id, $incoming_id) {
            $this->outgoing_id = $outgoing_id;
            $this->incoming_id = $incoming_id;
            $this->conn = $conn;
        }

        function query() {
            $sql = "SELECT * FROM messages LEFT JOIN users ON messages.outgoing_msg_id = users.unique_id  WHERE (outgoing_msg_id = {$this->outgoing_id} AND incoming_msg_id = {$this->incoming_id}) OR (outgoing_msg_id = {$this->incoming_id} AND incoming_msg_id = {$this->outgoing_id})";

            $query = mysqli_query($this->conn, $sql);

            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    if($row['outgoing_msg_id'] === $this->outgoing_id) {
                        $this->output .='<div class="chat outgoing">
                                        <div class="details">
                                            <p>'.$row['msg'].'</p>
                                        </div>
                                        </div>';
                    }else{
                        $this->output .='<div class="chat incoming">
                                        <img src="php/images/'.$row['img'].'" alt="">
                                        <div class="details">
                                            <p>'.$row['msg'].'</p>
                                        </div>
                                        </div>';
                    }
                }
            }
        }

        function getMessage() {
            $this->query();

            return $this->output;
        }
    }

    $get_chat = new GetChat($conn, $outgoing_id, $incoming_id);

    echo $get_chat->getMessage();
?>