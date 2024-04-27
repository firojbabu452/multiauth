
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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


<div class="container">
  <h2>Contact Us</h2>
  <form action="submit_form.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea class="form-control" rows="5" id="message" placeholder="Enter your message" name="message" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
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
