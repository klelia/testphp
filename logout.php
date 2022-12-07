<?php
session_start();
session_destroy();
if(isset($_POST['logout'])){
  header("location: index.php");
}

