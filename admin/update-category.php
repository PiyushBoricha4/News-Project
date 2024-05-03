<?php 
    require_once "header.php"; 
    
    if($_SESSION["user_role"] == 0)
    {
        header("Location: $host/admin/post.php");
    }

    if(isset($_POST['submit']))
    {
        require_once "./config.php";

        $cid = mysqli_real_escape_string($conn,$_POST['cat_id']);
        $cat_name = mysqli_real_escape_string($conn,$_POST['cat_name']);

        $query = "UPDATE `category` SET `category_name`='$cat_name' WHERE `category_id` = '$cid'";
        $result = mysqli_query($conn,$query) or die("Query Failed...");

            if($result)
            {
                header("Location: $host/admin/category.php");
            }
        }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php
                    require_once "./config.php";
                    
                    $catid = $_GET['id'];
                    $query = "SELECT * FROM `category` WHERE `category_id` = '$catid'";
                    $result = mysqli_query($conn, $query) or die("Query Failed...");

                    if (mysqli_num_rows($result) > 0) 
                    {
                        while($data = mysqli_fetch_assoc($result))
                        {

                        
                ?>
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $data['category_id'] ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $data['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                        }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
