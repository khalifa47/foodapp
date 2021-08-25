<?php
session_start();
require_once("connect.php");

if(!isset($_SESSION["uid"])){
    header("Location: ../views/login.php");
}
else{
    createDatabase();
    createCartTable();

    $TOTALPRICE = $_POST["price-to-total"] * $_POST["quantity"];

    $sql_insert = "INSERT INTO Cart(userID, itemID, quantity, total_price) VALUES(" . $_SESSION["uid"] . ", " . $_POST["id-to-add"] . ", " . $_POST["quantity"] . ", '$TOTALPRICE')";
    if(setData($sql_insert)){
        echo "<script>alert('Added to cart!'); document.location='../views/view-items.php';</script>";
    }
    else{
        echo setData($sql_insert);
    }
}
?>