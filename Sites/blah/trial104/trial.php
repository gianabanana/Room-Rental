<?php
$message='';

$connection = mysql_connect("localhost", "root", "root");
$db = mysql_select_db("wingtel", $connection);

if(isset($_POST['search'])){
  if(!empty($_POST['origin']) || !empty($_POST['destination']) || !empty($_POST['departureDate'])){

    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    echo $origin;
    echo $destination;
    echo $departureDate;

    $sql = "SELECT idDirection FROM Direction WHERE origin = '$origin' AND destination = '$destination'";
    $result = mysql_query($sql, $connection);
    while($row=mysql_fetch_array($result)){
      $idDirection = $row['idDirection'];
    }

    $sql2 = "SELECT idSchedule FROM Schedule WHERE departureDate = '$departureDate'";
    $result2 = mysql_query($sql2, $connection);
    while($row2=mysql_fetch_array($result2)){
      $idSchedule = $row2['idSchedule'];
    }

    $sql3 = "SELECT idFlight FROM Flight WHERE Schedule_idSchedule = '$idSchedule'";
    $result3 = mysql_query($sql3, $connection);
    while($row3=mysql_fetch_array($result3)){
      $idFlight = $row3['idFlight'];
    }
    echo $idDirection;
    echo $idSchedule;
    echo $idFlight;

    $sql4 = "SELECT idFlight, departureDate, arrivalDate, origin, destination
    FROM Flight
    INNER JOIN Schedule ON Schedule_idSchedule = idSchedule
    INNER JOIN Direction ON Direction_idDirection = idDirection
    WHERE origin = '$origin' AND destination = '$destination' AND departureDate = '$departureDate'";
    $result4 = mysql_query($sql4, $connection);
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
    <th style=font-size:14px>Price</th>
    </tr>";
    while($row4=mysql_fetch_array($result4)){
      echo "<tr>";
      echo "<td>"."<input readonly=readonly style=width:70px;text-align:center;font-size:12px;cursor:pointer type=text name=idFlight value=".$row4['idFlight']." </td>";
      echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=origin value=".$row4['origin']." </td>";
      echo "<td>"."<input readonly=readonly style=width:180px;text-align:center;font-size:12px;cursor:pointer type=text name=destination value=".$row4['destination']." </td>";
      echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=departureDate value=".$row4['departureDate'] ." </td>";
      echo "<td>"."<input readonly=readonly style=width:120px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalDate value=".$row4['arrivalDate'] ." </td>";
      echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=departureTime value=".$row4['departureTime'] ." </td>";
      echo "<td>"."<input readonly=readonly style=width:125px;text-align:center;font-size:12px;cursor:pointer type=text name=arrivalTime value=".$row4['arrivalTime'] ." </td>";
      echo "<td>"."<input style=width:70px;text-align:center;font-size:12px type=text name=price value=".$row4['price']." </td>";
      echo "</tr>";
      echo "</form>";
    }
    echo "</table>";
  }
}
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
  <link href="css/flight.css" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    $("#myCheck").click(function(){
      $("#iconTrial").toggle();
      $("#trial").toggle();
    });
  });
  </script>

</head>

<body>
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
      </div>
      <div id="flight">
        <h2>Flights</h2>
        <form action="" method="post">
          <div class="row text-center">
            <div class="from">From:</div>
            <div class="to">To:</div>
            <div class="noOfPassengers">No. of Passengers:</div>
          </div>
          <div class="row text-center">
            <div class="origin">
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
            </div>
            <div class="destination">
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
            </div>
            <div class="passenger">
              <i class="fas fa-user-friends"></i>
              <input type="text" name="search" id="search" placeholder="Adult" list="passengerList" />
              <datalist id="passengerList">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
              </datalist>
              <input type="text" name="search" id="search" placeholder="Child" list="passengerList" />
              <datalist id="passengerList">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
              </datalist>
              <input type="text" name="search" id="search" placeholder="Infant" list="passengerList" />
              <datalist id="passengerList">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
              </datalist>
            </div>
          </div>
          <div class="row text-center">
            <div class="departure">Departure:</div>
            <div class="return"><input type="checkbox" id="myCheck"> Return:</div>
            <div class="seatClass">Seat Class:</div>
          </div>
          <div class="row text-center">
            <div class="departureDate"><i class="fas fa-calendar-alt" style="width: 20px;"></i><input type="date" name="departureDate"></div>
            <div class="returnDate"><i class="fas fa-calendar-alt" style="display: none; width: 20px;" id="iconTrial"></i><input id="trial" type="date" style="display: none"></div>
            <div class="seatClass2">
              <i class="icofont-chair"></i>
              <select>
                <?php
                $sql = "SELECT * FROM TravelClass order by idTravelClass asc";
                $query = mysql_query($sql, $connection);
                while($row=mysql_fetch_array($query)){
                ?>
                <option>
                  <?php echo $row["travelClassName"]; ?>
                </option>
                <?php
              }
                ?>
              </select>
            </div>
          </div>
      <!-- <div class="row text-center">
        <button type="submit" name="submit" class="btn-search">
          <i class="fa fa-search"></i> Search Flights
        </button>
      </div> -->
      <input type="submit" name="search" value="Search Flights" class="btn-search">
    </form>
  </div>
</body>
