<?php
include 'db/connect.php';

session_start();
$mod_id =  $_SESSION['moderator_id'];

if(!isset($mod_id)){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moderator Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2>Moderator Page</h2>
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action">Users</a>
        <a href="#" class="list-group-item list-group-item-action">Posts</a>
        <a href="#" class="list-group-item list-group-item-action">Comments</a>
        <!-- Add more sidebar links as needed -->
      </div>
    </div>
    <!-- Content -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          Moderation Dashboard
        </div>
        <div class="card-body">
          <h5 class="card-title">Welcome, Moderator!</h5>
          <p class="card-text">Here you can manage users, posts, comments, and other activities.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
