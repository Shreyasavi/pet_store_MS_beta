<?php

include("Database/connection.php");//make connection here
if(isset($_POST['register']))
{
    $eid=$_POST['eid'];//here getting result from the post array after submitting the form.
    $ename=$_POST['ename'];//same
    $econtact=$_POST['econtact'];//same


    if($eid=='')
    {
        //javascript use for input checking
        echo '<script language="javascript">';
        echo 'alert("Please enter the EID");';
        echo 'window.location.href="index.php";';
        echo '</script>';

    }

    if($ename=='')
    {

        echo '<script language="javascript">';
        echo 'alert("Please enter the Employee name");';
        echo 'window.location.href="index.php";';
        echo '</script>';

    }

    if($econtact=='')
    {
        echo '<script language="javascript">';
        echo 'alert("Please enter the contact number");';
        echo 'window.location.href="index.php";';
        echo '</script>';
    }
//here query check weather if user already registered so can't register again.
    $check_email_query="select * from employee WHERE e_id='$eid'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
        echo '<script language="javascript">';
        echo 'alert("EID $eid already exist in our database, Please try another one!");';
        echo 'window.location.href="index.php";';
        echo '</script>';

    }
//insert the user into the database.
    $insert_user="insert into employee (e_id,e_name,e_contact) VALUE ('$eid','$ename','$econtact')";
    echo '<script language="javascript">';
    echo 'alert("Employee registered! Now you can Check-In");';
    echo 'window.location.href="Pages/home.php";';
    echo '</script>';
    if(mysqli_query($dbcon,$insert_user))
    {
        echo"<script>window.open('Pages/home.php','_self')</script>";
    }
}
?>