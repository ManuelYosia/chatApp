<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="login form">
            <header>Realtime ChatApp</header>
            <form action="#">
                <div class="error-txt">This is an error message!</div>
                <div class="field input">
                    <label for="email-field">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address" id="email-field" required>
                </div>
                <div class="field input">
                    <label for="password-field">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" id="password-field" required>
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Log In">
                </div>
            </form>
            <div class="link">Don't have an account? <a href="index.php">Sign Up now</a></div>
        </section>
    </div>
    <script src="js/password-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>