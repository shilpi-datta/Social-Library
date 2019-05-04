<?php
session_start();
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
                        <a class="nav-link" href="account.php">Add Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Borrow Book</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT `name`,`writer`,`category`, `copies` FROM book_list";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // echo "<table><tr><th>Book name</th><th>Writer</th><th>Category</th><th>Number of copies</th></tr>";

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="media border p-3">
                            <img src="images/book.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            
                            <div class="media-body">
                                <h4><?=$row["name"] ?> <small><i>Posted on February 19, 2016</i></small></h4>
                                <p>By <?=$row["writer"] ?></p>
                                <span class="badge badge-secondary"><?=$row["category"]?></span>    
                            </div>
                        </div>

                        <!-- echo "<tr><td>" . $row["name"] . "</td><td>" . $row["writer"] . "</td><td>" . $row["category"] . "</td><td>" . $row["copies"] . "</td></tr>"; ?> <br> -->
                    <?php
                }
            } else {
                echo "No result found";
            }
            $conn->close();
            ?>

            </div>
        </div>


    </div>

    <?php
    include_once("footer.php");
    ?>

</body>

</html>