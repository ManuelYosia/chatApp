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
                <img src="img.JPG" alt="">
                <div class="details">
                    <span><?php echo $row['firstname']." ".$row['lastname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header> 
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.JPG" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.JPG" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.JPG" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.JPG" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>   
            <form action="#" class="typing-area">
                <input type="text" placeholder="Type a message here...">
                <button><span class="iconify" data-icon="bxl:telegram"></span></button>
            </form>      
        </section>
    </div>
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
</body>
</html>