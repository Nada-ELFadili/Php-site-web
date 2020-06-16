
    <?php 
        $mysqli =  mysqli_connect("localhost","root","","perfect-cup" );

        // if($mysqli -> connected){

        // }


            $msg="";

            if (isset($_POST['click'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email_adresse'];
                $password = $_POST['password'];

                $check_query = "SELECT * FROM contact WHERE email = '$email'";
                $check_result = mysqli_query($mysqli,$check_query);
            
            if (strlen($fname)<3){

                $msg = "<div class='alert alert-danger'>Please enter a valid First name</div>";

            }else if (strlen($lname)<3){

                $msg = "<div class='alert alert-danger'>Please enter a valid First name</div>";

            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $msg = "<div class='alert alert-danger'>Please enter a valid email</div>";

            }else if (!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){

                $msg = "<div class='alert alert-danger'>Please enter a strong password use capital and small letter and 1 number or more and more than 2 special caractere</div>";

            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $requet = "INSERT INTO contact(fname,lname,email_adresse,password) VALUES ('{$fname}','{$lname}','{$email}','{$password}')";
                $send_query = mysqli_query($mysqli,$requet);
                if (!$send_query) {
                        die("QUERY FAILED" . mysqli_error($mysqli));
                }
                $msg="<div class='alert alert-success'><strong>your registration confirmed</strong></div>";

                
            }
        }
    ?>


 