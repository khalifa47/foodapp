<?php
function isLogged(){
    if(isset($_SESSION['uname'])){
        return TRUE;   
    }
    else{
        return FALSE;
    }
}
function isAdmin(){
    if($_SESSION['utype'] === "Admin" || $_SESSION['utype'] === "SuperAdmin"){
        return TRUE;
    }
    else{
        return FALSE;
    }
}
function isDelivery(){
    if($_SESSION['utype'] === "Delivery"){
        return TRUE;
    }
    else{
        return FALSE;
    }
}
?>