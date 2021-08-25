<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Change Password</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>

<?php 
if(!isLogged()){
    header("Location: login.php");
}
?>

    <h2>Update Password</h2>
    <div class="password-form">
        <form action="../processes/process-edit-password.php" method="POST">
            <label for="pass">Old Password: <span>*</span></label>
            <input type="password" id="pass" name="pass" required>
            <br><br>

            <label for="pass">New Password: <span>*</span></label>
            <input type="password" id="new-pass" name="new-pass" required>
            <br><br>

            <label for="conf-pass">Confirm password: <span>*</span></label>
            <input type="password" id="conf-new-pass" name="conf-new-pass" required>
            <br><br>

            <button type="submit" class="action-btn">Change password</button>
        </form>
    </div>
    
    <?php require("../partials/footer.php") ?>
</body>
</html>