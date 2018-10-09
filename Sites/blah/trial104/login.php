<?php

session_start(); // Starting Session

$message=''; // Variable To Store Error Message

if(isset($_POST['submit'])){
  // $_SESSION["name"] = $_POST["name"];
  // $_SESSION['last_login_timestamp'] = time();
  // header("location:index.php");
  if(empty($_POST['email']) || empty($_POST['password'])){
    $message = "Email or Password is empty!";
  } else{
    // $_SESSION["name"] = $_POST["name"];
    // Define $username and $password
    $email=$_POST['email'];
    $password=$_POST['password'];
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysql_connect("localhost", "root", "root");
    // To protect MySQL injection for Security purpose
    $email = stripslashes($email);
    $password = stripslashes($password);
    $email = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);
    // Selecting Database
    $db = mysql_select_db("wingtel", $connection);
    // SQL query to fetch information of registered users and finds user match.
    $query = mysql_query("SELECT * FROM Passenger WHERE email='$email' AND password='$password'", $connection);
    $rows = mysql_num_rows($query);

    if($rows==1){
      if($email=='admin'){
        header("location: administrator.php");
      } else{
        $_SESSION['login_user']=$email; // Initializing Session

        header("location: account.php");
      }
    } else{
      $message = "Email or Password is invalid!";
    }
    mysql_close($connection); // Closing Connection
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wingtel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/icofont/icofont.min.css" rel="stylesheet" >

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html">Wingtel</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#promos">PROMOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="flight.php">FLIGHTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="hotel.php">HOTELS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Account</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
        </div>
        <div id="login">
          <h2>Login</h2>
          <form action="" method="post">
            <div class="row text-center">
              <div class="email">
                <input id="email" name="email" placeholder="Enter email" type="text">
              </div>
            </div>
            <div class="row text-center">
              <div class="password">
                <input id="password" name="password" placeholder="Enter password" type="password">
              </div>
            </div>
            <input type="submit" name="submit" value="Login" class="btn-login">
  					<p>Not yet a member? <a href="index.php">Sign up</a></p><br>
          	<p><?php echo $message; ?></p>
          </form>
        </div>
      </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery/bootstrap-datepicker.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

</body>
</html>
