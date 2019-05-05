<?php

function confirm_query($result) {

    global $connection;

    if(!$result) {

        die("Query failed!" . mysqli_error($connection));

    }

}


function add_category() {

    global $connection;

    if(isset($_POST["submit"])) {

        $cat_title = $_POST["cat_title"];

        if($cat_title == "" || empty($cat_title)) {

            echo "This field should not be empty";

        } else {

            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query) {

                die("Query Failed!" . mysqli_error($connection));

            }

        }

    }

}


function find_all_categories() {

    global $connection;

    $query = "SELECT * FROM categories";

    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)) {

        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];

        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
        echo "<tr>";

    }

}


function update_category() {

    global $connection;

    if(isset($_GET["update"])) {

        $cat_id = $_GET["update"];

        include "includes/update_categories.php";

    }

}


function delete_category() {

    global $connection;

    if(isset($_GET["delete"])) {

        $id_to_delete = $_GET["delete"];

        $query = "DELETE FROM categories ";
        $query .= "WHERE cat_id = {$id_to_delete} ";

        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");

    }

}

?>
