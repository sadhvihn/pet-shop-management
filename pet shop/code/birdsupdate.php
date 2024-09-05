<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.php'</script>";
 }
?>
<!doctype html>
<html>
<head>
        <title>Birds </title>
        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #eef0eb;
}
.topnav {
  overflow: hidden;
  background-color:#284b63;
  height: 70px;
  border: none
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
fieldset { 
  background: rgba(0,0,0,0.1);
	padding: 10px;
   margin:auto;
   max-width:450px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid  #284b63;


}



 </style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.php"><img src="ic_add_pet.png"></a>
            <a href="birds.php">Birds</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>

<form>
    <button type="submit" formaction="birds.php" style="margin:15px;height: 30px;width: 100px;cursor:pointer;border-radius:15px;
border: 3px solid #284b63;background-color:#284b63;color:#f2f2f2;font-size:17px;">Back</button>
</form>  
<form method="post" action="birdsupdate.php">  
<fieldset>
  <input type="text" name="id" placeholder=" Enter pet_id" style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="category" placeholder=" Enter pet_category"  style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;  background:transparent;"  required>
  <br><br>
   <input type="text" name="type" placeholder=" Enter bird type"  style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;  background:transparent;"  required>
  <br><br>
  <select name="noise"  style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;  background:transparent;">
  <option value="low">low</option>
  <option value="moderate">moderate</option>
  <option value="high">high</option>
  </select>
  <br><br>
  <input type="number" name="cost" placeholder=" Enter cost"  style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;  background:transparent;" min="0"  required>
  <br><br>
  <input type="submit" name="submit" value="update" style="width:100%;height:30px;
   border: 2px solid  #284b63; border-radius:3px;color:white; cursor:pointer;background-color:#284b63">&ensp; 
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

    $id = $_POST["id"];
    $category = $_POST["category"];
    $type= $_POST["type"];
    $noise = $_POST["noise"];
    $cost = $_POST["cost"];

    $Query2="select count(*) from pets where pet_id='$id'";
    $Execute = mysqli_query($conn,$Query2);
    $count = mysqli_fetch_row($Execute);

    if($count[0]==1)
    {
        $sql = "UPDATE pets
                INNER JOIN birds ON pets.pet_id = birds.pet_id
                SET pets.pet_category = '$category',
                    pets.cost = '$cost',
                    birds.type = '$type',
                    birds.noise = '$noise'
                WHERE pets.pet_id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo'<div>
            <h1 style="color:#f2f2f2;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">'
            .$id. ' updated successfully</h1>
               </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        echo '<div>
        <h1 style="color:#284b63;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given pet_id not found</h1>
           </div>';
    }

    $conn->close();
}
?>