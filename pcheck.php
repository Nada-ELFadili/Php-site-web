<?php

session_start();
$email=$_REQUEST['email_adresse'];
$password=$_REQUEST['password'];


//New MySQL connection
$mysqli=new mysqli('localhost','root','','perfect-cup');

//Check for errors
if ($mysqli->connect_error){
    die('Error :(' . $mysqli->connect_error. ' )' . $mysqli->connect_error);
}

$query="SELECT * FROM contact WHERE email_adresse ='$email'";
$result=mysqli_query($mysqli, $query) or die(mysqli_error());
$num_rows=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);

if($num_rows>=1) {
    if (password_verify($password, $row['password'])){

        $_SESSION['login'] =$row['id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        echo 'true';
    }

    else {echo "false";}
}

else {echo "false";}

?>