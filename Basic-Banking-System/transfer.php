<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        <?php include ("css/style.css") ?>
        </style>
    <script>
        <?php include ("js/script.js") ?>
    </script>
</head>
<body>
    <?php 
        include ("header.php");
        include ("footer.php");
        include ("config.php");

        $from = $_POST['sender'];
        $to = $_POST['receiver'];
        $money = $_POST['money'];

        $senderQuery = mysqli_query($connection, "select * from customers where name='$from'");
        $receiverQuery = mysqli_query($connection, "select * from customers where name='$to'");

        $senderData = mysqli_fetch_array($senderQuery);
        $receiverData = mysqli_fetch_array($receiverQuery);

        if($senderData['balance'] < $money){
            echo '<div class="response">
                        <h2 style="color: rgb(228, 41, 24);">Insufficient Balance.</h2>
                        <div><img src="images/spinner.png"></div>
                        <p><a href="index.php">Redirect to Home page.</a></p>
                    </div>';
        }else if($money == 0 || $money < 0){
            echo '<div class="response">
                        <h2 style="color: rgb(228, 41, 24);">Invalid Amount.</h2>
                        <div><img src="images/spinner.png"></div>
                        <p><a href="index.php">Redirect to Home page.</a></p>
                    </div>';
        }else{
            //deduct money from sender
            mysqli_query($connection, "update customers set balance=balance-$money where name='$from'");

            //credit money to receiver
            mysqli_query($connection, "update customers set balance=balance+$money where name='$to'");

            //update recent transactions
            $updateTransactions = mysqli_query($connection, "insert into transactions values('$from', '$to', '$money', sysdate())");;
            if($updateTransactions){
                echo '<div class="response">
                        <h2 style="color: rgb(24, 228, 24);">Transaction Successful.</h2>
                        <div><img src="images/spinner.png"></div>
                        <p><a href="transactions.php">Redirect to Recent Transactions page.</a></p>
                    </div>';
            }else{
                echo '<div class="response">
                        <h2 style="color: rgb(228, 41, 24);>Transaction Failed.</h2>
                        <div><img src="images/spinner.png"></div>
                        <p><a href="index.php">Redirect to Home page.</a></p>
                    </div>';
            }
        }
    ?> 
</body>
</html>