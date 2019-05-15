<?php
session_start();
require_once("utility/Database.php");

$borrowerid = $_SESSION["user_id"];


//echo "$borrowerid";

if (isset($_GET['bookid'])) {
    $bookid = $_GET["bookid"];

    $sql = "SELECT `copies` FROM `book_list` WHERE `book_id` = '$bookid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bcopy = $row["copies"];

            //echo "$bcopy";
        }
    }

    $sql = "INSERT INTO `borrowed_books` (`borrower_id`,`book_id`,`date`)
        VALUES ('{$borrowerid}', '{$bookid}', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully borrowed";
        $bcopy = $bcopy - 1;
        $sql = "UPDATE `book_list` SET `copies`='{$bcopy}' WHERE `book_id` = '$bookid'";
        if ($conn->query($sql) === TRUE) {
            //echo "$bcopy";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
                
                $sql = "SELECT distinct `book_list` . `book_id` , `owner_id` , `book_list`.`name` , `category` , `writer`,`return`,`borrowed_books`.`date` , `phone` FROM `book_list`
                join `borrowed_books` on `book_list` . `book_id` = `borrowed_books` . `book_id` join `users`on `book_list`.`owner_id` = `users`.`user_id` WHERE `borrower_id` = '$borrowerid' 
                AND `return` = 0 and `book_list`.`book_id` in (select `borrowed_books`.`book_id` from `borrowed_books` where `borrower_id` = '$borrowerid' AND `return` = 0)";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // echo "<table><tr><th>Book name</th><th>Writer</th><th>Category</th><th>Number of copies</th></tr>";

                    ?>
                    <h2>You have borrowed</h2>
                    <?php

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $borrowdate = $row["date"];
                        $duedate = date('Y-m-d', strtotime($borrowdate . " + 15 day")); // calculate due date for return

                        $now = time(); // current date in timestamp format (in seconds)
                        $duedateTimestamp = strtotime($duedate); // convert return due date to seconds for calculation
                        $datediff = $duedateTimestamp - $now; // calculate difference in seconds

                        $daysLeft = round($datediff / (60 * 60 * 24)); // convert seconds back to days

                        ?>

                        <div class="media border p-3">
                            <img src="images/book.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                            <div class="media-body">
                                <h4><?= $row["name"] ?> <small><i>Borrowed on <?= $row["date"] ?></i></small></h4>
                                <p>By <?= $row["writer"] ?> <span class="badge badge-secondary"><?= $row["category"] ?></span> </p>
                                Contact with owner -><a class="btn btn-outline-secondary" href="" title="Phone No-" data-toggle="popover" data-trigger="hover" data-content=<?= $row["phone"] ?>>Click Me</a><br/>
                                <?php
                                if ($daysLeft >= 0) {
                                    ?>
                                    <div class="alert alert-warning">
                                        You should return this book on or before <?= $duedate ?>. <strong><?= $daysLeft ?> day(s) left</strong>
                                    </div>
                                <?php
                            } else {
                                ?>
                                    <div class="alert alert-danger">
                                        Return date expires on <?= $duedate ?>. <strong><?= ($daysLeft * -1) ?> day(s) ago.</strong>
                                    </div>
                                <?php
                            }
                            ?>
                                <a class="btn btn-outline-secondary" href="return.php?bookid=<?= $row['book_id'] ?>"> Return </a>
                            </div>
                        </div>

                        <!-- echo "<tr><td>" . $row["name"] . "</td><td>" . $row["writer"] . "</td><td>" . $row["category"] . "</td><td>" . $row["copies"] . "</td></tr>"; ?> <br> -->
                    <?php
                }
            } else {
                ?> <h2>You have no books</h2>
                    <a class="btn btn-outline-secondary" href="index.php"> Borrow Now </a>
                <?php }
            ?>

            </div>
        </div>


    </div>

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
                <h2>You have previously borrowed</h2>
                <?php
                $sql = "SELECT distinct `book_list` . `book_id` , `owner_id` , `name` , `category` , `writer`,`return` FROM `book_list`
                 join `borrowed_books` on `book_list` . `book_id` = `borrowed_books` . `book_id` WHERE `borrower_id` = '$borrowerid' AND `return` = 1";

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