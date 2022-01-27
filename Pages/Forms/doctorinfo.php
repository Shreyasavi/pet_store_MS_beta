<?php
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'pet_store_db');

$dname = $_POST['dname'];
$dlocation = $_POST['dlocation'];
$dcontact = $_POST['dcontact'];
$demail = $_POST['dmail'];

$query = "INSERT INTO `doctor`(`d_name`, `d_location`, `d_contact`, `d_email`) VALUES ('$dname','$dlocation','$dcontact','$demail')";

mysqli_query($con, $query);
echo '<script language="javascript">';
echo 'alert("Doctor is registered! Now go book your appointments");';
echo 'window.location.href="doctor.php";';
echo '</script>';
?>