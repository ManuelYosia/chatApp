<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <?php 
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_GET['user_id']}'");

                $row = mysqli_fetch_assoc($sql);
            ?>
            <header>
                <a href="users.php" class="back-icon"><span class="iconify" data-icon="material-symbols:arrow-back"></span></a>
                <img src=<?php echo "php/images/".$row['img'] ?> alt="">
                <div class="details">
                    <span><?php echo $row['firstname']." ".$row['lastname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header> 
            <div class="chat-box">
                
                
            </div>   
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $_GET['user_id']?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." >
                <button><span class="iconify" data-icon="bxl:telegram"></span></button>
            </form>      
        </section>
    </div>
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
    <script src="js/chat.js"></script>
</body>
</html>