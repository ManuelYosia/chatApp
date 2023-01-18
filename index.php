<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="signup form">
            <header>Realtime ChatApp</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="fname-field">First Name</label>
                        <input type="text" name="first-name" placeholder="First Name" id="fname-field" required>
                    </div>
                    <div class="field input">
                        <label for="lname-field">Last Name</label>
                        <input type="text" name="last-name" placeholder="Last Name" id="lname-field" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="email-field">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email address" id="email-field" required>
                </div>
                <div class="field input">
                    <label for="password-field">Password</label>
                    <input type="password" name="password" placeholder="Enter your new password" id="password-field" required>
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            <div class="link">Already have account? <a href="./login.php">Login now</a></div>
        </section>
    </div>
    
    <script src="js/password-show-hide.js"></script>
    <script type="module" src="js/signup.js"></script>
</body>
</html>