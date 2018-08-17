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
        <li><a href="about.php">About</a></li>
        <li class="active"><a href="contact.php">Contact</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container col-md-6 col-md-offset-3">
  <p>If you have any problems about using the system, please contact:</p><br><br>
  <p>Sharon Watson</p>
  <p>Administrative Assistant</p>
  <p>Jodrey School of Computer Science</p>
  <p>Acadia University</p>
  <p>Wolfville, NS</p>
  <p>B4P 2R6</p>
  <p>tel:  902-585-1331</p>
  <p>fax:  902-585-1067</p>
  <p>email:  sharon.watson@acadiau.ca</p>
</div>
</body>
</html>