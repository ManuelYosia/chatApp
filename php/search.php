<?php 
    session_start();
    include_once "config.php";

    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    class Search {
        private $conn;
        private $output;
        private $searchTerm;

        function __construct($conn, $searchTerm) {
            $this->conn = $conn;
            $this->searchTerm = $searchTerm;
        }

        function searchQuery() {
            $sql = mysqli_query($this->conn, "SELECT * FROM users WHERE (firstname LIKE '%{$this->searchTerm}%' OR lastname LIKE '%{$this->searchTerm}%') AND NOT unique_id = '{$_SESSION['unique_id']}'");
            
            if(mysqli_num_rows($sql) > 0){
                include_once "data.php";
            }else{
                $this->output .= "User not found";
            }
        }

        function getOutput() {
            $this->searchQuery();

            return $this->output;
        }
    }

    $search = new Search($conn, $searchTerm);

    echo $search->getOutput();
?>