<?php
include ('db.php');

session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:login.php');
}
if(isset($_GET['delete'])){
  $deleteid=$_GET['delete'];
  mysqli_query($con,"DELETE FROM `feedback` WHERE id='$deleteid'");
  header('location:admincontact.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
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
      <a href="adminproduct.php">All Product</a>
      <a href="adminorders.php">All Order</a>
      <a href="adminusers.php">All User</a>
      <a href="adminfeedback.php">All FeedBack</a>
    </nav>
    
    <div class="account-box">
      <p>Admin Name: <span><?php echo $_SESSION['admin_name'] ?></span></p>
      <p>Admin Email: <span><?php echo $_SESSION['admin_email'] ?></span></p>
      <a href="adminLogout.php" class="delete-btn">logout</a>
    </div>
  </header>


  <section class="feedback">
     <h1 class="title">FeedBack</h1>
     <?php
     $selecteFeedback = mysqli_query($con,"SELECT * FROM `feedback`");
     if(mysqli_num_rows($selecteFeedback)>0){
          while($fetchfeedback = mysqli_fetch_assoc($selecteFeedback)){

        
  
    
     ?>
     <div class="box">
      <p>Name:
        <span><?php echo $fetchfeedback['name'] ?></span>
      </p>
       <p>Number:
        <span><?php echo $fetchfeedback['number'] ?></span>
      </p>
        <p>Email:
        <span><?php echo $fetchfeedback['email'] ?></span>
      </p>
       <p>Feedback:
        <span><?php echo $fetchfeedback['feedback'] ?></span>
      </p>
      <a href="admincontact.php?delete=<?php echo $fetchfeedback['id']; ?>" onclick="return confirm('Delete this Feedback')" class="deleteBtn">Delete</a>
     </div>
     <?php
     };
     }else{

     }
     ?>
  </section>

</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->

  <script src="./js/admin_script.js"></script>

</html>
