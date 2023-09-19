<?php

include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');

if(isset($_POST['add category'])){
    $cat_id = $_POST['catid'];
    $cat_name = $_POST['catname'];
    $cat_type = $_POST['cattype'];
    $cat_des = $_POST['catdes'];
    $cat_status = $_POST['catstatus'];

    $cat = "SELECT * from category where cname = '$cat_name'";
    $result = mysqli_query($connection, $cat);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('category already exist'); </script>";
    } else {
        $insert_cat = "INSERT INTO `category` (`cid`, `cname`, `ctype`, `cdescription`, `cstatus`) 
        VALUES ('$cat_id', '$cat_name', '$cat_type','$cat_des', '$cat_status')";
        $connection_insert = mysqli_query($connection, $insert_cat);
        if($connection_insert){
            echo "<script> alert('category added successfully'); </script>";

        }
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
<div class="container">
<h1><u> Add Product </u></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="form-group">

<label for="catid"> Id </label>
<input type="number" name="catid" class="form-control">

<label for="catname">category Name </label>
<input type="text" name="catname" class="form-control">

<label for="cattype"> Type </label>
<input type="text" name="cattype" class="form-control">

<label for="floatingTextarea">Description</label>
              <div class="form-floating">
                <textarea name="catdes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            </div>
            <label for="catstatus"> Status </label>
            <select class="form-select" aria-label="Default select example" name="catstatus">
                <option selected>Open this select menu</option>
                <option value="1">Active</option>
                <option value="0">Deactivate</option>
                
            </select>
            <br>
<input type="submit" name="add category" value = "Add category" class="btn btn-primary">



</form>
</div>

<?php
include('admin/includes/footer.php');
?>
</body>
</html>