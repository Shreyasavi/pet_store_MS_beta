<?php
session_start();

if(!$_SESSION['eid'])
{

    header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}

?>

<html>
<head>
    <link rel="stylesheet" href="../../CSS/style-home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
        Appoint Doctor
    </title>
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">

    <div class="top_navbar">
        <a href="dashboard.php">
            <div class="hamburger">
                <a href="../appointments.php">
                    <i class="fas fa-arrow-left" title="Go back" style="font-size: 20px"></i>
                </a>
            </div>
        </a>
        <div class="top_menu">
            <div class="logo">
                Set appointments
            </div>
        </div>
    </div>
    <div class="main-form">
        <form action="appointinfo.php" method="post">
            <label>Doctor</label>
            <select name='selectdoctor'>
                <option disabled selected>Select Doctor</option>
                <?php
                include "appointinfo.php";  // Using database connection file here
                $records = mysqli_query($db, "SELECT d_id, d_name From doctor");  // Use select query here

                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['d_id'] . "'>" . $data['d_name'] . "</option>";  // displaying data in option menu
                }
                ?>
            </select>
            <label>Pet</label>
            <select name='selectpet'>
                <option disabled selected>Select pet</option>
                <?php
                // include "appointinfo.php";  // Using database connection file here
                $records = mysqli_query($db, "SELECT p_id,p_name From pet");  // Use select query here

                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['p_id'] . "'>" . $data['p_name'] . "</option>";  // displaying data in option menu
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php mysqli_close($db);  // close connection
        ?>
    </div>
</div>


<script>
    $(".hamburger").click(function(){
        $(".wrapper").toggleClass("collapse");
    });
</script>

</body>

</html>