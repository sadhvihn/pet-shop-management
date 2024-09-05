<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>location.href='login.php'</script>";
}
?>

<html>

<head>
    <title>Petproducts </title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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
            font-family: arial, sans-serif;
            border-collapse: collapse;
            outline: #153243 solid 5px;
            background: rgba(0, 0, 0, 0.2);
            width: 100%;
            margin: 5px;
        }

        td,
        th {
            border: 1px solid #153243;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #153243;
            color: #eef0eb;
        }

        .custombutton {
            margin: 25px;
        }

        input[type=text] {
            width: 15%;
            padding: 12px 20px;
            margin: 8px;
            border: 2px solid #153243;
            background: transparent;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a class="active" href="home.php"><img src="ic_add_pet.png"></a>
        <a href="petproducts.php">pets products</a>
        <div class="topnav-right">
            <a href="logout.php">logout</a>
        </div>
    </div>
    <div class="custombutton">
        <form>
            <button style="height: 50px;width: 150px;cursor:pointer;border-radius:15px;
            border: 3px solid #153243;background-color:#153243;color:#f2f2f2;font-size:17px;" formaction="productsadd.php">Add new product</button>
            <button style="margin-left:900px; height: 50px;width: 150px;cursor:pointer;border-radius:15px;
            border: 3px solid #153243;background-color:#153243;color:#f2f2f2;font-size:17px;" formaction="productupdate.php">update product</button>
        </form>
    </div>
    <?php

    $con = mysqli_connect("localhost", "root", "", "Petshop_management");
    if (!$con) {
        die("could not connect" . mysqli_error($conn));
    }
    $var = mysqli_query($con, "select * from pet_products ");
    echo "<table border size=10>";
    echo "<tr>
        <th>pp_ID</th>
        <th>pp_name</th>
        <th>pp_type</th>
        <th>cost</th>
        <th>belongs_to</th>
        // <th>Image</th>
    </tr>";
    if (mysqli_num_rows($var) > 0) {
     
      while ($arr = mysqli_fetch_row($var)) {
          echo "<tr>
              <td>$arr[0]</td>
              <td>$arr[1]</td>
              <td>$arr[2]</td>
              <td>$arr[3]</td>
              <td>$arr[4]</td>
                  

             // <td><a href='https://i.pinimg.com/474x/9b/2c/f7/9b2cf7799020abd179ae519a866e35b6.jpg' target='_blank'><img src='https://i.pinimg.com/474x/9b/2c/f7/9b2cf7799020abd179ae519a866e35b6.jpg' alt='Product Image'></a></td>
          </tr>";
      }
      
        echo "</table>";
        mysqli_free_result($var);
    }

    mysqli_close($con);

    ?>
    <form action="deleteproducts.php" method="post">
        <input type="text" name="t1" placeholder="Enter the id to delete" required>
        <input style="width:75px;height:44px;cursor:pointer;border-radius:15px;
            border: 3px solid #153243;background-color:#153243;color:#f2f2f2;font-size:17px;" type="submit" value="delete">
    </form>

</body>

</html>
