<?php
include('admin/includes/header.php');
include('admin/includes/topbar.php');
include('admin/includes/sidebar.php');
include('config.php');
if(isset($_POST['Login'])){
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];

$query = "SELECT * FROM `user-admin` where email = '$user_email' AND
 password = '$user_pass'";

$res = mysqli_query($conn, $query);
//print_r($res);
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        session_start();
        $_SESSION['username'] = $row['name'];
        // header('location:http://localhost/classwork_php/crud/userdata.php');
    }
}
else{
    echo "<script> alert('invalid username/password </script>";
}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>login page</title>
</head>
<body>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="post" class="form-group">
<input type="text" name="gender" class="form-control">
<label for="email"> Email</label>
<input type="email" name="email" class="form-control">
<label for="password"> Password</label>
<input type="passwprd" name="password" class="form-control">
<input class="btn btn-success" type="submit" value="Login" name="Login">
</form>
</div>
</body>
</html>
