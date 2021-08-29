<?php require_once("../processes/connect.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Delivery</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>
<?php require("../processes/time.php"); ?>


<?php 
if(!isLogged()){
    header("Location: login.php");
}
if(!isDelivery()){
    header("Location: delivery-fulfilment.php");
}
?>

    <h2>Deliveries for today</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Delivery address</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>

            <?php 
            $sql_select = "SELECT orders.orderID, orders.quantity, orders.total_price, orders.delivery_status, addresses.addressLine1, addresses.addressLine2, addresses.additionalInfo, items.itemname, users.firstname, users.lastname FROM orders 
                            INNER JOIN items ON items.itemID = orders.itemID
                            INNER JOIN users ON users.userID = orders.userID
                            INNER JOIN addresses ON addresses.userID = orders.userID
                            WHERE orders.order_date = '" . findDate() . "'";

            if($rows = getData($sql_select)){
                $totals = 0;
                foreach($rows as $row){
                    $totals += $row["total_price"];
                    echo "<tr>
                    <td>" . htmlspecialchars($row["orderID"]) . "</td>
                    <td>" . htmlspecialchars($row["firstname"]) . " " . htmlspecialchars($row["lastname"]) . "</td>
                    <td><p>" . htmlspecialchars($row["addressLine1"]) . "</p><p>" . htmlspecialchars($row["addressLine2"]) . "</p><p>" . htmlspecialchars($row["additionalInfo"]) . "</p></td>
                    <td>" . htmlspecialchars($row["itemname"]) . "</td>
                    <td>" . htmlspecialchars($row["quantity"]) . "</td>
                    <td>" . $totals . "</td>

                    <td class='update-status'>
                        <form action='../processes/update.php' method='POST'>
                            <input type='hidden' name='id-to-update' value='" . $row["orderID"] . "'>
                            <select name='status' id='status' required>
                                <option value='" . htmlspecialchars($row["delivery_status"]) . "' selected>" . htmlspecialchars($row["delivery_status"]) . "</option>
                                <option value='Confirmed'>Confirmed</option>
                                <option value='In transit'>In transit</option>
                                <option value='Delivered'>Delivered</option>
                                <option value='Failed'>Failed</option>
                            </select>
                            <button type='submit' class='update' name='deliveries-btn'>Update</button>
                        </form>
                    </td>

                </tr>";
                }
            }
            else if($GLOBALS['isEmpty']){
                echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>No deliveries for today!</h2>";
            }
            else{
                echo getData($sql_select);
            }
            ?>
        </table>

    <?php require("../partials/footer.php") ?>
    
</body>
</html>