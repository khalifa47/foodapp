<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Add Items</title>
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

    <h2>Add Items</h2>
    <div class="add-items-form">
        <form action="../processes/process-add-items.php" method="POST" enctype="multipart/form-data">
            <label for="item">Item Name: <span>*</span></label>
            <input type="text" id="item" name="item" required>
            <br><br>

            <label for="price">Price: <span>*</span></label>
            <input type="number" id="price" name="price" required>
            <br><br>

            <label for="food-img">Image: </label>
            <input type="file" id="food-img" name="food-img" accept="image/*" required>
            <br><br>

            <button type="submit" name="postitem" class="action-btn">Post Item</button>
        </form>
    </div>

    <?php require("../partials/footer.php") ?>
    
</body>
</html>