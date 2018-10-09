<?php
session_start();

$message = '';

if(isset($_SESSION['login_user'])){
  //header("Location: /");
}

if(isset($_POST['gender'])){
   $gender = $_POST['gender'];
} else{
  $gender = NULL;
}

if($gender != NULL){
  if($gender = "Male"){

  } else{

  }
}

require 'database.php';

if(!empty($_POST['firstName']) && !empty($_POST['middleName']) && !empty($_POST['lastName']) && !empty($_POST['gender'])
&& !empty($_POST['nationality']) && !empty($_POST['phoneNumber']) && !empty($_POST['passport']) && !empty($_POST['email'])
&& !empty($_POST['password'])):
  $sql = "INSERT INTO Passenger(firstName, middleName, lastName, gender, nationality, phoneNumber, passport, email, password)
  VALUES(:firstName, :middleName, :lastName, :gender, :nationality, :phoneNumber, :passport, :email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':firstName', $_POST['firstName']);
  $stmt->bindParam(':middleName', $_POST['middleName']);
  $stmt->bindParam(':lastName', $_POST['lastName']);
  $stmt->bindParam(':gender', $_POST['gender']);
  $stmt->bindParam(':nationality', $_POST['nationality']);
  $stmt->bindParam(':phoneNumber', $_POST['phoneNumber']);
  $stmt->bindParam(':passport', $_POST['passport']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':password', $_POST['password']);
  $_SESSION['email'] = $_POST['email'];

  if($stmt->execute()):
    $message = 'Successfully created new user';
    // header("Location: information.php");
  else:
    $message = 'Sorry there must have been an issue creating your account';
  endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
  <link href="css/index.css" rel="stylesheet">

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
  			<div id="register">
          <h2>Register</h2>
          <form action="" method="post">
            <div class="row text-center" style="margin-left: 50px;">
              <div class="firstName">
                First Name: <input id="firstName" name="firstName" placeholder="Enter first name" type="text">
              </div>
              <div class="gender">
                Gender: <input id="gender" name="gender" type="radio" value="Male" /> Male <input name="gender" type="radio" value="Female" /> Female
              </div>
            </div>
            <div class="row text-center" style="margin-left: 50px;">
              <div class="middleName">
                Middle Name: <input id="middleName" name="middleName"placeholder="Enter middle name" type="text" />
              </div>
              <div class="birthdate">
                Date of Birth: <input id="mob" name="mob" placeholder="Month" type="text" list="monthList">
                <datalist id="monthList">
                  <option value="January"></option>
                  <option value="February"></option>
                  <option value="March"></option>
                  <option value="April"></option>
                  <option value="May"></option>
                  <option value="June"></option>
                  <option value="July"></option>
                  <option value="August"></option>
                  <option value="September"></option>
                  <option value="October"></option>
                  <option value="November"></option>
                  <option value="December"></option>
                </datalist>
                <input id="dob" name="dob" placeholder="Day" type="text">
                <input id="yob" name="yob" placeholder="Year" type="text">
              </div>
            </div>
            <div class="row text-center" style="margin-left: 50px;">
              <div class="lastName">
                Last Name: <input id="lastName" name="lastName" placeholder="Enter last name" type="text">
              </div>
              <div class="nationality">
                Nationality: <input id="nationality" name="nationality" placeholder="Enter nationality" type="text" list="nationalityList">
                <datalist id="nationalityList">
                  <option value="Afghanistan"></option>
                  <option value="Africa"></option>
                  <option value="Albania"></option>
                  <option value="Algeria"></option>
                  <option value="Angola"></option>
                  <option value="Argentina"></option>
                  <option value="Australia"></option>
                  <option value="Austria"></option>
                  <option value="Bahamas"></option>
                  <option value="Bahrain"></option>
                  <option value="Bangladesh"></option>
                  <option value="Belgium"></option>
                  <option value="Bermuda"></option>
                  <option value="Bolivia"></option>
                  <option value="Brazil"></option>
                  <option value="Brunei"></option>
                  <option value="Bulgaria"></option>
                  <option value="Cambodia"></option>
                  <option value="Canada"></option>
                  <option value="Chile"></option>
                  <option value="China"></option>
                  <option value="Columbia"></option>
                  <option value="Costa Rica"></option>
                  <option value="Croatia"></option>
                  <option value="Cuba"></option>
                  <option value="Czech Republic"></option>
                  <option value="Denmark"></option>
                  <option value="Dominican Republic"></option>
                  <option value="Ecuador"></option>
                  <option value="Egypt"></option>
                  <option value="Estonia"></option>
                  <option value="Ethiopia"></option>
                  <option value="Fiji"></option>
                  <option value="Finland"></option>
                  <option value="France"></option>
                  <option value="Georgia"></option>
                  <option value="Germany"></option>
                  <option value="Greece"></option>
                  <option value="Greenland"></option>
                  <option value="Haiti"></option>
                  <option value="Hong Kong"></option>
                  <option value="Hungary"></option>
                  <option value="Iceland"></option>
                  <option value="India"></option>
                  <option value="Indonesia"></option>
                  <option value="Iran"></option>
                  <option value="Iraq"></option>
                  <option value="Ireland"></option>
                  <option value="Israel"></option>
                  <option value="Italy"></option>
                  <option value="Jamaica"></option>
                  <option value="Japan"></option>
                  <option value="Jordan"></option>
                  <option value="Kazakhstan"></option>
                  <option value="Kenya"></option>
                  <option value="Korea"></option>
                  <option value="Kuwait"></option>
                  <option value="Lebanon"></option>
                  <option value="Liberia"></option>
                  <option value="Libya"></option>
                  <option value="Malaysia"></option>
                  <option value="Maldives"></option>
                  <option value="Mexico"></option>
                  <option value="Micronesia"></option>
                  <option value="Mongolia"></option>
                  <option value="Morocco"></option>
                  <option value="Nepal"></option>
                  <option value="New Zealand"></option>
                  <option value="Nicaragua"></option>
                  <option value="Nigeria"></option>
                  <option value="Norway"></option>
                  <option value="Oman"></option>
                  <option value="Pakistan"></option>
                  <option value="Palestine"></option>
                  <option value="Papua New Guinea"></option>
                  <option value="Paraguay"></option>
                  <option value="Philippines"></option>
                  <option value="Poland"></option>
                  <option value="Portugal"></option>
                  <option value="Puerto Rico"></option>
                  <option value="Qatar"></option>
                  <option value="Romania"></option>
                  <option value="Rome"></option>
                  <option value="Russia"></option>
                  <option value="Saudi Arabia"></option>
                  <option value="Scotland"></option>
                  <option value="Serbia"></option>
                  <option value="Singapore"></option>
                  <option value="Slovakia"></option>
                  <option value="Spain"></option>
                  <option value="Sweden"></option>
                  <option value="Switzerland"></option>
                  <option value="Syria"></option>
                  <option value="Taiwan"></option>
                  <option value="Tanzania"></option>
                  <option value="Thailand"></option>
                  <option value="Tunisia"></option>
                  <option value="Turkey"></option>
                  <option value="Uganda"></option>
                  <option value="Ukrain"></option>
                  <option value="United Kingdom"></option>
                  <option value="United States of America"></option>
                  <option value="Uruguay"></option>
                  <option value="Venezuela"></option>
                  <option value="Vietnam"></option>
                  <option value="Yemen"></option>
                  <option value="Zimbabwe"></option>
                </datalist>
              </div>
            </div>
            <div class="row text-center" style="margin-left: 50px;">
              <div class="email">
                E-mail: <input id="email" name="email" placeholder="Enter email" type="text">
              </div>
              <div class="phoneNumber">
                Mobile Number: <input id="phoneNumber" name="phoneNumber" placeholder="Enter mobile number (optional)" type="text">
              </div>
            </div>
            <div class="row text-center" style="margin-left: 50px;">
              <div class="password">
                Password: <input id="password" name="password" placeholder="Enter password" type="password">
              </div>
              <div class="passport">
                Passport: <input id="passport" name="passport" placeholder="Enter passport (optional)" type="text">
              </div>
            </div>
            <input type="submit" name="submit" value="Register" class="btn-register">
  					<p>Already a member? <a href="login.php">Log in</a></p><br>
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
