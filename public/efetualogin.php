<?php
// começar ou retomar uma sessão
include("connection.php");
session_start();


if (isset($_POST['user'])){
    // removes backslashes
$user = stripslashes($_REQUEST['user']);
    //escapes special characters in a string
$user = mysqli_real_escape_string($ligacao,$user);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($ligacao,$password);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `empresa` WHERE user='$user'and password='$password'";
        $result = mysqli_query($ligacao,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
            $_SESSION['user'] = $user;
                // Redirect user to index.php
            header("Location: empresa.php");
            }else {
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
        }
}
?>
