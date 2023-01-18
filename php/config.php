<?php 
    $conn = mysqli_connect("localhost:3307", "root", "", "chat");
    if(!$conn) {
        echo "Database connected" . mysqli_connect_error();
    }
?>