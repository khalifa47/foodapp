<?php
require_once("connect.php");

createDatabase();
createOrdersTable();

$sql_select = "SELECT cart.userID, cart.itemID, cart.quantity, cart.total_price, addresses.addressID FROM cart 
                INNER JOIN items ON items.itemID = cart.itemID
                INNER JOIN users ON users.userID = cart.userID
                INNER JOIN addresses ON addresses.userID = cart.userID";

$sql_insert = "INSERT INTO Orders(userID, addressID, itemID, quantity, total_price, order_date, order_time, delivery_status)";
?>