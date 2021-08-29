<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <title>Feedback</title>
</head>
<body>
<?php require("../partials/nav.php"); ?>
<?php require("../partials/verify.php"); ?>

<?php 
if(!isLogged()){
    header("Location: login.php");
}
?>

    <h2>Feedback Form</h2>
    <div class="feedback-form">
        <form action="../processes/process-give-feedback.php" method="POST">
            <label for="title">Title: <span>*</span></label>
            <input type="text" id="title" name="title" required>
            <br><br>

            <label for="cont" id="text-label-feedback">Content: <span>*</span></label>
            <textarea name="cont" id="cont" cols="30" rows="10" required></textarea>
            <br><br>

            <button type="submit" class="action-btn">Submit</button>
        </form>
    </div>

    <?php require("../partials/footer.php") ?>
</body>
</html>