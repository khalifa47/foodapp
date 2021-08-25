<?php 
    session_start();
    require_once("connect.php");
    $FIRSTNAME = $_POST["fname"];
    $LASTNAME = $_POST["lname"];
    $EMAIL = $_POST["emailadd"];
    $PHONE = $_POST["number"];

    $sql_update = "UPDATE Users SET firstname = '$FIRSTNAME', lastname = '$LASTNAME', email = '$EMAIL', phone = '$PHONE' WHERE Users.username = '" . $_SESSION["uname"] . "'";
    if(setData($sql_update) === TRUE){
        header("Location: ../views/edit-profile.php");
    }
    else{
        echo setData($sql_update);
    }

?>