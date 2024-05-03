<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                require_once "./config.php";

                $query = "SELECT * FROM settings";
      
                $result = mysqli_query($conn, $query) or die ("Query Failed...");
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
            ?>
                <span><?php echo $row['footerdesc']; ?></span>
            <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
