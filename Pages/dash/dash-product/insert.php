<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["pr_name"], $_POST["description"], $_POST["cost"])) {
    $name = mysqli_real_escape_string($connect, $_POST["pr_name"]);
    $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $cost = mysqli_real_escape_string($connect, $_POST["cost"]);
    $query = "INSERT INTO doctor(pr_name, description, cost) VALUES('$name', '$description', '$cost')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>