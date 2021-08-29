<?php require_once("../processes/connect.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Cart</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>

<?php 
if(!isLogged()){
    header("Location: login.php");
}
else{
    createDatabase();
    createCartTable();
}
if(isDelivery()){
    header("Location: delivery-fulfilment.php");
}

?>

    <h2>My Cart</h2>
    <table>
        <tr>
            <th>Item ID</th>
            <th>Item Image</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <?php 
        $totalprice = 0;
        $sql_select = "SELECT cart.cartItemID, cart.itemID, cart.quantity, cart.total_price, items.itemname, items.img_address FROM cart 
                        INNER JOIN items ON items.itemID = cart.itemID
                        INNER JOIN users ON users.userID = cart.userID
                        WHERE users.userID = " . $_SESSION["uid"];
        if($rows = getData($sql_select)){
            foreach($rows as $row){
                echo "<tr>
                    <td>" . htmlspecialchars($row["itemID"]) . "</td>
                    <td><img src='" . htmlspecialchars($row["img_address"]) . "' alt='item_img' style='object-fit: cover; height:5em; width:5em; border-radius: 50%;'></td>
                    <td>" . htmlspecialchars($row["itemname"]) . "</td>
                    <td>" . htmlspecialchars($row["quantity"]) . "</td>
                    <td>" . htmlspecialchars($row["total_price"]) . "</td>
                    <td class='remove-column'>
                        <form action='../processes/remove.php' method='POST'>
                            <input type='hidden' name='id_to_delete' value=" . $row["cartItemID"] . ">
                            <button type='submit' name='remove-cart-item' class='remove'>Remove</button>
                        </form>
                    </td>
                </tr>";
                $totalprice += $row["total_price"];
            }
        }
        else if($GLOBALS['isEmpty']){
            echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
        }
        else {
        echo getData($sql_select);
        }
        ?>
    </table>

    <div class="checkout">
        <h3>Total Cost: Ksh. <span><?php echo $totalprice; ?></span></h3>
        <form action="../processes/process-orders.php" method="POST">
            <input type="hidden" name="tot_price" value="<?php echo $totalprice; ?>">
            <button type="submit" class="action-btn" style="margin-right: 6em;">Checkout</button>
        </form>
    </div>

    
    <?php require("../partials/footer.php") ?>
</body>
</html>