<?php
  session_start();
  if(isset($_SESSION['username']))
  {
  }
  else
  {
    header("Location: index.php");
  }
?>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="jumbotron text-center">
    <h1>Welcome to CAR Resource Booking System</h1>
  </div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="cancel.php">View Booking</a></li>
        <li><a href="changePassUser.php">Change Password</a></li>
        <li class="active"><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container col-md-6 col-md-offset-3">
  <p>This website is a booking system that can book the resource of CAR. The faculty and 
    staff of computer science of Acadia University can use the system</p>
  <br><p>Operations about what user can do</p>
      <p>1. Users can choose which resource they want to book at Home page</p>
      <p>2. After operation 1, user can choose the date and time, then they can complete booking process</p>
      <p>3. Users can see their own booking by clicking the 'View Booking' button on navigation bar</p>
      <p>4. After operation 3, user can decide whether or not they want to cancel the booking</p>
      <p>5. If user want change his/her password, he/she can click the 'Change Password' button on navigation bar</p>

</div>
</body>
</html>