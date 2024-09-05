
<?php
session_start();
//echo"<script>alert('welcome')</script>";
if($_POST["t1"]=="dbms"&&$_POST["t2"]=="dbms")
{
     $_SESSION['user']="student";
    $con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect database".mysqli_error($conn));
}
  
else
{
    echo"<script>location.href='home.php'</script>";
}
}

else
{
     echo"<script>alert('invaild username or password')</script>";
    echo"<script>location.href='login.php'</script>";
}

?>

