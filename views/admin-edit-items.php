<?php require_once("../processes/connect.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Edit Items</title>
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
    $sql_default_select = "SELECT itemname, price, img_address FROM Items WHERE itemID = " . $_POST['id-to-update'];
    $defaults = getData($sql_default_select);
    ?>

    <h2>Edit Items</h2>
    <div class="add-items-form">
        <form action="../processes/update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id-to-update" value="<?php echo $_POST['id-to-update']; ?>">
            <input type="hidden" name="img-address-to-delete" value="<?php echo htmlspecialchars($defaults[0]['img_address'])?>">

            <label for="item">Item Name: <span>*</span></label>
            <input type="text" id="item" name="item" value="<?php echo htmlspecialchars($defaults[0]['itemname'])?>" required>
            <br><br>

            <label for="price">Price: <span>*</span></label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($defaults[0]['price'])?>" required>
            <br><br>

            <label style="padding-right: 0;" for="food-img">Image: <span>*</span></label>
            <img src="<?php echo htmlspecialchars($defaults[0]['img_address'])?>" alt="item_img" style="position:relative; left: 2em; top: 0.8em; object-fit: cover; height:3em; width:3em;">
            <input type="file" id="food-img" name="food-img" accept="image/*" required>
            <br><br>

            <button type="submit" name='edit-item' class="action-btn">Edit Item</button>
        </form>
    </div>

    <?php require("../partials/footer.php") ?>
    
</body>
</html>