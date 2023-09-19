<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');

if(isset($_POST['addpro'])){
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmp = $_FILES['pimage']['tmp_name'];
    $pimage_size = $_FILES['pimage']['size'];

    $check_product = "SELECT * from products where pname = '$pname'";
    $result = mysqli_query($conn, $check_product);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Product already exist'); </script>";
    } else {
        $insert_pro = "INSERT INTO `products` (`pname`, `pcategory`, `pdescription`, `price`, `image`) VALUES ('$pname', '$pcat', '$pdesc', '$price', '$pimage')
        ";
        $connection_insert = mysqli_query($conn, $insert_pro);
        move_uploaded_file($pimage_tmp, 'images/' . $pimage);
        if($connection_insert){
            echo "<script> alert('Product added successfully'); </script>";

        }
        // header('location:addcat.php');
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
            <label for="image"> Image </label>
                <input type="file" name="pimage" class="form-control">
              <div class="col-md-6">
                <label for="pimage"> Choose Image </label>
                <input type="file" name="pimage" class="form-control">
              </div>
            
            
            <br>
<input type="submit" name="add category" value = "Add category" class="btn btn-primary">



</form>
</div>

<?php
include('admin/includes/footer.php');
?>
</body>
</html>