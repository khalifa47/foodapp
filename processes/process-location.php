<?php
    session_start();
    require_once("connect.php");

    createDatabase();
    createAddressTable();

    $ADDLINE1 = $_POST["address-line-1"];
    $ADDLINE2 = $_POST["address-line-2"];
    $ADDINFO = $_POST["additional-info"];

    $sql_select = "SELECT addressLine1, addressLine2, additionalInfo FROM Addresses WHERE userID = " . $_SESSION['uid'];
    
    if(getData($sql_select)){
        $sql_update = "UPDATE Addresses SET addressLine1 = '$ADDLINE1', addressLine2 = '$ADDLINE2', additionalInfo = '$ADDINFO' WHERE userID = " . $_SESSION['uid'];
        if(setData($sql_update) === TRUE){
            header("Location: ../views/location.php");
        }
        else{
            echo setData($sql_update);
        }
    }
    else if($GLOBALS['isEmpty']){
        $sql_insert = "INSERT INTO Addresses(userID, addressLine1, addressLine2, additionalInfo) VALUES(" . $_SESSION['uid'] . ", '$ADDLINE1', '$ADDLINE2', '$ADDINFO')";
        if(setData($sql_insert) === TRUE){
            header("Location: ../views/location.php");
        }
        else{
            echo setData($sql_insert);
        }
    }
    else{
        echo getData($sql_select);
    }
?>