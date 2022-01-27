<?php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($connect, $_POST["value"]);
    $query = "UPDATE pet SET ".$_POST["column_name"]."='".$value."' WHERE p_id = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Updated';
    }
}
