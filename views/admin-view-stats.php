<?php require_once("../processes/connect.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>View Stats</title>
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

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            const data_items = new google.visualization.DataTable();
            data_items.addColumn('string', 'itemname');
            data_items.addColumn('number', 'freq');

            const data_users = new google.visualization.DataTable();
            data_users.addColumn('string', 'itemname');
            data_users.addColumn('number', 'freq');



            <?php
            $sql_select_items = "SELECT items.itemname, COUNT(*) AS freq FROM orders INNER JOIN items ON items.itemID = orders.itemID GROUP BY items.itemname";
            $sql_select_users = "SELECT users.username, COUNT(*) AS freq FROM orders INNER JOIN users ON users.userID = orders.userID GROUP BY users.username";
            if ($rows_items = getData($sql_select_items)) {
                foreach ($rows_items as $row_item) {
                    echo "data_items.addRow(['{$row_item['itemname']}', {$row_item['freq']}]);";
                }
            } else if ($GLOBALS['isEmpty']) {
                echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
            } else {
                echo getData($sql_select_items);
            }

            if ($rows_users = getData($sql_select_users)) {
                foreach ($rows_users as $row_user) {
                    echo "data_users.addRow(['{$row_user['username']}', {$row_user['freq']}]);";
                }
            } else if ($GLOBALS['isEmpty']) {
                echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
            } else {
                echo getData($sql_select_users);
            }
            ?>

            const options_items = {
                'title': 'Ordered Items',
                'width': 550,
                'height': 400
            };

            const options_users = {
                'title': 'User order count',
                'width': 550,
                'height': 400
            };

            const chart_items = new google.visualization.PieChart(document.getElementById('piechart_ordered_items'));
            const chart_users = new google.visualization.BarChart(document.getElementById('barchar_users_orders'));
            chart_items.draw(data_items, options_items);
            chart_users.draw(data_users, options_users);
        }
    </script>

    <h2>Stats</h2>
    <div style="display: flex; justify-content:space-around">
        <div id="piechart_ordered_items"></div>
        <div id="barchar_users_orders"></div>
    </div>
    

    <?php require("../partials/footer.php"); ?>
</body>

</html>