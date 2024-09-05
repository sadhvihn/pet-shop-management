<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
<head>
  <title>
  Salesdetails
  </title>
<style>
  
  body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background:  #eef0eb;
}
.topnav {
  overflow: hidden;
  background-color:#284b63;
  height: 70px;
  border: 3px solid #284b63;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.topnav-right {
  float: right;
}

fieldset { max-width: 450px;
	background: rgba(0,0,0,0.1);
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #284b63;


}

legend {
  padding: 0.2em 0.5em;
  border:2px solid #284b63;
  color:#284b63;
  font-size:90%;
  text-align:center;
  width:250px;
  }
</style>
  </head>
<body>
<div class="topnav">
            <a class="active" href="home.php"><img src="ic_add_pet.png"></a>
            <a href="sales.php">Sales details</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
<form>
<button type="submit" formaction="sales.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #284b63;background-color: #284b63;color:#f2f2f2;font-size:15px;">back</button>
</form>
<form method="post" action="salesupdate.php">

  <fieldset>
  
    <input type="text"  id ="sd" name="id" placeholder="Enter the sales id" style="width:100%;height:30px;
    border: 2px solid #284b63; border-radius:5px;background:transparent" required>
   <br><br>
   <input type="text" name="csid" placeholder="Enter the customer id" style="width:100%;height:30px;
    border: 2px solid #284b63;border-radius:5px;background:transparent " required>
  <br><br>
   <input type="date" name="date" style="width:100%;height:30px;
   border: 2px solid #284b63;border-radius:5px;background:transparent" required>
  <br><br>
  <input type="number" name="total" min="0" style="width:100%;height:30px;
   border: 2px solid #284b63;border-radius:5px;background:transparent" required placeholder="Enter total amount">
  <br><br>
  <input type="submit" name="submit" value="update" style="width:100%;height:30px;border-radius:5px;
  border: 2px solid #284b63;color:#fff; cursor:pointer;background-color: #284b63">&ensp; 
</fieldset> 

</form> 
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
  // define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $cs_id = $_POST["csid"];
  $date= $_POST["date"];
  $total = $_POST["total"];
 
  $Query2="select count(*) from sales_details WHERE sd_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);
  if($count[0]==1)
  {
    $sql = "UPDATE sales_details SET cs_id='$cs_id' ,date='$date' ,total='$total' where sd_id='$id'";
    if ($conn->multi_query($sql) == TRUE) {
      echo'<div>
      <h1 style="color:#284b63;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">'
      .$id. ' updated successfully</h1>
         </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
    echo '<div>
    <h1 style="color:#284b63;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given sales_id not found</h1>
       </div>';
}




$conn->close();
}


?>