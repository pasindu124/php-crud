<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM orders ORDER BY orderId DESC");
?>
<html>
<head>
        <title>Order List</title>
</head>
<body>
<a href="orders_add.html">Add New Order</a><br/><br/>
        <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
                <td>Order Name</td>
                <td>Order Date</td>
                <td>Total Amount</td>
                <td>Update</td>
        </tr>
        <?php
        while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$res['orderName']."</td>";
                echo "<td>".$res['orderDate']."</td>";
                echo "<td>".$res['TotalAmount']."</td>";
                echo "<td><a href=\"orders_edit.php?orderId=$res[orderId]\">Edit</a> | <a href=\"orders_delete.php?orderId=$res[orderId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
        </table>
</body>
</html>
