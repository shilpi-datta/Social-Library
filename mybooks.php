<?php
session_start();
require_once("utility/Database.php");

$userid = $_SESSION["user_id"];

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once("header.php");
?>

<body>
    <?php
    include_once("top.php");
    ?>

    <style>
        table,
        tr,
        td {
            border: 1px solid blue;
        }
    </style>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills flex-column">
                    <!--<li class="nav-item">

                        <a class="nav-link" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="lend.php" <?php } else { ?> href="login.php" <?php } ?>>Add Book</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="#" <?php } else { ?> href="login.php" <?php } ?>>Borrow Book</a>
                    </li>-->
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <?php
                ?>
                 <h2>You have Lended</h2>
                <?php
                $sql = "SELECT  `book_list` . `book_id` , `owner_id` , `book_list` . `name` , `category` , `writer` FROM `book_list`
                 join `users` on `book_list` . `owner_id` = `users` . `user_id` WHERE `book_list` . `owner_id` = '$userid'";
            
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // echo "<table><tr><th>Book name</th><th>Writer</th><th>Category</th><th>Number of copies</th></tr>";

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="media border p-3">
                            <img src="images/book.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                            <div class="media-body">
                                <h4><?= $row["name"] ?> <small><i>Posted on February 19, 2016</i></small></h4>
                                <p>By <?= $row["writer"] ?></p>
                                <span class="badge badge-secondary"><?= $row["category"] ?></span>
                                
                            </div>
                        </div>

                        <!-- echo "<tr><td>" . $row["name"] . "</td><td>" . $row["writer"] . "</td><td>" . $row["category"] . "</td><td>" . $row["copies"] . "</td></tr>"; ?> <br> -->
                    <?php
                }
            } else {
                echo "No result found";
            }
            ?>

            </div>
        </div>


    </div>

    <?php
    include_once("footer.php");
    ?>

</body>

</html>