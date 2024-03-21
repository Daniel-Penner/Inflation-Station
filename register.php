<!DOCTYPE html>
<html>

<head>
    <title>Login - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5-->
</head>

<body>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="navborder">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light navround">
                            <div class="container-fluid">
                                <div class="navbar-nav">
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="products.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
                                </div>
                                <form class="d-flex" action="products.php" method ="get">
                                <input class="form-control me-2" type="search" name ="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class=homehb>
            <h5 style="text-align:center; color:white; font-size:50px;">Register</h5>
        </div>
    </header>
    <div class="d-flex justify-content-lg-center">
        <form method="POST" id="registerForm" action="index.php" onsubmit="return addUser;">
            <fieldset>
                <br>
                <div class="container-fluid">
                    <div class="mx-auto hotcol">
                        <div class="row justify-content-center mx-auto">
                            <div class="col-6">
                                <label for="fname">
                                    <p style="font-size:25px;"><i>First Name</i></p>
                                </label><br>
                                <input id="fname"type="text" class="form-control" placeholder="First name" required><br>

                            </div>
                            <div class="col-6">
                                <label for="lname">
                                    <p style="font-size:25px;"><i>Last Name</i></p>
                                </label><br>
                                <input id="lname"type="text" class="form-control" placeholder="Last name" required><br>
                            </div>
                        </div>
                        <div class="row justify-content-center mx-auto">
                            <div class="col-6">
                                <label for="email">
                                    <p style="font-size:25px;"><i>Email</i></p>
                                </label><br>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required><br><br>
                            </div>
                            <div class="col-6">
                                <label for="password">
                                    <p style="font-size:25px;"><i>Password</i></p>
                                </label><br>
                                <input type="password" class="form-control" id="pass" placeholder="Password" required><br>
                            </div>
                        </div>
                        <div class="row justify-content-center mx-auto">
                            <div class="col-6">
                                <label for="pfp">
                                    <p style="font-size:25px;"><i>Profile Picture</i></p>
                                </label><br>
                                <input id="pfp" type="file" name="pfp" required accept="image/png, image/jpeg"/><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="d-grid gap-0 col-4 mx-auto">
                <button type="submit" class="btn btn-outline-success btn-block" id="registerButton">Register</button>
            </div>
        </form>
        <div class="d-grid gap-0 col-4 mx-auto">
                <button onclick="formReset()" class="btn btn-outline-warning btn-block" id="clearButton">Clear Entry</button>
            </div>
            </div> 
</body>
<script>
    //Form validation 
    var loggedIn = false;
    document.getElementById("registerButton").addEventListener("click", function () {
        var email = document.getElementById("email").value.trim();
        var pass = document.getElementById("pass").value.trim();
        var fname = document.getElementById("fname").value.trim();
        var lname = document.getElementById("lname").value.trim();
        var pfp = document.getElementById("pfp").value;
        if (email === "" && pass === "") {
            alert("Unable to Register: Email, Password and Name fields cannot be left blank.");
        } else if (email === "") {
            alert("Unable to Register: Email field cannot be left blank.");
        } else if (pass === "") {
            alert("Unable to Register: Password field cannot be left blank.");
        } else if (fname === "" || lname === "") {
            alert("Unable to Register: Name field cannot be left blank.");
        }
    });
    function formReset() {
        //reset form
        if (confirm("Are you sure you want to clear the form? Your information will not be saved if you continue.") == true) {
            document.getElementById("registerForm").reset();
        }
    }
    function addUser(){
        var email = document.getElementById("email").value.trim();
        var pass = document.getElementById("pass").value.trim();
        var fname = document.getElementById("fname").value.trim();
        var lname = document.getElementById("lname").value.trim();
        var pfp = document.getElementById("pfp").value;
        alert(pfp);
        return true;
    }
</script>

</html>