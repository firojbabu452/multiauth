<?php
include ('db.php');
$message = ''; 

session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:./login.php');
}

if(isset($_POST['addproduct'])){
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $imageTempName = $_FILES['image']['tmp_name']; // Correct variable name
  $imageFolder = 'uploadedImages/'.$image; // Corrected folder name

  // Check if product name already exists
  $selectProductName = mysqli_query($con, "SELECT name FROM `shop_product` WHERE name='$name'");
  if(mysqli_num_rows($selectProductName) > 0){
    $message = '<div class="alert alert-danger" role="alert">Product Name already added</div>';
  } else {
    // Insert product into database
    $addProductq = mysqli_query($con, "INSERT INTO `shop_product` (name, price, image) VALUES ('$name', '$price', '$image')");
    
    if($addProductq){
      if($image_size > 2000000){
        $message = '<div class="alert alert-danger" role="alert">Image size is too large</div>';
      } else {
        // Move uploaded file to destination folder
        move_uploaded_file($imageTempName, $imageFolder);
        $message = '<div class="alert alert-success" role="alert">Product Added Successfully</div>';
      }
    } else {
      $message = '<div class="alert alert-danger" role="alert">Failed to add product</div>';
    
    }
      
     
   
  }
   
   
}

if(isset($_GET['delete'])){
  $delete_id= $_GET['delete'];
  $deleteImageq = mysqli_query($con,"SELECT image FROM `shop_product` WHERE id='$delete_id'");
  $fetchDeleteImage = mysqli_fetch_assoc($deleteImageq);
  unlink('uploaded_img/'.$fetchDeleteImage['image']);
  mysqli_query($con, "DELETE FROM `shop_product` where id = '$delete_id'");
  header('location:adminproduct.php');
}

if(isset($_POST['updateProduct'])){
  $updatepId = $_POST['updatePid'];
  $updateName=$_POST['updateName'];
  $updatePrice=$_POST['updatePrice'];

  mysqli_query($con, "UPDATE `shop_product` SET name='$updateName', price = '$updatePrice' WHERE id ='$updatepId' ");

  $updateImage = $_FILES['updateImage']['name'];
  $updateImageTemp = $_FILES['updateImage']['tmp_name'];
  $updateImageSize = $_FILES['updateImage']['size'];
  $updateFolder = 'uploadedImages/'.$updateImage;
  $UpdateoldImage = $_POST['updateOldimage'];


  if(!empty($updateImage)>0){
    if($updateImageSize>2000000){
        $message = '<div class="alert alert-danger" role="alert">Image file size is to large</div>';
    }else{
       mysqli_query($con, "UPDATE `shop_product` SET image='$updateImage' WHERE id ='$updatepId' ");
       move_uploaded_file($updateImageTemp,$updateFolder);
       unlink('uploadedImages/'.$UpdateoldImage);
    }
  }
  header('location:adminproduct.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/adminstyle.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<style>
 
</style>
<body>
   <?php  
       echo $message;
   ?>
    
    
  <header class="header">
   
    
    <a href="#" class="admin-logo">Admin<span style="color: #ffae00; padding: 0 5px; border-radius: 3px;">Panel</span></a>

    <nav class="admin-nav">
      <a href="admin_page.php">Home</a>
      <a href="adminproduct.php">All Products</a>
      <a href="adminorders.php">All Orders</a>
      <a href="adminusers.php">All Users</a>
      <a href="adminfeedback.php">All FeedBack</a>
    </nav>
    
    <div class="account-box">
      <p>Admin Name: <span><?php echo $_SESSION['admin_name'] ?></span></p>
      <p>Admin Email: <span><?php echo $_SESSION['admin_email'] ?></span></p>
      <a href="adminLogout.php" class="delete-btn">logout</a>
    </div>
  </header>


<section class="add-products">
 <h1>Shop Products</h1>

 <form action="" method="post" enctype="multipart/form-data">

<h3>Add Product</h3>

<input type="text" name="name" class="box" placeholder="Enter Product name" required>
<input type="number" name="price" class="box" placeholder="Enter Product Price" required>

<input type="file" name="image" accept="image/jpeg,image/jpeg,image/png" class="box" required>
<input type="submit" name="addproduct" value="Add product">
 </form>

</section>

<section class="show_products">
  <div class="box-container">
    <?php
    $selectProducts = mysqli_query($con,"SELECT * FROM `shop_product`");

    if(mysqli_num_rows($selectProducts)>0){
              while($fetchProduct  = mysqli_fetch_assoc($selectProducts)){
                ?>
                <div class="box">
                  <img src="uploadedImages/<?php echo $fetchProduct['image'];?>" alt="">
                  
                  <div class="name"><?php echo $fetchProduct['name'] ?></div>
                  <div class="price"><?php echo $fetchProduct['price'] ?>/-</div>
                  <a href="adminproduct.php?update=<?php echo $fetchProduct['id'] ?>" class="option-btn">update</a>
                    <a href="adminproduct.php?delete=<?php echo $fetchProduct['id'] ?>" class="option-btn2" onclick="return confirm('delete this product?')">Delete</a>
                </div>
                <?php

              }
    }else{
      echo '<p class="empty">No Product Available</p>';
    }
    ?>
    
  </div>
  </section>

<section class="edit-form">
  <?php
  if(isset($_GET['update'])) {
  $update_id = $_GET['update'];
  $updateQuery = mysqli_query($con, "SELECT * FROM `shop_product` WHERE id='$update_id'");

  if(mysqli_num_rows($updateQuery) > 0) {
    while($fetchUpdate = mysqli_fetch_assoc($updateQuery)) {
  ?>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="updatePid" value="<?php echo $fetchUpdate['id']; ?>">
    <input type="hidden"  name="updateOldimage" value="<?php echo $fetchUpdate['image'];  ?>">
    <div class="image-container">
      <img src="uploadedImages/<?php echo $fetchUpdate['image']; ?>" alt="Product Image">
    </div>
    <input type="text" name="updateName" value="<?php echo $fetchUpdate['name']; ?>" class="box4" required placeholder="Enter Product Name">
    <input type="number" name="updatePrice" value="<?php echo $fetchUpdate['price']; ?>" class="box4" required placeholder="Enter Product Price">
    <input type="file" class="box4" name="updateImage" accept="image/jpeg, image/png">
    <input type="submit" class="option-btn" value="Update" name="updateProduct" class="btn">
    <input type="reset" class="option-btn2"  value="Cancel" id="close-update" class="option-btn">
  </form>
  <?php
    }
  } else {
    echo '<p class="empty">No product found for updating.</p>';
  }}
  ?>
</section>










</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->

  <script src="./js/admin_script.js"></script>

   <script>
  $(document).ready(function() {
   
    setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
    }, 1000);
  });
</script>

</html>
