
<?php



// Grab User submitted information
$email = $_POST["username"];
$pass = $_POST["password"];

if($email=='student'&& $pass=='student')
echo "Connected successfully";
?>