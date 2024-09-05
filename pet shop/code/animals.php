<?php
 session_start();
 if(isset($_SESSION['user']))
 {
 }
 else{
  echo"<script>location.href='login.php'</script>";
 }
?>
<html>
    <head>
        <title>Animals </title>
        <style>
          
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap');
  
body {
  margin: 0;
  font-family: 'Roboto', sans-serif;
 background: #eef0eb;
  }
.topnav {
  overflow: hidden;
  background-color: #153243;
  height: 70px;
  border: none;
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
table {
  font-family: 'Roboto', sans-serif;
    border-collapse: collapse; outline: #153243 solid 5px;
    background: rgba(0,0,0,0.2);
    margin:5px ;
    width:100%;
    font-weight: 1200;
    color: #fff;
}

td, th {
    border: 2px solid #153243;
    text-align: center;
    padding: 8px;
    color: #153243;
}
th{
  background-color: #153243;
}


.custombutton{
  margin:25px;
  
}input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px ;
    background:transparent;
    border: 2px solid #153243;
    color:#153243;
}


        </style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.php"><img src="ic_add_pet.png"></a>
            <a href="animals.php">Animals</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
 <div class="custombutton">   
<form>
<button  style="  height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border:none;background-color: #153243;color:#f2f2f2;font-size:17px;"formaction="animalsadd.php">Add new 

animal</button>

<button   style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: none;background-color: #153243;color:#f2f2f2;font-size:17px;" 

formaction="animalsupdate.php">update animal</button>
</form>
</div>
    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysqli_error($conn));
}
$var=mysqli_query($con,"select P.pet_id,P.pet_category,A.breed,A.weight,A.height,A.age,fur,P.cost from pets P,animals 

A where P.pet_id=A.pet_id ");
echo "<table border size=10>";
echo "<tr>
<th style='color:#eef0eb'>pet_ID</th>
<th style='color:#eef0eb'>petcategory</th>
<th style='color:#eef0eb'>breed</th>
<th style='color:#eef0eb'>weight(kg)</th>
<th style='color:#eef0eb'>height(cm)</th>
<th style='color:#eef0eb'>age(m)</th>
<th style='color:#eef0eb'>fur</th>
<th style='color:#eef0eb'>cost(Rs)</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td >$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    <td>$arr[5]</td>
    <td>$arr[6]</td>
    <td>$arr[7]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>

<div class="lastblock" style="margin-top:25px;">
<form action="deleteanimal.php" method="post">
    <input  id="dbutton" type="text" name="t1" placeholder="Enter the id to delete" required>
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border:none;background-color: #153243;color:#f2f2f2;font-size:17px;"type="submit" value="Delete">
</form> 
</div>
</body>
</html>