<?php

include 'db/connect.php';
session_start();
$message = ''; 

if(isset($_POST['submit'])){
 
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
 

  // Check if user already exists
  $select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die('Query failed');

  if(mysqli_num_rows($select_users) > 0){
      $row = mysqli_fetch_assoc($select_users);
      $hashedPassword = $row['password'];

 if(password_verify($password, $hashedPassword)){
      if($row['user_type'] == 'admin'){
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        echo '<script>alert("You are an admin. Please login from the admin login section.")</script>';
        echo '<script>window.location.href = "./admin/adminLogin.php";</script>';
            exit();
      }elseif($row['user_type'] == 'moderator'){
        $_SESSION['moderator_name'] = $row['name'];
        $_SESSION['moderator_email'] = $row['email'];
        $_SESSION['moderator_id'] = $row['id'];
        header('location:moderator_page.php');
        exit();
      }elseif($row['user_type'] == 'user'){
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
          header('location:landing.php');
          exit();
      }
      }else{
            $message = '<div class="alert alert-danger" role="alert">Incorrect email or password!</div>';
      }
  } else {
   
     $message = '<div class="alert alert-danger" role="alert">User does not exist!</div>';
  }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./css/register.css">
    
</head>


<body>



      <?php
    
   echo $message;
  
     
      ?>
 


  <div class="container">
    <h2 class="text-center mb-4">LOGIN NOW</h2>
    <form id="registrationForm" action="" method="post">
   
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
   
      <button type="submit" name="submit" class="btn btn-primary btn-block btn-register">Login Now</button>
      <p class="mt-3 text-center">dont't have an account? <a href="register.php">Register Now</a></p>
      <p class="mt-3 text-center">Admin? <a href="./admin/adminLogin.php">Admin Login Now</a></p>
      <p class="mt-3 text-center">Moderator? <a href="moderatorlogin.php">Moderator Login Now</a></p>
    </form>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->


  <script>
  $(document).ready(function() {
   
    setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
    }, 2000);
  });
</script>


</body>
</html>
