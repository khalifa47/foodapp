<?php require_once("../processes/connect.php"); ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
  <script src="../script/sorting.js"></script>
  <title>View Users</title>
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

  <h2>Users List</h2>
  <table id="users-table">
    <tr>
      <th>User ID</th>
      <th class="sortable" onclick="sortTable('users-table', 1)">Name</th>
      <th class="sortable" onclick="sortTable('users-table', 2)">E-mail address</th>
      <th class="sortable" onclick="sortTable('users-table', 3)">Gender</th>
      <th>Phone Number</th>
      <th class="sortable" onclick="sortTable('users-table', 5)">Username</th>
      <th>Date of Birth</th>
      <th class="sortable" onclick="sortTable('users-table', 7)">User type</th>
    </tr>

    <?php
    $sql_select = "SELECT userID, firstname, lastname, email, gender, phone, username, dob, user_type FROM Users";
    if($rows = getData($sql_select)){
      foreach($rows as $row){
        echo "<tr>
                      <td>" . htmlspecialchars($row["userID"]) . "</td>
                      <td>" . htmlspecialchars($row["firstname"]) . " " . htmlspecialchars($row["lastname"]) . "</td>
                      <td><a href='mailto:" . htmlspecialchars($row["email"]) . "'>" . htmlspecialchars($row["email"]) . "</td>
                      <td>" . htmlspecialchars($row["gender"]) . "</td>
                      <td>" . htmlspecialchars($row["phone"]) . "</td>
                      <td>" . htmlspecialchars($row["username"]) . "</td>
                      <td>" . htmlspecialchars($row["dob"]) . "</td>
                      <td>" . htmlspecialchars($row["user_type"]) . "</td>";
  
          if ($row["user_type"] != "Admin" && $row["user_type"] != "SuperAdmin") {
            echo "<td class='remove-column'>
                        <form action='../processes/remove.php' method='POST'>
                          <input type='hidden' name='id_to_delete' value=" . $row['userID'] . ">
                          <button type='submit' name='remove-user' class='remove'>Remove</button>
                        </form>
                  </td>
                  <td class='update-column'>
                    <form action='admin-edit-users.php' method='POST'>
                      <input type='hidden' name='id-to-update' value=" . $row['userID'] . ">
                      <button type='submit' class='update'>Edit</button>
                    </form>
                  </td>";
          }
  
          echo "</tr>";
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

  <?php require("../partials/footer.php"); ?>

</body>

</html>