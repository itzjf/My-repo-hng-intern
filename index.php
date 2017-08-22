<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hngtestintern";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> 


<?php
if(isset($_POST['sub']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gen = $_POST['gender'];


$sql = "INSERT INTO hngtest (FirstName, LastName, Gender)
VALUES ('$fname', '$lname', '$gen')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="index.php" method="post">
<label for="fname"> First name</label>
<input type="text" name="fname" id="fname" />
<br />
<br />
<label for="lname"> Last name</label>
<input type="text" name="lname" id="lname" />
<br />
<br />
<label for="gen"> gender</label>
<input type="text" name="gender" id="gen" />
<br />
<br />
<input type="submit" name="sub" value="submit" />




</form>
<br/>

<hr/>
<br/>
<?php

$sql_read = "SELECT FirstName, LastName, Gender FROM hngtest";
$result = mysqli_query($conn, $sql_read);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $myfname = $row["FirstName"]; 
	$mylname = $row["LastName"];
	$mygender = $row["Gender"];
   

?> 

fist name = <?php echo $myfname; ?><br/>
last name =  <?php echo $mylname; ?><br/>
gender = <?php echo $mygender; ?><br/>
<br/>

<?php
 }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>

</body>
</html>
