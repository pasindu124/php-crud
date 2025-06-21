<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$orderId = $_GET['orderId'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM orders WHERE orderId=$orderId");

//redirecting to the display page (orders_index.php in our case)
header("Location:orders_index.php");
?>
