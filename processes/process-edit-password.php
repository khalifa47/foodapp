<?php 
    session_start();
    require_once("connect.php");
    $NEWPASS = $_POST["new-pass"];
    $CONFPASS = $_POST["conf-new-pass"];

    $sql_select_pass = "SELECT pass FROM Users WHERE username = '" . $_SESSION["uname"] . "'";
    if($result_pass = getData($sql_select_pass)){
        if(md5($_POST["pass"]) !== $result_pass[0]["pass"]){
            die("<script>alert('Invalid password!'); document.location = '../views/edit-password.php';</script>");
        }
        else if($_POST["new-pass"] !== $_POST["conf-new-pass"]){
            die("<script>alert('Passwords do not match!'); document.location = '../views/edit-password.php';</script>");
        }
    
        $sql_pass_update = "UPDATE Users SET pass = MD5('$NEWPASS') WHERE Users.username = '" . $_SESSION["uname"] . "'";
        if(setData($sql_pass_update) === TRUE){
            header("Location: ../views/index.php");
        }
        else{
            echo setData($sql_pass_update);
        }
    }
    else{
        echo getData($sql_select_pass);
    }

    

?>