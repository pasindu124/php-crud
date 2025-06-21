<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
        $orderId = mysqli_real_escape_string($mysqli, $_POST['orderId']);
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
        } else {
                //updating the table
                $result = mysqli_query($mysqli, "UPDATE orders SET orderName='$orderName',orderDate='$orderDate',TotalAmount='$TotalAmount' WHERE orderId=$orderId");

                //redirecting to the display page. In our case, it is orders_index.php
                header("Location: orders_index.php");
        }
}
?>
<?php
//getting orderId from url
$orderId = $_GET['orderId'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE orderId=$orderId");

while($res = mysqli_fetch_array($result))
{
        $orderName = $res['orderName'];
        $orderDate = $res['orderDate'];
        $TotalAmount = $res['TotalAmount'];
}
?>
<html>
<head>
        <title>Edit Order</title>
</head>
<body>
        <a href="orders_index.php">Home</a>
        <br/><br/>

        <form name="form1" method="post" action="orders_edit.php">
                <table border="0">
                        <tr>
                                <td>Order Name</td>
                                <td><input type="text" name="orderName" value="<?php echo $orderName;?>"></td>
                        </tr>
                        <tr>
                                <td>Order Date</td>
                                <td><input type="date" name="orderDate" value="<?php echo $orderDate;?>"></td>
                        </tr>
                        <tr>
                                <td>Total Amount</td>
                                <td><input type="text" name="TotalAmount" value="<?php echo $TotalAmount;?>"></td>
                        </tr>
                        <tr>
                                <td><input type="hidden" name="orderId" value=<?php echo $_GET['orderId'];?>></td>
                                <td><input type="submit" name="update" value="Update"></td>
                        </tr>
                </table>
        </form>
</body>
</html>
