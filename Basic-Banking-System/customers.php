<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        <?php include("css/style.css") ?>
    </style>
</head>
<body>
    <?php include("header.php") ?>

    <h2 class="center">All Customers.</h2>
    <div class="customers">
        <table>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Balance</th>
                <th>Details</th>
            </tr>

            <?php 
                include ("config.php");

                $query = mysqli_query($connection, "select * from customers");

                while($rows = mysqli_fetch_assoc($query)){
            ?>

                <tr>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['balance'] ?></td>
                    <td><a href="profile.php?user=<?php echo $rows['name'] ?>"><button class="button">Profile</button></a></td>
                </tr>

            <?php
                }
            ?>
            <!-- <tr>
                <td>Usha Kiran</td>
                <td>ushakiran@gmail.com</td>
                <td>7483</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Tharun</td>
                <td>tharun@gmail.com</td>
                <td>70083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Harsha</td>
                <td>harsha@gmail.com</td>
                <td>88083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Usha Kiran</td>
                <td>ushakiran@gmail.com</td>
                <td>7483</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Tharun</td>
                <td>tharun@gmail.com</td>
                <td>70083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Harsha</td>
                <td>harsha@gmail.com</td>
                <td>88083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Usha Kiran</td>
                <td>ushakiran@gmail.com</td>
                <td>7483</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Tharun</td>
                <td>tharun@gmail.com</td>
                <td>70083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Harsha</td>
                <td>harsha@gmail.com</td>
                <td>88083</td>
                <td><button>Profile</button></td>
            </tr>
            <tr>
                <td>Harsha</td>
                <td>harsha@gmail.com</td>
                <td>88083</td>
                <td><button>Profile</button></td>
            </tr> -->
        </table>
    </div>

    <?php include("footer.php") ?>
</body>
</html>