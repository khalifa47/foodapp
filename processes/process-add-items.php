<?php
require_once("connect.php");

createDatabase();
createItemsTable();

$file_path = "../assets/items/";

$file_name = $_FILES['food-img']['name'];
$file_temp_location = $_FILES['food-img']['tmp_name'];

if(move_uploaded_file($file_temp_location, $file_path.$file_name)){
    $sql_upload = "INSERT INTO Items(itemname, price, img_address) VALUES('" . $_POST["item"] . "', " . $_POST["price"] . ", '$file_path$file_name')";
    if(setData($sql_upload)){
        header("Location: ../views/view-items.php");
    }
    else{
        echo setData($sql_upload);
    }
}

?>