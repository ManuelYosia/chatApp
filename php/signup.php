<?php 
    include_once "config.php";

    $firstName =  mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    
    if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "$email - already taken";
            }else{
                //check user upload file or not
                if(isset($_FILES['image'])) {//if file is uploaded
                    $img_name = $_FILES['image']['name']; //getting image name
                    $img_type = $_FILES['image']['type']; //getting image type
                    $tmp_name = $_FILES['image']['tmp_name']; //used for save file in our folder

                    //separate file name and ext
                    $img_explode = explode(".", $img_name);
                    $img_ext = end($img_explode); //getting ext

                    $extensions = ['JPG', 'PNG', 'JPEG']; //valid extensions for img

                    if(in_array($img_ext, $extensions) === true) {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $status = "Online";
                            $random_id = rand($time, 10000000);

                            $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, firstname, lastname, email, password, img, status) VALUES ('{$random_id}','{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];

                                echo "Success";
                            }else{
                                echo "Something went wrong";
                            }
                        }
                    }else{
                        echo "Please select an image file - jpg, png, jpeg!";
                    }
                }else{
                    echo "Please select an image file!";
                }
            }
        }else{
            echo "$email - is not valid!";
        }
    }else{
        echo "All input are required";
    }
?>