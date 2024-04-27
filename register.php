<?php

include 'db/connect.php';

$message = ''; // Initialize message variable

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']); // Corrected variable name
  $userType = $_POST['user_type'];

  // Check if user already exists
  $select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die('Query failed');

  if(mysqli_num_rows($select_users) > 0){
    $message = '<div class="alert alert-danger" role="alert">User already exists!</div>';
  } else {
    // Check if passwords match
    if($password != $cPassword){
      $message = '<div class="alert alert-danger" role="alert">Confirm password does not match!</div>';
    } else {
      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Insert user into database
      mysqli_query($con, "INSERT INTO users (name, email, password, user_type) VALUES ('$name', '$email', '$hashedPassword', '$userType')") or die('Query failed');
      $message = '<div class="alert alert-success" role="alert">Registration successful!</div>';
      header('location:login.php');
    }
  }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
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
    <h2 class="text-center mb-4">Register Now</h2>
    <form id="registrationForm" action="" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
      </div>
 
      <select name="user_type" class="form-control" required>
       <option value="" selected>Select User Type</option>
        <option value="user">Regular User</option>
        <option value="admin">Admin</option>
        <option value="moderator">Moderator</option>
      </select>
      <button type="submit" name="submit" class="btn btn-primary btn-block btn-register">Register</button>
      <p class="mt-3 text-center">Already have an account? <a href="login.php">Login Now</a></p>
       <p class="mt-3 text-center">If you Are Admin? <a href="./admin/adminLogin.php">Admin Login Now</a></p>
    </form>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->
  <script>
    $(document).ready(function() {
      $('#registrationForm').submit(function(event) {
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
          $('.error-message').remove();
          $('#confirmPassword').after('<p class="error-message">Passwords do not match</p>');
          event.preventDefault();
        }
         
          // Check if user type is selected
        var userType = $('select[name="user_type"]').val();
        if (userType === "") {
          $('.error-message').remove();
          $('select[name="user_type"]').after('<p class="error-message">Please select a user type</p>');
          event.preventDefault();
        }
           
      });
    });
  </script>

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
