<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["e_name"], $_POST["e_contact"])) {
    $name = mysqli_real_escape_string($connect, $_POST["e_name"]);
    $contact = mysqli_real_escape_string($connect, $_POST["e_contact"]);
    $query = "INSERT INTO employee(e_name, e_contact) VALUES('$name', '$contact')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>