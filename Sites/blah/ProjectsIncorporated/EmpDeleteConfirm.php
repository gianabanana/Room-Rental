<?php
	 session_start();
	 if ($_SESSION['login'] != '1') {
	 	session_destroy();
	 	header("Location:login.php");
	 } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title></title>
  </head>
  <body>
  <div>
		<?php
			 include 'header.php';
		?>
		<br /><br />
		<h1><p align="center"><strong>DELETE AN EMPLOYEE RECORD</strong></p></h1>	
		<?php
			$DBConnect = mysqli_connect('localhost','root','','projectsinc');
			if (!$DBConnect) {
				die(mysqli_error());
			}
			else {
				$var_sssno = $_POST['sssno'];
				
				$SQLQuery = "select * from employee where SSSNo = '$var_sssno'";
				$result = mysqli_query($DBConnect, $SQLQuery);
				$numrows = mysqli_num_rows($result);
				
				if ($numrows > 0) {
					$SQLQuery = "delete from employee where SSSNo = '$var_sssno'";
					mysqli_query($DBConnect, $SQLQuery);
					echo '<p align="center"><font color="blue" size="+1">The record has been deleted.</font></p>';
				}
				
				mysqli_close($DBConnect);
			}
		?>
		
		<br />	
		<p align="center"><a href="maintenance.php">Back to Maintenance Module</a></p>
		<br /><br />
		<?php
			include 'footer.php';
		?>
</div>

  </body>
</html>