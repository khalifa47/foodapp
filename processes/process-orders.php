<?php
require_once("connect.php");
require_once("time.php");

createDatabase();
createOrdersTable();

$sql_select = "SELECT cart.userID, cart.itemID, cart.quantity, cart.total_price, addresses.addressID FROM cart 
                INNER JOIN items ON items.itemID = cart.itemID
                INNER JOIN users ON users.userID = cart.userID
                INNER JOIN addresses ON addresses.userID = cart.userID";
if($rows = getData($sql_select)){
    foreach($rows as $row){
        $sql_insert = "INSERT INTO Orders(userID, addressID, itemID, quantity, total_price, order_date, order_time, delivery_status)
        VALUES(" . $row["userID"] . ", " . $row["addressID"] . ", " . $row["itemID"] . ", " . $row["quantity"] . ", " . $row["total_price"] . ", '" . findDate() . "', '" . findTime() . "', 'Confirmed')";
        if(!setData($sql_insert)){
            echo setData($sql_insert);
        }
    }
}
else if($GLOBALS['isEmpty']){
    echo "<script>alert('Please add items to the cart first!'); document.location = '../views/view-items.php';</script>";
}
else{
    echo getData($sql_select);
}
?>