<?php require_once("../processes/connect.php"); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Edit Profile</title>
</head>
<body>
<?php 
  require("../partials/nav.php"); 
  require("../partials/verify.php");
 
  if(!isLogged()){
      header("Location: login.php");
  }
  $sql_default_select = "SELECT firstname, lastname, email, gender, phone, username, dob FROM Users WHERE Users.username = '" . $_SESSION['uname'] . "'";
  $defaults = getData($sql_default_select);
?>

      <h2>Edit Profile</h2>
      <div class="profile-form">
        <form action="../processes/process-edit-profile.php" method="POST">
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
                <select name="gender" id="gender" readonly>
                  <option value="<?php echo htmlspecialchars($defaults[0]['gender']);?>"><?php echo htmlspecialchars($defaults[0]['gender']);?></option>
                </select>
            </div>
            <br>

            <label for="number">Phone Number: <span>*</span></label>
            <input type="tel" name="number" id="number" value="<?php echo htmlspecialchars($defaults[0]['phone'])?>" required>
            <br><br>

            <label for="uname">Username: <span>*</span></label>
            <input type="text" name="uname" id="uname" value="<?php echo htmlspecialchars($defaults[0]['username'])?>" readonly>
            <br><br>

            <div class="dob-div">
                <label for="dob">Date of birth: <span>*</span></label>
                <input type="date" id="dob" name="dob" min="1930-01-01" max="2021-01-01" value="<?php echo htmlspecialchars($defaults[0]['dob'])?>" readonly>
            </div>
            <br>

            <button type="submit" class="action-btn">Update</button>
        </form>
      </div>

      <?php require("../partials/footer.php") ?>
    
</body>
</html>