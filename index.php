<?php
session_start();
require_once("utility/Database.php");

if (isset($_GET['locality'])) {
    $locality = $_GET['locality'];
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
                    <li class="nav-item">

                        <a class="nav-link" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="lend.php" <?php } else { ?> href="login.php" <?php } ?>>Lend Books</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="borrowed.php" <?php } else { ?> href="login.php" <?php } ?>>Borrowed Books</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">

                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    $userid = $_SESSION["user_id"];
                    if (isset($locality)) {
                        ?>
                        <h2>Books available on <?= $locality ?></h2>
                        <?php $sql = "SELECT `book_id`, `book_list`.`name` bookname,`writer`,`category`, `copies`,`users`.`name` username , `date` FROM `book_list` 
                        join `users` on `book_list`.`owner_id` = `users`.`user_id` where `locality` = '$locality' and  `book_list`.`owner_id` != '$userid'";
                    } else {
                        ?>
                        <h2>Books available on all locality</h2>
                        <?php
                        $sql = "SELECT `book_id`, `book_list`.`name` bookname,`writer`,`category`, `copies`,`users`.`name` username , `date` FROM `book_list` 
                        join `users` on `book_list`.`owner_id` = `users`.`user_id` where `book_list`.`owner_id` != '$userid'";
                    } ?>

                    <?php

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <div class="media border p-3">
                                <img src="images/book.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                                <div class="media-body">
                                    <h4><?= $row["bookname"] ?> <small><i>Posted by <?= $row["username"] ?> on February 19, 2016</i></small></h4>
                                    <p>By <?= $row["writer"] ?></p>
                                    <span class="badge badge-secondary"><?= $row["category"] ?></span>
                                    <?php if ($row["copies"] == 0) {
                                        ?> <h5> Book is not available <h5>
                                            <?php } else { ?>
                                                <a class="btn btn-outline-secondary" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="borrowed.php?bookid=<?= $row['book_id'] ?>" <?php } else { ?> href="login.php" <?php } ?>>+ Borrow</a>
                                            <?php } ?>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    echo "No result found";
                }
            } else {
                if (isset($locality)) {
                    ?>
                        <h2>Books available on <?= $locality ?></h2>
                        <?php $sql = "SELECT `book_id`, `book_list`.`name` bookname,`writer`,`category`, `copies`,`users`.`name` username, `date` FROM `book_list` 
                join `users` on `book_list`.`owner_id` = `users`.`user_id` where `locality` = '$locality'";
                    } else {
                        ?>
                        <h2>Books available on all locality</h2>
                        <?php
                        $sql = "SELECT `book_id`, `book_list`.`name` bookname,`writer`,`category`, `copies`,`users`.`name` username ,`date` FROM `book_list` 
                        join `users` on `book_list`.`owner_id` = `users`.`user_id`";
                    } ?>

                    <?php

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            ?>

                            <div class="media border p-3">
                                <img src="images/book.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

                                <div class="media-body">
                                    <h4><?= $row["bookname"] ?> <small><i>Posted by <?= $row["username"] ?> on <?= $row["date"] ?></i></small></h4>
                                    <p>By <?= $row["writer"] ?></p>
                                    <span class="badge badge-secondary"><?= $row["category"] ?></span>
                                    <?php if ($row["copies"] == 0) {
                                        ?> <h5> Book is not available <h5>
                                            <?php } else { ?>
                                                <a class="btn btn-outline-secondary" <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?> href="borrowed.php?bookid=<?= $row['book_id'] ?>" <?php } else { ?> href="login.php" <?php } ?>>+ Borrow</a>
                                            <?php  } ?>
                                </div>
                            </div>

                        <?php
                    }
                } else {
                    echo "No result found";
                }
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