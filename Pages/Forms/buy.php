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
        Buy Product
    </title>
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">

    <div class="top_navbar">
        <a href="dashboard.php">
            <div class="hamburger">
                <a href="../products.php">
                    <i class="fas fa-arrow-left" title="Go back" style="font-size: 20px"></i>
                </a>
            </div>
        </a>
        <div class="top_menu">
            <div class="logo">
                Buy products
            </div>
        </div>
    </div>
    <div class="main-form">
        <form action="buyinfo.php" method="post">
            <div class="form-group">
                <label>Owner</label>
                <select name='selectowner'>
                    <option disabled selected>Select Owner</option>
                    <?php
                    include "buyinfo.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT o_id, o_name From owner");  // Use select query here

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['o_id'] . "'>" . $data['o_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Product</label>
                <select name='selectproduct'>
                    <option disabled selected>Select product</option>
                    <?php
                    include "buyinfo.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT pr_id,pr_name From product");  // Use select query here

                    while ($data = mysqli_fetch_array($records)) {
                        echo "<option value='" . $data['pr_id'] . "'>" . $data['pr_name'] . "</option>";  // displaying data in option menu
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date (YYYY/MM/DD)</label>
                <input align="center" type="text" name="date" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Quantity (In numbers)</label>
                <input align="center" type="number" name="quant" autocomplete="off" class="form-control" required>
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