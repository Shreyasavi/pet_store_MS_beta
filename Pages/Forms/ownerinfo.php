<?php
session_start();

if(!$_SESSION['eid'])
{

    header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'pet_store_db');

$oname = $_POST['oname'];
$olocation = $_POST['olocation'];
$ocontact = $_POST['ocontact'];
$eid = $_SESSION['eid'];

$query = "INSERT INTO `owner`(`o_name`, `o_location`, `o_contact`, e_id) VALUES ('$oname','$olocation','$ocontact','$eid')";

mysqli_query($con, $query);
echo '<script language="javascript">';
echo 'alert("Pet owner registered! Now you can register pet");';
echo 'window.location.href="owner.php";';
echo '</script>';
?>