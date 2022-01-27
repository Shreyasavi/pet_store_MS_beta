<?php
session_start();

if(!$_SESSION['eid'])
{

    header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}

?>

<html>
<head>
    <link rel="stylesheet" href="../CSS/style-home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
        Home
    </title>
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">

    <div class="top_navbar">
        <a href="dashboard.php">
            <div class="hamburger">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
        </a>
        <div class="top_menu">
            <div class="kitty">
                <div class="circle">
                    <div class="cat">
                        <div class="ears"></div>
                        <div class="tail"></div>
                        <div class="shadow"></div>
                    </div>
                </div>
            </div>
            <div class="logo">
                logo
            </div>
            <ul>
                <li><a href="register.php">
                        <span class="title">Register</span>
                    </a></li>
                <li><a href="appointments.php">
                        <span class="title">Appointments</span>
                    </a></li>
                <li><a href="products.php">
                        <span class="title">Products</span>
                    </a></li>
                <li><a href="../logout.php">
                        <i class="fas fa-sign-out-alt" title="Log out" style="font-size: 1.5em;"></i>
                    </a></li>
            </ul>
        </div>
    </div>


    <div class="main_container" id="main">
        <div class="intro-text">
            <h1>Your Pet Store Management System</h1>
            <div class="sub-text">
                <h2>Register your pet and book appointments</h2>
                <h2>Also find the best products for your pet</h2>
            </div>
        </div>
    </div>

</div>


<script>
    $(".hamburger").click(function(){
        $(".wrapper").toggleClass("collapse");
    });
</script>


</body>

</html>