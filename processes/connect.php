<?php
    $isEmpty = FALSE;

    function connect(){
        $dbserver = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "foodapp";

    
        $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
        if($conn->connect_error){
            die("Not connected: ".$conn->connect_error);
        }
        return $conn;
    }

    function createDatabase(){
        $conn = connect();
        $sql = "CREATE DATABASE IF NOT EXISTS foodapp";

        if($conn->query($sql) !== TRUE){
            echo "Database creation failed ".$conn->error;
        }
    }

    function createUsersTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Users(
            userID INT(6) AUTO_INCREMENT PRIMARY KEY,
            firstname varchar(200) NOT NULL,
            lastname varchar(200) NOT NULL,
            email varchar(200) NOT NULL,
            pass varchar(200) NOT NULL,
            gender varchar(20) NOT NULL,
            phone INT(70) NOT NULL,
            username varchar(200) UNIQUE NOT NULL,
            dob date NOT NULL,
            user_type varchar(20) NOT NULL
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function createItemsTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Items(
            itemID INT(6) AUTO_INCREMENT PRIMARY KEY,
            itemname varchar(200) NOT NULL,
            price INT(20) NOT NULL,
            img_address varchar(200) NOT NULL
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function createFeedbackTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Feedback(
            feedbackID INT(6) AUTO_INCREMENT PRIMARY KEY,
            userID INT(20) NOT NULL,
            title varchar(100) NOT NULL,
            content varchar(500) NOT NULL,
            feedback_date date NOT NULL,
            feedback_time time NOT NULL,

            FOREIGN KEY(userID) REFERENCES Users(userID)
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function createAddressTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Addresses(
            addressID INT(6) AUTO_INCREMENT PRIMARY KEY,
            userID INT(20) NOT NULL,
            addressLine1 varchar(200) NOT NULL,
            addressLine2 varchar(200) NOT NULL,
            additionalInfo varchar(300) DEFAULT NULL,

            FOREIGN KEY(userID) REFERENCES Users(userID)
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function createOrdersTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Orders(
            orderID INT(6) AUTO_INCREMENT PRIMARY KEY,
            userID INT(6) NOT NULL,
            addressID INT(6) NOT NULL,
            itemID INT(6) NOT NULL,
            quantity INT(6) NOT NULL,
            total_price INT(10) NOT NULL,
            order_date date NOT NULL,
            order_time time NOT NULL,
            delivery_status varchar(20) NOT NULL,

            FOREIGN KEY(userID) REFERENCES Users(userID),
            FOREIGN KEY(addressID) REFERENCES Addresses(addressID),
            FOREIGN KEY(itemID) REFERENCES Items(itemID)
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function createCartTable(){
        $conn = connect();
        $sql_table = "CREATE TABLE IF NOT EXISTS Cart(
            cartItemID INT(20) AUTO_INCREMENT PRIMARY KEY,
            userID INT(6) NOT NULL,
            itemID INT(6) NOT NULL,
            quantity INT(6) NOT NULL,
            total_price INT(10) NOT NULL,

            FOREIGN KEY(userID) REFERENCES Users(userID),
            FOREIGN KEY(itemID) REFERENCES Items(itemID)
        )";
        if($conn->query($sql_table) !== TRUE){
            echo "<br>Table creation failed: ".$conn->error;
        }
    }

    function getData($sql){
        $conn = connect();
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }
            else{
                $GLOBALS['isEmpty'] = TRUE;
                return FALSE;
            }
        }
        else{
            return "Error: " . $conn->error;
        }
    }
    
    function setData($sql){
        $conn = connect();
    
        if($conn->query($sql)){
            return TRUE;
        }
        else{
            return "Error: " . $conn->error;
        }
    }

    function deleteData($sql){
        $conn = connect();

        if($conn->query($sql)){
            return TRUE;
        }
        else{
            return "Error: " . $conn->error;
        }
    }
?>