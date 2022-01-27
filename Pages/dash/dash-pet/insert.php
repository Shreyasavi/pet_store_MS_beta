<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["p_name"], $_POST["breed"], $_POST["d_id"], $_POST["o_id"],)) {
    $name = mysqli_real_escape_string($connect, $_POST["p_name"]);
    $breed = mysqli_real_escape_string($connect, $_POST["breed"]);
    $did = mysqli_real_escape_string($connect, $_POST["d_id"]);
    $oid = mysqli_real_escape_string($connect, $_POST["o_id"]);
    $query = "INSERT INTO pet(p_name, breed, d_id, o_id) VALUES('$name', '$breed', '$did', '$oid')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>