<?php require_once("../processes/connect.php");?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles.css" />
  <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
  <title>Items View</title>
</head>

<body>
  <?php require("../partials/nav.php"); ?>

  <h2>Items List</h2>
  <div class="items-container">
    <?php
    $sql_select = "SELECT * FROM items";
    if ($items = getData($sql_select)) {
      foreach ($items as $item) {
    ?>
        <div class="item">
          <a href="#" class="poster"><img src="<?php echo $item["img_address"] ?>" alt="<?php echo $item["itemname"] ?>"></a>
          <div class="info">
            <h4><a href="#"><?php echo $item["itemname"] ?></a><span>Ksh. <?php echo $item["price"] ?></span></h4>
            <form action="../processes/process-add-to-cart.php" method="POST">
              <label for="quantity">Quantity</label>
              <select name="quantity" id="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
              <br><br>

              <input type="hidden" name="price-to-total" value="<?php echo $item["price"]; ?>">
              <input type="hidden" name="id-to-add" value="<?php echo $item["itemID"]; ?>">
              <button type="submit" class="add-to-cart">Add to cart</button>
            </form>
            <br><br>
            <?php
            if(isset($_SESSION['utype'])){
              if($_SESSION['utype'] === 'Admin' || $_SESSION['utype'] === 'SuperAdmin'){
              echo 
              "<div style='display: flex; justify-content: space-around; padding-top: 0.5em;'>
                <form action='../processes/remove.php' method='POST'>
                  <input type='hidden' name='id_to_delete' value=" . $item["itemID"] . ">
                  <input type='hidden' name='img-address-to-delete' value='" . $item["img_address"] . "'>
                  <button type='submit' name='remove-item' class='remove'>Remove</button>
                </form>
                <form action='admin-edit-items.php' method='POST'>
                  <input type='hidden' name='id-to-update' value=" . $item["itemID"] . ">
                  <button type='submit' class='update'>Edit</button>
                </form>
              </div>";
              }
            }
            ?>
          </div>
        </div>
    <?php
      }
    }
    else if($GLOBALS['isEmpty']){
      echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
    }
    
    else {
      echo getData($sql_select);
    }
    ?>

  </div>

  <h2>More to come...</h2>

  <?php require("../partials/footer.php") ?>

</body>

</html>