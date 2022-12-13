<?php 
include __DIR__ . './settings.php';
include __DIR__ . './Models/User.php';

if(isset($_POST['email']) && isset($_POST['password']) ){
    login($_POST['email'], $_POST['password'], $conn);
} else {

  
}

function login($email, $password, $conn){
    $user = User::fetchOne($email, $password, $conn);
    $_SESSION['userId'] = $user->get_id();
    $_SESSION['email'] = $user->get_email();
        $conn->close();
        header("location: index.php");

 
    // } else {

    //     session_destroy();
    // }
}