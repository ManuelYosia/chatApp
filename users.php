<?php     
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>
<?php 
include_once "header.php"; 
?>
<body>
    <div class="wrapper">
        <section class="users">
            <?php 
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");

                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <header>
                <div class="content">
                    <img src="img.JPG" alt="">
                    <div class="details">
                        <span><?php echo $row['firstname']." ". $row['lastname']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="img.JPG" alt="">
                        <div class="details">
                            <span>MaYo</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><span class="iconify" data-icon="carbon:dot-mark"></span></div>
                </a>
            </div>
            
        </section>
    </div>
    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
    <script src="js/searchbar.js"></script>
</body>
</html>