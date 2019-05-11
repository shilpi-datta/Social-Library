<?php
session_start();
require_once("utility/Database.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $locality = $_POST['locality'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO `users` (`name`,`gender`,`locality`,`phone`,`email`,`password`)
    VALUES ('{$name}','{$gender}', '{$locality}','{$phone}','{$email}','{$pass}')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");
?>



<html>

<head>
    <title>
        Social Library - User Registration
    </title>
</head>

<body>

    <?php
    include_once("top.php");
    ?>

    
    <!--<form method="POST" action="register.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="locality" placeholder="Locality">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form> 

   <form method="POST" action="register.php">
        <div class="form-group">
            <label for="text">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="text">Locality:</label>
            <input type="text" class="form-control" name="locality" placeholder="Locality">
        </div>
        <div class="form-group">
            <label for="text">Phone Number:</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <label for="text">Email address:</label>
            <input type="text" class="form-control" name="email" placeholder="Email Address">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="Submit" class="btn btn-primary">Register</button>
    </form> -->

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            form {
                border: 3px solid #f1f1f1;
                padding: 16px;
            }

            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }

                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>

        <form method="POST" action="register.php">
            <div class="container">
            <h2>Registration Form</h2>
                <label for="text"><b>Name</b></label>
                <input type="text" name="name" placeholder="Name">

                <label for="text"><b>Gender</b></label>
                <input type="text" name="gender" placeholder="Gender">
                
                <label for="text"><b>Locality</b></label>
                <input type="text" name="locality" placeholder="Locality">

                <label for="text"><b>Phone Number</b></label>
                <input type="text" name="phone" placeholder="Phone Number">

                <label for="text"><b>Email address</b></label>
                <input type="text" name="email" placeholder="Email Address">

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Register</button>

            </div>
        </form>

        <?php
        include_once("footer.php");
        ?>
    </body>


    </html>