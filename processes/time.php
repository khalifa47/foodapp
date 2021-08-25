<?php
function findDate(){
    $DATE = getdate()["year"] . "-";
    if(getdate()["mon"] < 10){
        $DATE.="0";
    }
    $DATE .= getdate()["mon"] . "-";
    if(getdate()["mday"] < 10){
        $DATE.="0";
    }
    $DATE.=getdate()["mday"];
    return $DATE;
}

function findTime(){
    $TIME = "";
    if(getdate()["hours"] < 10){
        $TIME .= "0";
    }
    $TIME .= getdate()["hours"] . ":";
    if(getdate()["minutes"] < 10){
        $TIME .= "0";
    }
    $TIME .= getdate()["minutes"] . ":";
    if(getdate()["seconds"] < 10){
        $TIME .= "0";
    }
    $TIME .= getdate()["seconds"];

    return $TIME;
}
?>