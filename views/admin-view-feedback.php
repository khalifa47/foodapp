<?php require_once("../processes/connect.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>View Feedback</title>
</head>
<body>
    <?php require("../partials/nav.php"); ?>
    <?php require("../partials/verify.php"); ?>

    <?php 
    if(!isLogged()){
        header("Location: login.php");
    }
    else if(!isAdmin()){
        header("Location: index.php");
    }

    ?>

    <h2>Feedback List</h2>
    <table>
        <tr>
            <th>Feedback ID</th>
            <th>User ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Time</th>
        </tr>

        <?php
        $sql_select = "SELECT * FROM Feedback";
        if($rows = getData($sql_select)){
            foreach($rows as $row){
                echo "<tr>
                    <td>" . htmlspecialchars($row["feedbackID"]) . "</td>
                    <td>" . htmlspecialchars($row["userID"]) . "</td>
                    <td>" . htmlspecialchars($row["title"]) . "</td>
                    <td>" . htmlspecialchars($row["content"]) . "</td>
                    <td>" . htmlspecialchars($row["feedback_date"]) . "</td>
                    <td>" . htmlspecialchars($row["feedback_time"]) . "</td>
                </tr>";
            }
        }
        else if($GLOBALS['isEmpty']){
            echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
        }
        else{
        echo getData($sql_select);
        }
        
        ?>
    </table>

    <?php require("../partials/footer.php") ?>
    
</body>
</html>