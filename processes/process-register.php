<?php
    session_start();
    require_once("connect.php");

    createDatabase();
    createUsersTable();

    $f_name = $_POST["fname"];
    $l_name = $_POST["lname"];
    $email = $_POST["emailadd"];
    $pass = $_POST["pass"];
    $confpass = $_POST["conf-pass"];
    $gender = $_POST["gender"];
    $phone = $_POST["number"];
    $uname = $_POST["uname"];
    $dob = $_POST["dob"];
    

    if($pass !== $confpass){
        die("<script>alert('Passwords should match!'); document.location = '../views/register.php';</script>");
    }

    echo "<br><br>";
    $sql_insert = "INSERT INTO Users(firstname, lastname, email, pass, gender, phone, username, dob, user_type) VALUES('$f_name', '$l_name', '$email', MD5('$pass'), '$gender', '$phone', '$uname', '$dob', 'Client')";
    if(setData($sql_insert) === TRUE){
        $_SESSION['uname'] = $uname;
        $_SESSION['utype'] = 'Client';
        $_SESSION['CREATED'] = time();
        header("Location: ../views/index.php");
    }
    else{
        echo setData($sql_insert);
    }
?>