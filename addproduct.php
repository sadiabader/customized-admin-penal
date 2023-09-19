
<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');
$sqlquery = "SELECT * from `product` where status ='1'";
$fetch = mysqli_query($connection, $sqlquery);
if(mysqli_num_rows($fetch) > 0){
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
    <title>Form handling </title>
</head>
<body>


<table class="table table-bordered text-center">
    <thead class="table table-dark">
        <th>ID</th>
        <th>Product_Name</th>
        <th>Product_category</th>
        <th>Product_Description</th>
        <th>Product_Image</th>
        <th>Update</th>
        <th>Trash</th>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_assoc($fetch)){
?>
        <tr>
            <td><?php echo $row['p_id'];?></td>
            <td><?php echo $row['p_name'];?></td>
            <td><?php echo $row['p_category'];?></td>
            <td><?php echo $row['p_description'];?></td>
            <td><img src="<?php echo 'uploadfiles/' .$row['p_image']?>" alt="" height="100px" width="100px"></td>
            <td><a href="update.php?p_id=<?php echo $row['p_id']?>" class="btn btn-warning"> UPDATE </a></td>
            <td><a href="delete.php?p_id=<?php echo $row['p_id']?>" class="btn btn-success"> TRASH </a></td>
            
            
        </tr>
        <?php
        }
    }
        ?>
    </tbody>
</table>
</body>
</html>