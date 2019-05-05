<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Update Category</label>

        <?php

        if(isset($_GET["update"])) {

            $cat_id = $_GET["update"];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $select_categories_update = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_categories_update)) {

                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];

            ?>

                <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">


            <?php
            }

        }?>

        <?php ///////// Update query

        if(isset($_POST["update_category"])) {

            $title_to_update = $_POST["cat_title"];

            $query = "UPDATE categories ";
            $query .= "SET cat_title = '{$title_to_update}' ";
            $query .= "WHERE cat_id = {$cat_id} ";

            $update_query = mysqli_query($connection, $query);

            if(!$update_query) {

                die("Query failed!" . mysqli_error($connection));

            }

        }


        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>
