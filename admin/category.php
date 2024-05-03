<?php require_once "header.php"; 
    if($_SESSION["user_role"] == 0)
    {
        header("Location: $host/admin/post.php");
    }

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
            <?php
                            require_once "./config.php";

                            $limit = 3;

                            if (isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }
                            else 
                            {
                                $page = 1;
                            }
                            $offset = ($page - 1) * $limit;

                            $query = "SELECT * FROM `category` ORDER BY `category_id` DESC LIMIT $offset,$limit";
                            $result = mysqli_query($conn, $query) or die("Query Failed...");

                            if (mysqli_num_rows($result) > 0) 
                            {
            ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                            $serial = $offset + 1;
                            while ($data = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                <td class='id'>
                                    <?php echo $serial; ?>
                                </td>
                                <td>
                                    <?php echo $data['category_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data['post']; ?>
                                </td>
                                <td class='edit'><a href='update-category.php?id=<?php echo $data['category_id'] ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-category.php?id=<?php echo $data['category_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php
                                $serial++;
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    }

                    $query2 = "SELECT * FROM `category`";
                        $result2 = mysqli_query($conn, $query2) or die("Query Failed...");

                        if (mysqli_num_rows($result2) > 0) {
                            $records = mysqli_num_rows($result2);
                            $limit = 3;
                            $pages = ceil($records / $limit);

                            echo "<ul class='pagination admin-pagination'>";
                            if ($page > 1) {
                                echo '<li><a href="category.php?page=' . ($page - 1) . '">Prev</a></li>';
                            }
                            for ($i = 1; $i <= $pages; $i++) {
                                if ($i == $page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }

                                echo "<li class='$active'><a href='category.php?page=" . $i . "'>" . $i . "</a></li>";
                            }
                            if ($pages > $page) {
                                echo "<li><a href='category.php?page=" . ($page + 1) . "'>Next</a></li>";
                            }
                            echo "</ul>";
                       
                        }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
