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

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            const data = new google.visualization.DataTable();
            data.addColumn('string', 'itemname');
            data.addColumn('number', 'freq');

            <?php
            $sql_select = "SELECT items.itemname, COUNT(*) AS freq FROM orders INNER JOIN items ON items.itemID = orders.itemID GROUP BY items.itemname";
            if ($rows = getData($sql_select)) {
                foreach ($rows as $row) {
                    echo "data.addRow(['{$row['itemname']}', {$row['freq']}]);";
                }
            } else if ($GLOBALS['isEmpty']) {
                echo "<h2 style='color: rgba(30, 0, 139, 0.75);'>Nothing to see here :(</h2>";
            } else {
                echo getData($sql_select);
            }
            ?>

            // Optional; add a title and set the width and height of the chart
            const options = {
                'title': 'Ordered Items',
                'width': 550,
                'height': 400
            };

            // Display the chart inside the <div> element with id="piechart"
            const chart = new google.visualization.PieChart(document.getElementById('piechart_ordered_items'));
            chart.draw(data, options);
        }
    </script>

    <h2>Stats</h2>
    <div id="piechart_ordered_items"></div>

    <?php require("../partials/footer.php"); ?>
</body>

</html>