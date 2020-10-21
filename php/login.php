<?php
  session_start();
  $email = $_POST['log_mail'];
  $password = $_POST['log_pass'];

  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'quizapplication');
  if($conn -> connect_error) {
    die('Connection Failed : '.$conn -> connect_error);
  }
  else {
    $stmt = $conn -> prepare('SELECT * FROM credentials where Email = ?');
    $stmt -> bind_param('s', $email);
    $stmt -> execute();
    $stmt_result = $stmt -> get_result();
    if($stmt_result -> num_rows == 1) {
      $data = $stmt_result -> fetch_assoc();
      if($data['Password'] === $password) {
        header('location:../Home.html');
      }
      else {
        echo "Invalid Email or Password";
      }
    }
    else {
      echo "Invalid Email or Password";
    }
  }
 ?>
