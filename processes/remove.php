<?php
    require_once("connect.php");

    if(isset($_POST['remove-user'])){
        $sql_delete = htmlspecialchars("DELETE FROM Users WHERE userID=" . $_POST["id_to_delete"]);
        $sql_delete_cart = htmlspecialchars("DELETE FROM Cart WHERE userID = " . $_POST["id-to-delete"]);
        if(deleteData($sql_delete) === TRUE && deleteData($sql_delete_cart)){
            header("Location: ../views/admin-view-users.php");
        }
        else{
            echo deleteData($sql_delete);
        }
    }
    if(isset($_POST['remove-item'])){
        $sql_delete = htmlspecialchars("DELETE FROM Items WHERE itemID=" . $_POST["id_to_delete"]);
        $sql_delete_cart = htmlspecialchars("DELETE FROM Cart WHERE itemID = " . $_POST["id-to-delete"]);

        if(!unlink($_POST["img-address-to-delete"])){
            echo  $_POST["img-address-to-delete"] . " could not be deleted";
        }

        if(deleteData($sql_delete) === TRUE && deleteData($sql_delete_cart)){
            header("Location: ../views/view-items.php");
        }
        else{
            echo deleteData($sql_delete);
        }
    }
    if(isset($_POST['remove-cart-item'])){
        $sql_delete = htmlspecialchars("DELETE FROM Cart WHERE cartItemID=" . $_POST["id_to_delete"]);
        if(deleteData($sql_delete) === TRUE){
            header("Location: ../views/cart.php");
        }
        else{
            echo deleteData($sql_delete);
        }
    }
    if(isset($_POST['remove-order'])){
        $sql_delete = htmlspecialchars("DELETE FROM Orders WHERE orderID=" . $_POST["id_to_delete"]);
        if(deleteData($sql_delete)){
            echo "<script>alert('Order cancelled!'); document.location='../views/orders.php';</script>";
        }
        else{
            echo deleteData($sql_delete);
        }
    }

?>