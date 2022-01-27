<?php
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'pet_store_db');

$prname = $_POST['prname'];
$desc = $_POST['description'];
$cost = $_POST['cost'];

$query = "INSERT INTO `product`(`pr_name`, `description`, `cost`) VALUES ('$prname','$desc','$cost')";

mysqli_query($con, $query);
echo '<script language="javascript">';
echo 'alert("Product is registered!");';
echo 'window.location.href="product.php";';
echo '</script>';
?>