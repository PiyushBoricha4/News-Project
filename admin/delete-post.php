<?php

    require_once "./config.php";

    $postid = $_GET['id'];
    $cat_id = $_GET['catid'];

    $query1 = "SELECT * FROM `post` WHERE `post_id` = '$postid';";
    $result1 = mysqli_query($conn,$query1) or die("Select Query Failed...");
    $row = mysqli_fetch_assoc($result1);

    unlink("upload/".$row['post_img']);

    $query = "DELETE FROM `post` WHERE `post_id` = '$postid';";
    $query .= "UPDATE `category` SET `post` = `post` - 1 WHERE `category_id` = '$cat_id';";

    $result = mysqli_multi_query($conn,$query);

    if($result)
    {
        ?>
        <script>
            alert("Data Deleted Successfully...");
            window.location.href="post.php";
        </script>
        
        <?php    
    }
    else
    {
        echo "Can't Delete your data...";
    }

?>