<?php
include ('db.php');

session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:adminLogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/admin.css">
</head>
<style>
    .dashboard {
  padding: 20px;
}

.title {
  font-size: 24px;
  margin-bottom: 20px;
  justify-content: center;
  text-align: center;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-weight: 700;
  color: blue;
}

.box-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 20px;
}

.box {
  background-color: #f5f5f5;
  border-radius: 5px;
  padding: 20px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.box h3 {
  font-size: 30px;
  margin-bottom: 10px;
}

.box p {
  font-size: 17px;
  color: #666;
}

</style>
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



  <section class="dashboard">
    <h1 class="title">Dashboard</h1>

    <div class="box-container">



       <div class="box">
      <?php
        $tpendings = 0;
        $selectPending = mysqli_query($con, "SELECT total_price FROM `shop_order` WHERE payment_status = 'pending'");
        if(mysqli_num_rows($selectPending)>0){
           while($fetch_pendings = mysqli_fetch_assoc($selectPending)){
     $tPrice = $fetch_pendings['total_price'];
     $tpendings +=$tPrice ;
        };
        }
       ?>
     <h3>₹<?php echo $tpendings; ?>/-</h3>
     <p>total pendings</p>
 </div>
 
       <div class="box">
      <?php
        $tCompleted = 0;
        $selectCompleted = mysqli_query($con, "SELECT total_price FROM `shop_order` WHERE payment_status = 'completed'");
        if(mysqli_num_rows($selectCompleted)>0){
           while($fetch_completed = mysqli_fetch_assoc($selectCompleted)){
     $tPrice = $fetch_completed['total_price'];
     $tCompleted +=$tPrice ;
        };
        }
       ?>
     <h3>₹<?php echo $tCompleted?>/-</h3>
     <p>Completed Payments</p>
 </div>
 
 <div class="box">
  <?php
     $selectOrders = mysqli_query($con, "SELECT * FROM `shop_order`");
     $numberOfOrders = mysqli_num_rows($selectOrders)
  ?>
  <h3><?php echo $numberOfOrders; ?></h3>
  <p>Order Placed</p>
 </div>


  <div class="box">
  <?php
     $selectProducts = mysqli_query($con, "SELECT * FROM `shop_product`");
     $numberOfProducts = mysqli_num_rows($selectProducts);
  ?>
  <h3><?php echo $numberOfProducts; ?></h3>
  <p>Products Added</p>
 </div>


  <div class="box">
  <?php
     $selectUsers = mysqli_query($con, "SELECT * FROM `users` WHERE user_type='user'");
     $numberOfUsers = mysqli_num_rows($selectUsers)
  ?>
  <h3><?php echo $numberOfUsers; ?></h3>
  <p>Regular Users</p>
 </div>

 
  <div class="box">
  <?php
     $selectAdmins = mysqli_query($con, "SELECT * FROM `users` WHERE user_type='admin'");
     $numberOfAdmins = mysqli_num_rows($selectAdmins)
  ?>
  <h3><?php echo $numberOfAdmins; ?></h3>
  <p>Admin Users</p>
 </div>

 
  <div class="box">
  <?php
     $selectAccount = mysqli_query($con, "SELECT * FROM `users` ");
     $numberOfAccount = mysqli_num_rows($selectAccount)
  ?>
  <h3><?php echo $numberOfAccount; ?></h3>
  <p>Total Users</p>
 </div>

 
  <div class="box">
  <?php
     $selectFeedBack = mysqli_query($con, "SELECT * FROM `feedback` ");
     $numberOfFeedback = mysqli_num_rows($selectFeedBack)
  ?>
  <h3><?php echo $numberOfFeedback; ?></h3>
  <p>New feedback</p>
 </div>
    </div>
  </section>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->

  <script src="./js/admin_script.js"></script>

</html>
