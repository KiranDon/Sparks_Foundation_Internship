<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        <?php include("css/style.css") ?>
    </style>
    <script src="js/script.js"></script>
</head>
<body>
    <?php include("header.php") ?>

    <h2 class="center">Recent Transactions.</h2>
    <div class="customers">
        <table>
            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Usha Kiran</td>
                <td>Harsha</td>
                <td>5000</td>
                <td>2021-09-07 10:20:45</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Usha Kiran</td>
                <td>Tharun</td>
                <td>500</td>
                <td>2021-09-07 12:29:15</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Tharun</td>
                <td>Harsha</td>
                <td>90</td>
                <td>2021-09-17 20:15:32</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Harsha</td>
                <td>Usha Kiran</td>
                <td>5100</td>
                <td>2021-09-10 08:59:45</td>
            </tr>
        </table>
    </div>

    <?php include("footer.php") ?>
</body>
</html>