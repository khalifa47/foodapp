<?php require_once("../processes/connect.php"); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Edit User Profile</title>
</head>
<body>
<?php 
  require("../partials/nav.php"); 
  require("../partials/verify.php");

    if(!isLogged()){
        header("Location: login.php");
    }
    else if(!isAdmin()){
        header("Location: index.php");
    }

  $sql_default_select = "SELECT firstname, lastname, email, gender, phone, username, dob, user_type FROM Users WHERE userID = " . $_POST['id-to-update'];
  $defaults = getData($sql_default_select);

?>

      <h2>Edit User Profile (Admin)</h2>
      <div class="profile-form">
        <form action="../processes/update.php" method="POST">
            <input type="hidden" name="id-to-update" value="<?php echo $_POST['id-to-update']; ?>">

            <label for="fname">First Name: <span>*</span></label>
            <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($defaults[0]['firstname'])?>" required>
            <br><br>
    
            <label for="lname">Last Name: <span>*</span></label>
            <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($defaults[0]['lastname'])?>" required>
            <br><br>
    
            <label for="emailadd">E-mail: <span>*</span></label>
            <input type="email" id="emailadd" name="emailadd" value="<?php echo htmlspecialchars($defaults[0]['email'])?>" required>
            <br><br>

            <div class="gen-div">
                <label for="gender">Gender: <span>*</span></label>
                <select name="gender" id="gender" value="<?php echo htmlspecialchars($defaults[0]['gender'])?>" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <br>

            <label for="number">Phone Number: <span>*</span></label>
            <input type="tel" name="number" id="number" value="<?php echo htmlspecialchars($defaults[0]['phone'])?>" required>
            <br><br>

            <label for="uname">Username: <span>*</span></label>
            <input type="text" name="uname" id="uname" value="<?php echo htmlspecialchars($defaults[0]['username'])?>" required>
            <br><br>

            <div class="dob-div">
                <label for="dob">Date of birth: <span>*</span></label>
                <input type="date" id="dob" name="dob" min="1930-01-01" max="2021-01-01" value="<?php echo htmlspecialchars($defaults[0]['dob'])?>">
            </div>
            <br>

            <div class="gen-div">
                <label for="u-type">User type: <span>*</span></label>
                <select name="u-type" id="u-type" value="<?php echo htmlspecialchars($defaults[0]['user_type'])?>" required>
                    <option value="Client">Client</option>
                    <option value="Admin">Admin</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>
            <br>
            <button type="submit" name='edit-user' class="action-btn">Update</button>
        </form>
      </div>

      <?php require("../partials/footer.php") ?>
    
</body>
</html>