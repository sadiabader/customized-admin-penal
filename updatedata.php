
<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');
$user_id = $_GET['id'];
$getid = "select * from `category` where id ='$user_id'";
$result = mysqli_query($connection, $getid);
if (!$result) {
    die("Query Failed");
}
if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/Updateuser.css">
            <title>Update User Details</title>
        </head>

        <body>
            <div class="col-md-6 zain">
                <form action="UpdateDetail.php" method="post" class="form-group ">
                    <h1>Update User Details</h1>
                    <div>
                    <label for="catid"> Id </label>
                        <input type="number" name="catid" class="form-control" value="<?php echo $rows['catid'] ?>">
                        <label for="catname"> category Name </label>
                        <input type="text" name="catname" class="form-control" value="<?php echo $rows['catname'] ?>">
                    </div>

                    <div>
                        <label for="cattype"> Type </label>
                        <input type="text" name="cattype" class="form-control"value="<?php echo $rows['cattype'] ?>"> 
                    </div>
                    <!-- <div>
                        <label for="catdes">  Description </label>
                        <input type="number" name="phone" class="form-control" value="
                    </div>
            </div>
            <div class="modal-footer">
                <button href="registereduser.php" type="submit" class="btn btn-danger">Close</button>
                <button type="submit" name="adduser" class="btn btn-success">Update Details</button>
            </div> -->
            <label for="floatingTextarea">Description</label>
              <div class="form-floating">
                <textarea name="catdes" class="form-control"value="<?php echo $rows['catdes'] ?>"> placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="catstatus">
                <option selected>Open this select menu</option>
                <option value="1">Active</option>
                <option value="2">Deactivate</option>  
            </select>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addcat" class="btn btn-primary">Add Category</button>
        </div>  -->
        <div class="modal-footer">
                <button href="registereduser.php" type="submit" class="btn btn-danger">Close</button>
                <button type="submit" name="adduser" class="btn btn-success">Update Details</button>
            </div> -->
        </form>
            </div>
            <?php
    }
}
include('admin/includes/footer.php');
?>
</body>

</html>