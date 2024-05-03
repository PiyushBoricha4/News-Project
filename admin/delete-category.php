<?php

    if($_SESSION["user_role"] == 0)
    {
        header("Location: $host/admin/post.php");
    }

    require_once "./config.php";

    $catid = $_GET['id'];

    $query = "DELETE FROM `category` WHERE `category_id` = '$catid'";
    $result = mysqli_query($conn,$query);

    if($result)
    {
        ?>
        <script>
            alert("Data Deleted Successfully...");
            window.location.href="category.php";
        </script>
        
        <?php    }
    else
    {
        echo "Can't Delete your data...";
    }

mysqli_close($conn);
?>