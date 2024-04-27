<?php
include 'db/connect.php';

session_start();
$user_id =   $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>landing</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="./css/landing.css">
 <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>StyleCove</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php">Contact</a>
        </li>
      </ul>
      <div class="user-box">
        <p>Welcome, <span><?php echo $_SESSION['user_name']?></span></p>
        <p>Email: <span><?php echo $_SESSION['user_email']?></span></p>
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
      </div>
      <a href="./register.php"><button class="btn btn-success mx-2" type="submit">Register</button></a>
     <a href="./login.php"> <button class="btn btn-success" type="submit">Login</button></a>
    </div>
  </div>
</nav>


<div class="landing">
  <img class="banner" src="./images/banner.jpg" alt="">
</div>
<h3 class="heading">Our Best Product</h3>
<div class="box-container">
 <div class="card" style="width: 18rem;">
    <img src="./images/shirts.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Roaster Shirts</h5>
      <p class="card-text">Men Roadster Shirt</p>
      <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem;">
    <img src="./images/jeans.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men Jeans</h5>
      <p class="card-text">Men Jeans Cotton</p>
      <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem;">
    <img src="./images/shoes.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men Shoes</h5>
      <p class="card-text">Men Shoes White</p>
     <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem; height:20px;">
    <img src="./images/tshirt.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men T-Shirts</h5>
      <p class="card-text">Men T-Shirts</p>
     <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
</div>
<div class="box-container">
 <div class="card" style="width: 18rem;">
    <img src="./images/shirts.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Roaster Shirts</h5>
      <p class="card-text">Men Roadster Shirt</p>
      <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem;">
    <img src="./images/jeans.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men Jeans</h5>
      <p class="card-text">Men Jeans Cotton</p>
      <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem;">
    <img src="./images/shoes.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men Shoes</h5>
      <p class="card-text">Men Shoes White</p>
     <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
  
  <div class="card" style="width: 18rem; height:20px;">
    <img src="./images/tshirt.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Men T-Shirts</h5>
      <p class="card-text">Men T-Shirts</p>
     <p class="card-text"><strong>Price: ₹799</strong></p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
</div>



<footer class="footer bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h5 class="mb-4">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="#" class="text-white">Home</a></li>
          <li><a href="#" class="text-white">Store</a></li>
          <li><a href="#" class="text-white">About</a></li>
          <li><a href="#" class="text-white">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5 class="mb-4">Information</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="#" class="text-white">Privacy Policy</a></li>
          <li><a href="#" class="text-white">Terms of Service</a></li>
          <li><a href="#" class="text-white">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5 class="mb-4">Follow Us</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="#" class="text-white">Facebook</a></li>
          <li><a href="#" class="text-white">Twitter</a></li>
          <li><a href="#" class="text-white">Instagram</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5 class="mb-4">Contact Us</h5>
        <p class="text-white mb-0">123 Main Street<br>City, State ZIP<br>Email: firoj@gmail.com.com<br>Phone: 123-456-7890</p>
      </div>
    </div>
    <hr class="mt-4 mb-3">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2024 StyleCove. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>