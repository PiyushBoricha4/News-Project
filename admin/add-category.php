<?php 
    require_once "header.php";

    if($_SESSION["user_role"] == 0)
    {
        header("Location: $host/admin/post.php");
    }
    
    if (isset($_POST['save']))
    {
        require_once "./config.php";

        $cat = mysqli_real_escape_string($conn,$_POST['cat']);
        
        $query = "SELECT `category_name` FROM `category` WHERE `category_name` = '$cat'";
        $result = mysqli_query($conn,$query) or die("Query Failed...");

        if(mysqli_num_rows($result) > 0)
        {
            echo "Category Already Exist...";
            die();
        }
        else
        {
            $query1 = "INSERT INTO `category`(`category_name`) VALUES('$cat')";
            $result1 = mysqli_query($conn,$query1);

            if($result1)
            {
                header("Location: $host/admin/category.php");
            }
        }
        
    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
