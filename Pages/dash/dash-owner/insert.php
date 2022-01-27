<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if (isset($_POST["o_name"], $_POST["o_contact"], $_POST["o_location"], $_POST["e_id"],)) {
    $name = mysqli_real_escape_string($connect, $_POST["o_name"]);
    $contact = mysqli_real_escape_string($connect, $_POST["o_contact"]);
    $location = mysqli_real_escape_string($connect, $_POST["o_location"]);
    $eid = mysqli_real_escape_string($connect, $_POST["e_id"]);
    $query = "INSERT INTO owner(o_name, o_contact, o_location, e_id) VALUES('$name', '$contact', '$location', '$eid')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>