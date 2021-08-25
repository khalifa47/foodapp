<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Register</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>

      <h2>Register Form</h2>
      <div class="register-form">
        <form action="../processes/process-register.php" method="POST">
            <label for="fname">First Name: <span>*</span></label>
            <input type="text" id="fname" name="fname" required>
            <br><br>
    
            <label for="lname">Last Name: <span>*</span></label>
            <input type="text" id="lname" name="lname" required>
            <br><br>
    
            <label for="emailadd">E-mail: <span>*</span></label>
            <input type="email" id="emailadd" name="emailadd" placeholder="example@gmail.com" required>
            <br><br>

            <label for="pass">Password: <span>*</span></label>
            <input type="password" id="pass" name="pass" required>
            <br><br>

            <label for="conf-pass">Confirm password: <span>*</span></label>
            <input type="password" id="conf-pass" name="conf-pass" required>
            <br><br>
    
            <div class="gen-div">
                <label for="gender">Gender: <span>*</span></label>
                <select name="gender" id="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <br>

            <label for="number">Phone Number: <span>*</span></label>
            <input type="tel" name="number" id="number" placeholder="07XXXXXXXX" required>
            <br><br>

            <label for="uname">Username: <span>*</span></label>
            <input type="text" name="uname" id="uname" required>
            <br><br>

            <div class="dob-div">
                <label for="dob">Date of birth: <span>*</span></label>
                <input type="date" id="dob" name="dob" min="1930-01-01" max="2021-01-01" value="2000-01-01">
            </div>
            <br>

            <button type="submit" class="action-btn">Sign Up</button>
        </form>
      </div>

      <?php require("../partials/footer.php") ?>
</body>
</html>