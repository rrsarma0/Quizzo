<?php
  session_start();
  $username = $_POST['reg_user'];
  $email = $_POST['reg_mail'];
  $password = $_POST['reg_pass'];

  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'quizapplication');
  if($conn -> connect_error) {
    die('Connection Failed : '.$conn -> connect_error);
  }
  else {
    $sql = "SELECT * FROM credentials WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result))
      die('Email already Exists!');
    else {
      $stmt = $conn -> prepare('INSERT INTO credentials(Username, Email, Password) values(?,?,?)');
      $stmt -> bind_param("sss", $username, $email, $password);
      $stmt -> execute();
      header('location:../Home.html');
      $stmt -> close();
      $conn -> close();
    }
  }
 ?>
