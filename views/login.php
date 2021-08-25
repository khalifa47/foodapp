<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Login</title>
</head>
<body>
  <?php require("../partials/nav.php"); ?>

      <h2>Login Form</h2>
      <div class="login-form">
        <form action="../processes/process-login.php" method="POST">
            <label for="uname">Username: <span>*</span></label>
            <input type="text" id="uname" name="uname" required>
            <br><br>

            <label for="pass">Password: <span>*</span></label>
            <input type="password" id="pass" name="pass" required>
            <br><br>

            <button type="submit" class="action-btn">Log In</button>
        </form>
      </div>

      <div class="after-login-form">
        <a href="#" class="hyper">Forgot Password?</a> <br>
        <a href="register.php" class="hyper">Don't have an account? Get one here</a>
      </div>

      <?php require("../partials/footer.php") ?>
</body>
</html>