<?php

$db = mysqli_connect("localhost", "root", "", "pet_store_db");

$pname = $_POST['pname'];
$breed = $_POST['breed'];
$selectowner = $_POST['selectowner'];


if ($selectowner) {
    $query = "INSERT INTO `pet`(`p_name`, `breed`, o_id) VALUES ('$pname','$breed', $selectowner)";
    mysqli_query($db, $query);
    echo '<script language="javascript">';
    echo 'alert("Pet is registered!");';
    echo 'window.location.href="pet.php";';
    echo '</script>';
}
