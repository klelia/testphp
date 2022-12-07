<?php 
include __DIR__ . './settings.php';

if(isset($_POST['email']) && isset($_POST['password']) ){
    // header("location: index.php");
    login($_POST['email'], $_POST['password'], $conn);
} else {

  
}

function login($email, $password, $conn){
    $md5password = md5($password);

    $stmt = $conn->prepare("SELECT `id`, `email` FROM `users` WHERE `email` = ? and `password` = ?");
    $stmt->bind_param('ss', $email, $md5password);

    $stmt->execute();

    $result = $stmt->get_result();

    $num_rows = $result->num_rows;

    if ($num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $conn->close();
        header("location: index.php");
    } else {

        session_destroy();
    }
}