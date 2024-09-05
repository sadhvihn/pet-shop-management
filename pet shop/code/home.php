<!doctype html>
<html>
    <head>
        <title>
            PetPerfect Hub
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;

    background-size: cover;
  font-family: Arial, Helvetica, sans-serif;
  /*background-color:rgba(43, 3, 3, 0.945);*/
  
}
.topnav {
  overflow: hidden;
  background-color:#7f5539;
  height: 70px;
  border: 2px solid #7f5539;
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
.button {
    background-color: #153243; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 180px 8px;
    -webkit-transition-duration: 0.2s; /* Safari 0.4*/
    transition-duration: 0.2s;/*0.4*/
    cursor: pointer;
}
.screen
{
    background-image:url('aaron.jpg');
    background-size: cover;
    width:100%;
    height:600px;
}

.button1 {
    background-color: transparent;
    color:white; /* black*/
    border: 3px solid #b4b8ab;
    border-radius: 5px;
}

.button1:hover {
    background-color: #b4b8ab;
    color: #153243;
}

.button2 {
    background-color:  transparent;
    color: white; 
    border-radius: 5px;
    border:3px solid #eef0eb;
}

.button2:hover {
    background-color:#eef0eb;
    color: #153243;
}

.button3 {
    background-color:transparent; 
    color: white; 
    border-radius: 5px;
    border: 3px solid #f4f9e9;
}

.button3:hover {
    background-color: #f4f9e9;
    color: #153243;
}

.button4 {
    background-color: transparent;
    color: white;
    border-radius: 5px;
    border: 3px solid #eef0eb ;
}

.button4:hover {background-color:#eef0eb;
 color:#153243;
}

.button5 {
    background-color:  transparent;
    color: white;
    border-radius: 5px;
    border: 3px solid #b4b8ab;
}

.button5:hover {
    background-color:#b4b8ab;
    color: #153243;
}

</style>
    </head>
    <body>

        <div class="topnav">
            <a class="active" href="home.php"><img src="ic_add_pet.png"></a>
            <a href="home.php">PetPerfect Hub</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
      

       
     <div class="screen">      
     <form>
          
            <button class="button button1"  type="submit" formaction="animals.php">Animals</button>
            <button class="button button2"  type="submit" formaction="birds.php">Birds</button>
            <button class="button button3"  type="submit" formaction="petproducts.php">Products</button>
            <button class="button button4"  type="submit" formaction="sales.php">Salesdetails</button>
            <button class="button button5"  type="submit" formaction="customer.php">Customer</button>  
        
     </form> 
    </div>

    </body>
   
</html>