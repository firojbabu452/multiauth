<?php
include ('db.php');

session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:login.php');
}

if(isset($_GET['delete'])){
  $deleteid=$_GET['delete'];
  mysqli_query($con,"DELETE FROM `users` WHERE id='$deleteid'");
  header('location:adminusers.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>users</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <header class="header">
    <a href="#" class="admin-logo">Admin<span style="color: #ffae00; padding: 0 5px; border-radius: 3px;">Panel</span></a>

    <nav class="admin-nav">
      <a href="admin_page.php">Home</a>
      <a href="adminproduct.php">All Products</a>
      <a href="adminorders.php">All Orders</a>
      <a href="adminusers.php">All Users</a>
      <a href="adminfeedback.php">All feedback</a>
    </nav>
    
    <div class="account-box">
      <p>Admin Name: <span><?php echo $_SESSION['admin_name'] ?></span></p>
      <p>Admin Email: <span><?php echo $_SESSION['admin_email'] ?></span></p>
      <a href="adminLogout.php" class="delete-btn">logout</a>
    </div>
  </header>

  <section class="users">
    <h1 class="title">user account</h1>
  <div class="box-container">
    <?php
    $selectUser = mysqli_query($con, "SELECT * FROM `users`");
    while ($fetchUser = mysqli_fetch_assoc($selectUser)) {
      ?>
      <div class="box">
        <p>Username: <span><?php echo $fetchUser['name']; ?></span> </p>
        <p>Email: <span><?php echo $fetchUser['email']; ?></span> </p>
        <p>Usertype: <span class="<?php echo ($fetchUser['user_type'] == 'admin') ? 'admin-type' : 'regular-type'; ?>"><?php echo $fetchUser['user_type']; ?></span> </p>
        <a href="adminusers.php?delete=<?php echo $fetchUser['id']; ?>" onclick="return confirm('Delete this User')" class="deleteBtn">Delete</a>
      </div>
    <?php
    }
    ?>
  </div>
</section>


</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->

  <script src="./js/admin_script.js"></script>

</html>
