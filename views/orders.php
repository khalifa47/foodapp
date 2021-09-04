<?php require_once("../processes/connect.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>My orders</title>
</head>

<body>
    <?php require("../partials/nav.php"); ?>
    <?php require("../partials/verify.php"); ?>

    <?php
    if (!isLogged()) {
        header("Location: login.php");
    }
    if (isDelivery()) {
        header("Location: delivery-fulfilment.php");
    }
    ?>
    <h2><?php if (!isAdmin()) {
            echo "My ";
        } ?>Orders</h2>
    <table>
        <tr>
            <th>OrderID</th>
            <th>Item</th>
            <?php if (isAdmin()) {
                echo "<th>User</th>";
            }
            ?>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date Ordered</th>
            <th>Time Ordered</th>
            <th>Address</th>
            <th>Delivery Status</th>
        </tr>
        <?php
        $totalprice = 0;
        $sql_select = "SELECT orders.orderID, orders.userID, orders.quantity, orders.total_price, orders.order_date, orders.order_time, orders.delivery_status, addresses.addressLine1, addresses.addressLine2, addresses.additionalInfo, items.itemname, items.img_address, users.firstname, users.lastname FROM orders 
                        INNER JOIN items ON items.itemID = orders.itemID
                        INNER JOIN users ON users.userID = orders.userID
                        INNER JOIN addresses ON addresses.userID = orders.userID";
        if (!isAdmin()) {
            $id_clause = " WHERE users.userID = " . $_SESSION["uid"];
            $sql_select .= $id_clause;
        }
        if ($rows = getData($sql_select)) {
            foreach ($rows as $row) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["orderID"]) . "</td>
                    <td style='display:flex; justify-content: space-between;'><img src='" . htmlspecialchars($row["img_address"]) . "' alt='item_img' style='object-fit: cover; height:5em; width:5em; border-radius: 50%;'><span style='align-self: center; font-size: 1.2em;'>" . htmlspecialchars($row["itemname"]) . "</span></td>";
                if (isAdmin()) {
                    echo "<td><a class='disp_user' href='admin-view-users.php' title='" . htmlspecialchars($row["firstname"]) . " " . htmlspecialchars($row["lastname"]) . "'>" . htmlspecialchars($row["userID"]) . "</a></td>";
                }
                echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>
                    <td>" . htmlspecialchars($row["total_price"]) . "</td>
                    <td>" . htmlspecialchars($row["order_date"]) . "</td>
                    <td>" . htmlspecialchars($row["order_time"]) . "</td>
                    <td><p>" . htmlspecialchars($row["addressLine1"]) . "</p><p>" . htmlspecialchars($row["addressLine2"]) . "</p><p>" . htmlspecialchars($row["additionalInfo"]) . "</p></td>";

                if (isAdmin()) {
                    echo "<td class='update-status'>
                        <form action='../processes/update.php' method='POST'>
                            <input type='hidden' name='id-to-update' value='" . $row["orderID"] . "'>
                            <select name='status' id='status' ";
                            if($row["delivery_status"] === "Delivered" || $row["delivery_status"] === "Failed"){
                                echo "readonly ";
                            }
                            echo "required>
                                <option value='" . htmlspecialchars($row["delivery_status"]) . "' selected>" . htmlspecialchars($row["delivery_status"]) . "</option>
                                <option value='Confirmed'>Confirmed</option>
                                <option value='In transit'>In transit</option>
                                <option value='Delivered'>Delivered</option>
                                <option value='Failed'>Failed</option>
                            </select>
                            <button type='submit' class='update' name='status-update-btn'>Update</button>
                        </form>
                    </td>";
                } else {
                    echo "<td>" . htmlspecialchars($row["delivery_status"]) . "</td>";
                }

                if ($row["delivery_status"] === "Confirmed") {
                    echo "<td class='remove-column'>
                        <form action='../processes/remove.php' method='POST'>
                            <input type='hidden' name='id_to_delete' value=" . $row["orderID"] . ">
                            <button type='submit' name='remove-order' class='remove'>Cancel</button>
                        </form>
                    </td>";
                }

                echo "</tr>";
                $totalprice += $row["total_price"];
            } ?>
            <div class="checkout">
                <h3>Total: Ksh. <span><?php echo $totalprice; ?></span></h3>
            </div>
        <?php
        } else if ($GLOBALS['isEmpty']) {
            echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
        } else {
            echo getData($sql_select);
        }
        ?>
    </table>

    <?php require("../partials/footer.php"); ?>
</body>

</html>