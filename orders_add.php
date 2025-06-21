<html>
<head>
        <title>Add Order</title>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
        $orderName = mysqli_real_escape_string($mysqli, $_POST['orderName']);
        $orderDate = mysqli_real_escape_string($mysqli, $_POST['orderDate']);
        $TotalAmount = mysqli_real_escape_string($mysqli, $_POST['TotalAmount']);

        // checking empty fields
        if(empty($orderName) || empty($orderDate) || empty($TotalAmount)) {

                if(empty($orderName)) {
                        echo "<font color='red'>Order Name field is empty.</font><br/>";
                }

                if(empty($orderDate)) {
                        echo "<font color='red'>Order Date field is empty.</font><br/>";
                }

                if(empty($TotalAmount)) {
                        echo "<font color='red'>Total Amount field is empty.</font><br/>";
                }

                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
                // if all the fields are filled (not empty)

                //insert data to database
                $result = mysqli_query($mysqli, "INSERT INTO orders(orderName,orderDate,TotalAmount) VALUES('$orderName','$orderDate','$TotalAmount')");

                //display success message
                echo "<font color='green'>Order added successfully.";
                echo "<br/><a href='orders_index.php'>View Result</a>";
        }
}
?>
</body>
</html>
