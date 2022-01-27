<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($connect, $_POST["value"]);
    $query = "UPDATE doctor SET ".$_POST["column_name"]."='".$value."' WHERE d_id = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Updated';
    }
}
