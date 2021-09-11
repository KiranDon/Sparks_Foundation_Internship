<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details.</title>
    <style>
        <?php include("css/style.css") ?>   
    </style>
</head>
<body>
    <?php include("header.php") ?>

    <div class="profile">
        <img src="images/user.png">

        <div class="details">
            <table>
                <?php

                    include ("config.php");
                    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    // echo $url;  
                    $url_components = parse_url($url);
                    parse_str($url_components['query'], $parameters);
                    $user = $parameters['user'];
                    // echo $name;
                    $query = mysqli_query($connection, "select * from customers where name='$user'");
                    $user_data = mysqli_fetch_array($query);
                ?>
                <tr>
                    <td><h4>User:</h4></td>
                    <td><?php echo $user_data['name'] ?></td>
                </tr>
                <tr>
                    <td><h4>Email:</h4></td>
                    <td><?php echo $user_data['email'] ?></td>
                </tr>
                <tr>
                    <td><h4>Available Balance:</h4></td>
                    <td><?php echo $user_data['balance'] ?></td>
                </tr>
            </table>
        </div>
        <p>Enter required details to make transaction.</p>
        <form method="POST" action="transfer.php">
            <div class="row">
                <label>Receiver:</label>
                <select name=receiver>
                    <option selected disabled>Select Receiver to Send</option>
                    <?php
                        $newQuery = mysqli_query($connection, "select * from customers");
                        while($users = mysqli_fetch_assoc($newQuery)){
                    ?>
                        <option value="<?php echo $users['name']?>"><?php echo $users['name']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="row">
                <label>Amount:</label>
                <input type="text" placeholder="Enter amount to send" name="money">
            </div>
            <input type="hidden" value="<?php echo $user_data['name']?>" name="sender">
            <input type="submit" value="Make Transaction" class="button">
        </form>
    </div>
    
    <?php include("footer.php") ?>
</body>
</html>