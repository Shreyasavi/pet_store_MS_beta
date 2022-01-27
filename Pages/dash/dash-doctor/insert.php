<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["d_name"], $_POST["d_contact"], $_POST["d_location"], $_POST["d_email"],)) {
    $name = mysqli_real_escape_string($connect, $_POST["d_name"]);
    $contact = mysqli_real_escape_string($connect, $_POST["d_contact"]);
    $location = mysqli_real_escape_string($connect, $_POST["d_location"]);
    $email = mysqli_real_escape_string($connect, $_POST["d_email"]);
    $query = "INSERT INTO doctor(d_name, d_contact, d_location, d_email) VALUES('$name', '$contact', '$location', '$email')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>