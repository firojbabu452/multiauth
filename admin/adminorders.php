<?php
include ('db.php');
$message = '';
session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:login.php');
}
if(isset($_POST['updateOrder'])){
  $updateOrderId = $_POST['orderId'];
  $updateStatus = $_POST['updatePayment'];
  mysqli_query($con, "UPDATE `shop_order` SET payment_status = '$updatePayment' WHERE id = '$updateOrderId'");
  $message = '<div class="alert alert-danger" role="alert">Payment Status has been updated</div>';
  
};
if(isset($_GET['delete'])){
  $deleteid=$_GET['delete'];
  mysqli_query($con,"DELETE FROM `shop_order` WHERE id='$deleteid'");
  header('location:adminorders.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/adminorders.css">
</head>


<body>
  <?php
  echo $message;
  ?>
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


  <section class="orders">

    <h1 class="title">Placed orders</h1>

    <div class="box-container">
      <?php

      $selectOrders = mysqli_query($con,"SELECT * FROM `shop_order`");

      if(mysqli_num_rows($selectOrders)>0){
        while($fetchOrders = mysqli_fetch_assoc($selectOrders)){

       ?>
     <div class="box">
<p>User Id:  <span><?php echo $fetchOrders['user_id'] ?></span> </p>
<p>Placed On:  <span><?php echo $fetchOrders['placed_on'] ?></span> </p>
<p>Name:  <span><?php echo $fetchOrders['name'] ?></span> </p>
<p>Number:  <span><?php echo $fetchOrders['number'] ?></span> </p>
<p>Email:  <span><?php echo $fetchOrders['email'] ?></span> </p>
<p>Address:  <span><?php echo $fetchOrders['address'] ?></span> </p>
<p>total product:  <span><?php echo $fetchOrders['total_products'] ?></span> </p>
<p>Total Price:  <span>₹<?php echo $fetchOrders['total_price'] ?>/-</span> </p>
<p>Payment Method:  <span><?php echo $fetchOrders['method'] ?></span> </p>
<form action="" method="post">

  <input type="hidden" name="orderId" value="<?php echo $fetchOrders['id']; ?>">

  <select name="updatePayment">

<option value="" selected disabled> 
<?php echo $fetchOrders['payment_status']; ?>
</option>
<option value="pending">pending</option>
<option value="completed">completed</option>
  </select>
  <input type="submit" value="update" name="updateOrder" class="option-btn">
  <a href="adminorders.php>delete=<?php echo $fetchOrders['id']; ?>" onclick="return confirm('Delete this order')" class="deleteBtn">delete</a>
</form>
     </div>
     <?php
    }

      }else{
          $message = '<div class="alert alert-danger" role="alert">No Orders Placed Yet!</div>';
      }
      ?>
     
    </div>

  </section>

</body>
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
    }, 1000);
  });
  </script>

  <script src="./js/admin_script.js"></script>

</html>
