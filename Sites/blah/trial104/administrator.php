<?php
$message = '';

$connection = mysql_connect("localhost", "root", "root");
$db = mysql_select_db("wingtel", $connection);

if(isset($_POST['submit'])){
  if(!empty($_POST['origin']) && !empty($_POST['destination']) && !empty($_POST['departureDate']) && !empty($_POST['arrivalDate'])
  && !empty($_POST['departureTime']) && !empty($_POST['arrivalTime'])){
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    $arrivalDate = $_POST['arrivalDate'];
    $departureTime = $_POST['departureTime'];
    $arrivalTime = $_POST['arrivalTime'];

    $sql = "SELECT idDirection FROM Direction WHERE origin = '$origin' AND destination = '$destination'";
    $result = mysql_query($sql, $connection);
    while($row=mysql_fetch_array($result)){
      $idDirection = $row['idDirection'];
    }

    $sql2 = "INSERT INTO Schedule(departureDate, arrivalDate, departureTime, arrivalTime, Direction_idDirection)
    VALUES('$departureDate', '$arrivalDate', '$departureTime', '$arrivalTime', '$idDirection')";
    mysql_query($sql2, $connection);

    $sql3 = "SELECT idSchedule FROM Schedule WHERE Direction_idDirection = '$idDirection'";
    $result2 = mysql_query($sql3, $connection);
    while($row2=mysql_fetch_array($result2)){
      $idSchedule = $row2['idSchedule'];
    }

    $length = 6;
    $randomString = substr(str_shuffle("0123456789"), 0, $length);

    $sql4 = "INSERT INTO Flight(idFlight, Schedule_idSchedule, FlightStatus_idFlightStatus)
    VALUES('$randomString', '$idSchedule', '1')";
    mysql_query($sql4, $connection);
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
    <link href="css/administrator.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
      $("#createFunction").click(function(){
        $("#createFlight").show();
        $("#adminHome").hide();
        $("#updateFlight").hide();
        $("#deleteFlight").hide();
      });
    });
    </script>

    <script>
    $(document).ready(function(){
      $("#updateFunction").click(function(){
        $("#updateFlight").show();
        $("#adminHome").hide();
        $("#createFlight").hide();
        $("#deleteFlight").hide();
      });
    });
    </script>

    <script>
    $(document).ready(function(){
      $("#deleteFunction").click(function(){
        $("#deleteFlight").show();
        $("#adminHome").hide();
        $("#createFlight").hide();
        $("#updateFlight").hide();
      });
    });
    </script>

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="administrator.php">Wingtel (Admin)</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="createFunction" href="#createFlight">CREATE FLIGHT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="updateFunction" href="#updateFlight">UPDATE FLIGHT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="deleteFunction" href="#deleteFlight">DELETE FLIGHT</a>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html">LOG OUT</a>
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

        <div id="adminHome">
          <h2>List of Flights</h2>
          <?php
          $sql7 = "SELECT idFlight, departureDate, arrivalDate, departureTime, arrivalTime, origin, destination, flightStatusName
          FROM Flight INNER JOIN Schedule ON Schedule_idSchedule = idSchedule INNER JOIN Direction
          ON Direction_idDirection = idDirection INNER JOIN FlightStatus ON FlightStatus_idFlightStatus = idFlightStatus";
          $result5 = mysql_query($sql7, $connection);
          echo "<br>";
          echo "<table border=1>
          <tr>
          <th style=font-size:14px>Flight #</th>
          <th style=font-size:14px>Origin</th>
          <th style=font-size:14px>Destination</th>
          <th style=font-size:14px>Departure Date</th>
          <th style=font-size:14px>Arrival Date</th>
          <th style=font-size:14px>Departure Time</th>
          <th style=font-size:14px>Arrival Time</th>
          <th style=font-size:14px>Flight Status</th>
          <th style=font-size:14px>Price</th>
          </tr>";
          while($row5=mysql_fetch_array($result5)){
            echo "<form action=administrator.php method=post>";
            echo "<tr>";
            echo "<td>"."<input readonly=readonly style=width:70px;text-align:center;font-size:12px;cursor:pointer type=text name=idFlight value=".$row5['idFlight']." </td>";
            echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=origin value=".$row5['origin']." </td>";
            echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=destination value=".$row5['destination']." </td>";
            echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=departureDate value=".$row5['departureDate'] ." </td>";
            echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalDate value=".$row5['arrivalDate'] ." </td>";
            echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=departureTime value=".$row5['departureTime'] ." </td>";
            echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalTime value=".$row5['arrivalTime'] ." </td>";
            // echo "<td>"."<select style=width:150px;text-align:center;font-size:12px;cursor:pointer name=flightStatusName value=".$row3['flightStatusName'].">
            // <option value=delayed>Delayed</option>
            // <option value=departed>Departed</option>
            // <option value=inAir>In Air</option>
            // <option value=expected>Expected</option>
            // <option value=diverted>Diverted</option>
            // <option value=recovery>Recovery</option>
            // <option value=landed>Landed</option>
            // <option value=arrived>Arrived</option>
            // <option value=cancelled>Cancelled</option>
            // <option value=noTakeoffInfo>No Takeoff Info - Call Airline</option>
            // <option value=pastFlight>Past Flight</option>
            // </select></td>";
            echo "<td>"."<input style=width:150px;text-align:center;font-size:12px type=text name=flightStatusName value=".$row5['flightStatusName']." </td>";
            echo "<td>"."<input style=width:70px;text-align:center;font-size:12px type=text name=price value=".$row5['price']." </td>";
            // echo "<td>"."<input type=submit name=login value=Login" ." </td>";
            // echo "<td>"."<input type=submit name=logout value=Logout" ." </td>";
            echo "</tr>";
            echo "</form>";
          }
          echo "</table>";
          ?>
        </div>

        <div id="createFlight" style="display: none">
          <h2>Create Flight</h2>
          <form action="" method="post">
            <div class="row text-center">
              <div class="from">From:</div>
              <div class="to">To:</div>
            </div>
            <div class="row text-center">
              <div class="origin">
                <!-- <form name="search" id="search" action="" method="post"> -->
                  <i class="fas fa-plane-departure"></i>
                <select name="origin">
                  <?php
                  $sql = "SELECT * FROM Country order by countryName asc";
                  $query = mysql_query($sql, $connection);
                  while($row=mysql_fetch_array($query)){
                  ?>
                  <option>
                    <?php echo $row["countryName"]; ?>
                  </option>
                  <?php
                }
                  ?>
                </select>
              <!-- </form> -->
              </div>
              <div class="destination">
                <!-- <form name="search" id="search" action="" method="post"> -->
                  <i class="fas fa-plane-arrival"></i>
                <select name="destination">
                  <?php
                  $sql = "SELECT * FROM Country order by countryName asc";
                  $query = mysql_query($sql, $connection);
                  while($row=mysql_fetch_array($query)){
                  ?>
                  <option>
                    <?php echo $row["countryName"]; ?>
                  </option>
                  <?php
                }
                  ?>
                </select>
              <!-- </form> -->
            </div>
          </div>
          <div class="row text-center">
            <div class="departureDateText">Departure Date:</div>
            <div class="arrivalDateText">Arrival Date:</div>
          </div>
          <div class="row text-center">
            <div class="departureDate"><i class="fas fa-calendar-alt" style="width: 20px;"></i><input type="date" name="departureDate"></div>
            <div class="arrivalDate"><i class="fas fa-calendar-alt" style="width: 20px;"></i><input type="date" name="arrivalDate"></div>
          </div>
          <div class="row text-center">
            <div class="departureTimeText">Departure Time:</div>
            <div class="arrivalTimeText">Arrival Time:</div>
          </div>
          <div class="row text-center">
            <div class="departureTime"><i class="far fa-clock"></i><input type="time" name="departureTime"></div>
            <div class="arrivalTime"><i class="far fa-clock"></i><input type="time" name="arrivalTime"></div>
          </div>
          <input type="submit" name="submit" value="CREATE" class="btn-create">
          <p><?php echo $departureDate; ?></p>
          <?php echo $departureDate; ?>
        </form>
      </div>

      <div id="updateFlight" style="display: none">
        <h2>Update Flight</h2>
        <?php
        $sql5 = "SELECT idFlight, departureDate, arrivalDate, departureTime, arrivalTime, origin, destination, flightStatusName
        FROM Flight INNER JOIN Schedule ON Schedule_idSchedule = idSchedule INNER JOIN Direction
        ON Direction_idDirection = idDirection INNER JOIN FlightStatus ON FlightStatus_idFlightStatus = idFlightStatus";
        $result3 = mysql_query($sql5, $connection);
        echo "<br>";
        echo "<table border=1>
        <tr>
        <th style=font-size:14px>Flight #</th>
        <th style=font-size:14px>Origin</th>
        <th style=font-size:14px>Destination</th>
        <th style=font-size:14px>Departure Date</th>
        <th style=font-size:14px>Arrival Date</th>
        <th style=font-size:14px>Departure Time</th>
        <th style=font-size:14px>Arrival Time</th>
        <th style=font-size:14px>Flight Status</th>
        <th style=font-size:14px>Price</th>
        </tr>";
        while($row3=mysql_fetch_array($result3)){
          echo "<form action=administrator.php method=post>";
          echo "<tr>";
          echo "<td>"."<input readonly=readonly style=width:70px;text-align:center;font-size:12px;cursor:pointer type=text name=idFlight value=".$row3['idFlight']." </td>";
          echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=origin value=".$row3['origin']." </td>";
          echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=destination value=".$row3['destination']." </td>";
          echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=departureDate value=".$row3['departureDate'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalDate value=".$row3['arrivalDate'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=departureTime value=".$row3['departureTime'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalTime value=".$row3['arrivalTime'] ." </td>";
          // echo "<td>"."<select style=width:150px;text-align:center;font-size:12px;cursor:pointer name=flightStatusName value=".$row3['flightStatusName'].">
          // <option value=delayed>Delayed</option>
          // <option value=departed>Departed</option>
          // <option value=inAir>In Air</option>
          // <option value=expected>Expected</option>
          // <option value=diverted>Diverted</option>
          // <option value=recovery>Recovery</option>
          // <option value=landed>Landed</option>
          // <option value=arrived>Arrived</option>
          // <option value=cancelled>Cancelled</option>
          // <option value=noTakeoffInfo>No Takeoff Info - Call Airline</option>
          // <option value=pastFlight>Past Flight</option>
          // </select></td>";
          echo "<td>"."<input style=width:150px;text-align:center;font-size:12px type=text name=flightStatusName value=".$row3['flightStatusName']." </td>";
          echo "<td>"."<input style=width:70px;text-align:center;font-size:12px type=text name=price value=".$row3['price']." </td>";
          // echo "<td>"."<input type=submit name=login value=Login" ." </td>";
          // echo "<td>"."<input type=submit name=logout value=Logout" ." </td>";
          echo "</tr>";
          echo "</form>";
        }
        echo "</table>";
        ?>
      </div>

      <div id="deleteFlight" style="display: none">
        <h2>Delete Flight</h2>
        <?php
        $sql6 = "SELECT idFlight, departureDate, arrivalDate, departureTime, arrivalTime, origin, destination, flightStatusName
        FROM Flight INNER JOIN Schedule ON Schedule_idSchedule = idSchedule INNER JOIN Direction
        ON Direction_idDirection = idDirection INNER JOIN FlightStatus ON FlightStatus_idFlightStatus = idFlightStatus";
        $result4 = mysql_query($sql6, $connection);
        echo "<br>";
        echo "<table border=1>
        <tr>
        <th style=font-size:14px>Flight #</th>
        <th style=font-size:14px>Origin</th>
        <th style=font-size:14px>Destination</th>
        <th style=font-size:14px>Departure Date</th>
        <th style=font-size:14px>Arrival Date</th>
        <th style=font-size:14px>Departure Time</th>
        <th style=font-size:14px>Arrival Time</th>
        <th style=font-size:14px>Flight Status</th>
        <th style=font-size:14px>Price</th>
        </tr>";
        while($row4=mysql_fetch_array($result4)){
          echo "<form action=administrator.php method=post>";
          echo "<tr>";
          echo "<td>"."<input readonly=readonly style=width:70px;text-align:center;font-size:12px;cursor:pointer type=text name=idFlight value=".$row4['idFlight']." </td>";
          echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=origin value=".$row4['origin']." </td>";
          echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=destination value=".$row4['destination']." </td>";
          echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=departureDate value=".$row4['departureDate'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalDate value=".$row4['arrivalDate'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=departureTime value=".$row4['departureTime'] ." </td>";
          echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalTime value=".$row4['arrivalTime'] ." </td>";
          // echo "<td>"."<select style=width:150px;text-align:center;font-size:12px;cursor:pointer name=flightStatusName value=".$row3['flightStatusName'].">
          // <option value=delayed>Delayed</option>
          // <option value=departed>Departed</option>
          // <option value=inAir>In Air</option>
          // <option value=expected>Expected</option>
          // <option value=diverted>Diverted</option>
          // <option value=recovery>Recovery</option>
          // <option value=landed>Landed</option>
          // <option value=arrived>Arrived</option>
          // <option value=cancelled>Cancelled</option>
          // <option value=noTakeoffInfo>No Takeoff Info - Call Airline</option>
          // <option value=pastFlight>Past Flight</option>
          // </select></td>";
          echo "<td>"."<input style=width:150px;text-align:center;font-size:12px type=text name=flightStatusName value=".$row4['flightStatusName']." </td>";
          echo "<td>"."<input style=width:70px;text-align:center;font-size:12px type=text name=price value=".$row4['price']." </td>";
          // echo "<td>"."<input type=submit name=login value=Login" ." </td>";
          // echo "<td>"."<input type=submit name=logout value=Logout" ." </td>";
          echo "</tr>";
          echo "</form>";
        }
        echo "</table>";
        ?>
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
