<?php
    session_start();
    require_once("connect.php");

    $sql_select_login = "SELECT userID, username, pass, user_type FROM Users";
    if($result_login = getData($sql_select_login)){
      foreach($result_login as $row_login){
        if($_POST['uname'] === $row_login['username'] && md5($_POST['pass']) === $row_login['pass']){
          $_SESSION['uid'] = $row_login['userID'];
          $_SESSION['uname'] = $_POST['uname'];
          $_SESSION['utype'] = $row_login['user_type'];
          $_SESSION['CREATED'] = time();
          header("Location: ../views/index.php");
        }
        else{
          //echo $_POST['uname'] . " " . $row_login['username'] . " " . md5($_POST['pass']) . " " . $row_login['pass'];
          echo("<script>alert('Invalid credentials!'); document.location = '../views/login.php';</script>");
        }
      }
    }
    else{
      echo getData($sql_select_login);
    }

    
?>