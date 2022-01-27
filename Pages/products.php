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
        Products
    </title>
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">

    <div class="top_navbar">
        <a href="dashboard.php">
            <div class="hamburger">
                <a href="home.php">
                    <i class="fas fa-arrow-left" title="Go back" style="font-size: 20px"></i>
                </a>
            </div>
        </a>
        <div class="top_menu">
            <div class="logo">
                Appointments
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
            </ul>
        </div>
    </div>


    <div class="container">
        <a href="Forms/product.php"><button type="button" class="btn btn-primary">Register product</button></a>
        <i class="fas fa-arrows-alt-h" style="font-size: xx-large; color: white; font-weight: 600"; ></i>
        <a href="Forms/buy.php"><button type="button" class="btn btn-primary">Buy product</button></a>
    </div>
</div>


<script>
    $(".hamburger").click(function(){
        $(".wrapper").toggleClass("collapse");
    });
</script>


</body>

</html>