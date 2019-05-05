<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Decline</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

<?php

$query = "SELECT * FROM comments";

$select_comments = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_comments)) {

    $comment_id = $row["comment_id"];
    $comment_author = $row["comment_author"];
    $comment_content = $row["comment_content"];
    $comment_email = $row["comment_email"];
    $comment_status = $row["comment_status"];
    $comment_post_id = $row["comment_post_id"];
    $comment_date = $row["comment_date"];

    echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_post_id)) {

            $post_title = $row["post_title"];

        echo "<td>$post_title</td>";

        }

        echo "<td>$comment_date</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Approve</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Decline</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "</tr>";

}

?>

    </tbody>
</table>


<?php

if(isset($_GET["delete"])) {

    $post_id_delete = $_GET["delete"];

    if(!$post_id_delete) {

        die("Nothing to delete!" . mysqli_error($post_id_delete));

    }

    $query = "DELETE FROM posts WHERE post_id = {$post_id_delete} ";

    $delete_query = mysqli_query($connection, $query);

    header("Location: posts.php");

}


?>
