<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($servername, $username, $password, $database);

$var  = $_GET['id'];  
$sql= "DELETE FROM crud WHERE id='$var'";
$result = mysqli_query($conn,$sql);

if($result)
{
header("location:index1.php");
}
else
{ 
  echo "<div>
        <strong>Error!</strong> We are facing some technical issue and your user was not deleted successfully! We regret the inconvinience caused!
        </div>";
}
?>