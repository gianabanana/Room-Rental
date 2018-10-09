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

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/hotel.css" rel="stylesheet">
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
        <!-- <div class="intro-lead-in">Welcome!</div>
        <div class="intro-heading text-uppercase"><br />It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> -->
      </div>
      <div id="hotel">
        <h2>Hotels</h2>
        <div class="row text-center">
          <div class="cityDestinationHotel">City, destination, or hotel name:</div>
          <div class="guestANDroom">Guest(s) and Room(s):</div>
        </div>
        <div class="row text-center">
          <div class="cityHotelPlacetogo">
            <input type="text" name="search" id="search" style="width: 420px;" placeholder="City, hotel, place to go" list="hotelList" />
            <datalist id="hotelList">
              <option value="Bacolod"></option>
              <option value="Basco-Batanes"></option>
              <option value="Butuan"></option>
            </datalist>
          </div>
          <div class="guestANDroom2">
            <input type="text" name="search" id="search" style="width: 250px" placeholder="1 guest, 1 room" list="guestANDroomList" />
            <datalist id="guestANDroomList">
              <option value="Guest"></option>
              <option value="Room"></option>
            </datalist>
          </div>
        </div>
        <div class="row text-center">
          <div class="check-in">Check-in:</div>
          <div class="duration">Duration:</div>
          <div class="check-out">Check-out:</div>
        </div>
        <div class="row text-center" style="margin-top: -10px;">
          <div class="check-inDate"><input type="date" name="check-inDate"></div>
          <div class="duration">
            <input type="text" name="search" id="search" placeholder="1 night" list="nightList" />
            <datalist id="nightList">
              <option value="1 night"></option>
              <option value="2 nights"></option>
              <option value="3 nights"></option>
              <option value="4 nights"></option>
              <option value="5 nights"></option>
              <option value="6 nights"></option>
              <option value="7 nights"></option>
              <option value="8 nights"></option>
              <option value="9 nights"></option>
              <option value="10 nights"></option>
              <option value="11 nights"></option>
              <option value="12 nights"></option>
              <option value="13 nights"></option>
              <option value="14 nights"></option>
              <option value="15 nights"></option>
            </datalist>
          </div>

          <!-- <div class="container">
            <div class="row">
            </div>
            <br />
              <div class="row">
                  <div class='col-sm-3'>
                      <div class="form-group">
                          <div class='input-group date' id='datetimepicker1'>
                              <input type='text' class="form-control" />
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div> -->

        </div>
        <div class="row text-center">
          <button type="submit" name="submit" class="btn-search">
            <i class="fa fa-search"></i> Search Hotels
        </button>
        </div>
      </div>

      <!--  Hotel Partners  -->
      <div id="partners">
        <div class="rowHead">
          Hotel Partners
        </div>
        <div class="rowBody">
          We are partnering with hotel chains across the Philippines to ensure a comfortable stay wherever you travel.
        </div>
      </div>
      <div class="container" style="padding-bottom: 20px;">
        <div class="row" style="margin-top: 35px; margin-left: 60px; margin-bottom: 20px;">
            <a href="#">
              <img src="img/logos/hotelPartners1.png" alt="">
              <img src="img/logos/hotelPartners3.png" alt="" style="margin-left: -4px;">
            </a>
        </div>
        <div class="row" style="margin-top: 15px; margin-left: 115px; margin-bottom: 20px;">
            <a href="#">
              <img src="img/logos/hotelPartners2.png" alt="">
              <img src="img/logos/hotelPartners4.png" alt="" style="margin-left: -4px;">
            </a>
        </div>
      </div>
    </div>
  </header>

  <!--  Payment Partners  -->
  <div id="partners">
    <div class="rowHead2 text-center">
      Payment Partners
    </div>
    <div class="rowBody2 text-center">
      We are partnering with the most reliable payment service providers to make sure every transaction is smooth and worry-free.
    </div>
  </div>
  <div class="container">
    <div class="row" style="margin-left: 202px; margin-bottom: 20px;">
        <a href="#">
          <img src="img/logos/paymentPartners.png" alt="">
        </a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; 2018 Wingtel</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

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
