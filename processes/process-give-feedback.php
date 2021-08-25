<?php
session_start();
require_once("connect.php");
require_once("time.php");

createDatabase();
createFeedbackTable();

$TITLE = $_POST["title"];
$CONTENT = $_POST["cont"];
$DATE = findDate();
$TIME = findTime();

$sql_insert = "INSERT INTO Feedback(userID, title, content, feedback_date, feedback_time) VALUES(" . $_SESSION['uid'] . ", '$TITLE', '$CONTENT', '$DATE', '$TIME')";
if(setData($sql_insert) === TRUE){
    echo "<script>alert('Thanks for your feedback!'); document.location = '../views/index.php';</script>";
}
else{
    setData($sql_insert);
}
?>