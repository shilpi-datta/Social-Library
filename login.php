<?php
session_start();
require_once("utility/Database.php");

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT `user_id`,`name`,`email`, `password` FROM users WHERE `email`='{$email}' AND `password`='{$pass}' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["name"];
        }
        $_SESSION["loggedin"] = true;
        header("Location: index.php");
        ?>
    <?php
} else {
    echo "Login failed";
    $_SESSION["loggedin"] = false;
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

   
    <!--<form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="Submit" name="Submit">
    </form> -->

    <!-- <form method="POST" action="login.php">
        <div class="form-group">
            <label for="text">Email address:</label>
            <input type="text" class="form-control" name="email" placeholder="Email Address">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password"placeholder="Password">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div>
        <button type="Submit" class="btn btn-primary">Login</button>
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

        <form method="POST" action="login.php">
            <!-- <div class="imgcontainer">
    <img src="images/book.png" alt="Avatar" class="avatar">
  </div> -->

            <div class="container">
            <h2>Login here</h2>
                <label for="name"><b>Username/Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
               <!-- <button type="button" class="cancelbtn">Cancel</button> -->
                <span class="password">Forgot <a href="#">password?</a></span>
            </div>
        </form>

    </body>

    </html>

    <?php
    include_once("footer.php");
    ?>

</body>

</html>