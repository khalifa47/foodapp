<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Delivery</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>

<?php 
if(!isLogged()){
    header("Location: login.php");
}
?>

    <h2>Deliveries for today</h2>
    <form action="">
        <table>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Buyer</th>
                <th>Delivery address</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td>123</td>
                <td>Apples</td>
                <td>7</td>
                <td>Khalifa Fumo</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corporis.</td>
                <td>700</td>
                <td class="delivered-column"><input type="checkbox" id="del123tokf" name="del123tokf"></td>
            </tr>
            <tr>
                <td>234</td>
                <td>Broccoli</td>
                <td>8</td>
                <td>James Kap</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corporis.</td>
                <td>800</td>
                <td class="delivered-column"><input type="checkbox" id="del234tojk" name="del234tojk"></td>
            </tr>
            <tr>
                <td>345</td>
                <td>Spinach</td>
                <td>5</td>
                <td>Pauline Lin</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corporis.</td>
                <td>500</td>
                <td class="delivered-column"><input type="checkbox" id="del345topl" name="del345topl"></td>
            </tr>
            <tr>
                <td>456</td>
                <td>Oranges</td>
                <td>4</td>
                <td>Jack Don</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corporis.</td>
                <td>400</td>
                <td class="delivered-column"><input type="checkbox" id="del456tojd" name="del456tojd"></td>
            </tr>
        </table>
    
        <div class="deliver">
            <button type="submit">Confirm deliveries</button>
        </div>
    </form>
    

    
    <?php require("../partials/footer.php") ?>
    
</body>
</html>