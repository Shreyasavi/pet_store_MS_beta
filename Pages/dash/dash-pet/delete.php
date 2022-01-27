<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["id"])) {
    $query = "DELETE FROM pet WHERE p_id = '" . $_POST["id"] . "'";
    if (mysqli_query($connect, $query)) {
        echo 'Data Deleted';
    }
}
