<?php require_once("../processes/connect.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Location</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>

<?php 
if(!isLogged()){
    header("Location: login.php");
}
createDatabase();
createAddressTable();
$sql_default_select = "SELECT addressLine1, addressLine2, additionalInfo FROM Addresses WHERE userID = " . $_SESSION['uid'];
$defaults = getData($sql_default_select);
?>

    <h2>Update delivery address</h2>
    <div class="location-form">
        <form action="../processes/process-location.php" method="POST">
            <label for="address-line-1">Address line 1: <span>*</span></label>
            <input type="text" id="address-line-1" name="address-line-1" value="<?php if($GLOBALS['isEmpty']){
                echo "";
            } else {
                echo htmlspecialchars($defaults[0]["addressLine1"]);
            }
                ?>" required>
            <br><br>

            <label for="address-line-2">Address line 2: <span>*</span></label>
            <input type="text" id="address-line-2" name="address-line-2" value="<?php if($GLOBALS['isEmpty']){
                echo "";
            } else {
                echo htmlspecialchars($defaults[0]["addressLine2"]);
            }
                ?>" required>
            <br><br>

            <label for="additional-info" id="text-label-location">Additional info: </label>
            <textarea name="additional-info" id="additional-info" value="<?php if($GLOBALS['isEmpty']){
                echo "";
            } else {
                echo htmlspecialchars($defaults[0]["additionalInfo"]);
            }
                ?>" cols="25" rows="5"></textarea>
            <br><br>

            <button type="submit" class="action-btn">Update</button>
        </form>
    </div>

    <?php require("../partials/footer.php") ?>
    
</body>
</html>