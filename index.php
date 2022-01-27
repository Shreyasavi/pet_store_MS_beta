<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Check-In</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="Images/dog.jpg" alt="cat" /></div>
                <div class="formBx">
                    <form method="post" action="login.php">
                        <h2>Employee Check-In</h2>
                        <input type="tel" pattern="[0-9]{3}" name="eid" placeholder="EID" />
                        <input type="tel" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" name="ename" placeholder="Employee name" />
                        <input type="submit" name="checkin" value="Check-In" />
                        <p class="signup">
                            Didn't register an employee ?
                            <a href="#" onclick="toggleForm();">Register</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form action="registration.php" method="post">
                        <h2>Register employee</h2>
                        <input type="tel" pattern="[0-9]{3}" name="eid" placeholder="EID(3 digits)" />
                        <input type="tel" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" name="ename" placeholder="Employee name" />
                        <input type="tel" pattern="[0-9]{10}" name="econtact" placeholder="Contact(10 digits)" />
                        <input type="submit" name="register" value="Register" />
                        <p class="signup">
                            Already registered ?
                            <a href="#" onclick="toggleForm();">Check-In.</a>
                        </p>
                    </form>
                </div>
                <div class="imgBx"><img src="Images/cat.jpg" alt="dog" /></div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>

