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
        Register Doctor
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
                Register Doctor
            </div>
        </div>
    </div>
    <div class="main-form">
        <form action="doctorinfo.php" method="post">
            <div class="form-group">
                <label>Doctor Name</label>
                <input align="center" type="text" name="dname" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input align="center" type="text" name="dlocation" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contact (10 digits)</label>
                <input align="center" type="tel" pattern="[0-9]{10}" name="dcontact" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input align="center" type="email" name="dmail" autocomplete="off" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<script>
    $(".hamburger").click(function(){
        $(".wrapper").toggleClass("collapse");
    });
</script>

</body>

</html>