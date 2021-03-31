<?php
include("inc/conn.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="sign.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style= "background-image: url('admin1/images/2.jpg')">
  <div class="container"><h1 style="color: white; width: 60%; float: right;">Sign Up</h1><div>
<?php
include("inc/conn.php")
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  include("inc/conn.php");
  $sql = "INSERT INTO user_1(user_name, pass_word) VALUES ('$user_name', '$password')";
  if(mysqli_query($conn, $sql)){
    echo "SignUp successfuly <br>";
  }else{
    echo"error: " . mysqli_error($conn);
  }
}
?>
<form class="form" method="post">
<div class="container" style=" float: left;">
    <div class="form-group">
      <label for="uname" style="color: white">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd" style="color: white">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> <p style="color: white">I agree <a href="#" style="color: white">on the company's policy.</a></p>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
  <input type="submit" name="submit" value="Sign Up" style="width: 20%; height: 5%; background-color: lightgreen">
</form>
</div>
<div style="float: right; width: 60%">
<a href="index.php"><button type="submit" style="background-color: lightgray">Home</button></a>
  <a href="admin1/login.php"><button type="submit" style="background-color: lightblue">Login Now</button></a>
</div>


<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
