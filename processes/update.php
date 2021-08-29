<?php 
    require_once("connect.php");

    if(isset($_POST["edit-user"])){
        $FIRSTNAME = $_POST["fname"];
        $LASTNAME = $_POST["lname"];
        $EMAIL = $_POST["emailadd"];
        $GENDER = $_POST["gender"];
        $PHONE = $_POST["number"];
        $USERNAME = $_POST["uname"];
        $DOB = $_POST["dob"];
        $UTYPE = $_POST["u-type"];

        $sql_update = "UPDATE Users SET firstname = '$FIRSTNAME', lastname = '$LASTNAME', email = '$EMAIL', gender = '$GENDER', phone = '$PHONE', username = '$USERNAME', dob = '$DOB', user_type = '$UTYPE' WHERE userID = " . $_POST['id-to-update'];

        if(setData($sql_update) === TRUE){
            header("Location: ../views/admin-view-users.php");
        }
        else{
            echo setData($sql_update);
        }
    }
    if(isset($_POST["edit-item"])){
        $ITEM = $_POST["item"];
        $PRICE = $_POST["price"];
        $IMAGE = $_POST["img-address-to-delete"];

        if(!unlink($IMAGE)){
            echo "$IMAGE could not be deleted";
        }
        
        $file_path = "../assets/items/";
        $file_name = $_FILES['food-img']['name'];
        $file_temp_location = $_FILES['food-img']['tmp_name'];

        if(move_uploaded_file($file_temp_location, $file_path.$file_name)){
            $sql_update = "UPDATE Items SET itemname = '$ITEM', price = '$PRICE', img_address = '$file_path$file_name' WHERE itemID = " . $_POST['id-to-update'];
            if(setData($sql_update)){
                header("Location: ../views/view-items.php");
            }
            else{
                echo setData($sql_upload);
            }
        }
    }

if(isset($_POST["deliveries-btn"])){
    $STATUS = $_POST["status"];
    $sql_update = "UPDATE orders SET delivery_status = '$STATUS' WHERE orderID = " . $_POST["id-to-update"];

    if(setData($sql_update) === TRUE){
        header("Location: ../views/delivery-fulfilment.php");
    }
    else{
        echo setData($sql_update);
    }
}
?>