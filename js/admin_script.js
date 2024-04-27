document.addEventListener('DOMContentLoaded', function() {
  let navbar = document.querySelector('.header .admin-nav');
  let menuBtn = document.querySelector('#menu-btn');

  menuBtn.addEventListener('click', function() {
    navbar.classList.toggle('active');
  });
});




document.querySelector('#close-update').addEventListener('click', function(event) {
  event.preventDefault(); // Prevent default form submission behavior
  document.querySelector('.edit-form').style.display = "none";
  window.location.href = "adminproduct.php";
});
