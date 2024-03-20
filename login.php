<!DOCTYPE html>
<html>

<head>
    <title>Login - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
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
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search"
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
            <h5 style="text-align:center; color:white; font-size:50px;">Login</h5>
        </div>
    </header>
    <form method="GET" id="loginForm">
    <fieldset>
        <br>
        <div class="row justify-content-center mx-auto">
            <div class="col-4">
                <label for="email">
                    <p style="font-size:25px;"><i>Email</i></p>
                </label><br>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required><br>
            </div>
        </div>
            <div class="row justify-content-center mx-auto">
            <div class="col-4">
                <label for="password">
                    <p style="font-size:25px;"><i>Password</i></p>
                </label><br>
                <input type="password" class="form-control" id="pass" placeholder="Password" required><br>
            </div>
            </div>
    </fieldset>
</form>

    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="d-grid gap-0 col-3 mx-auto">
                <button class="btn btn-outline-success btn-block" id="loginButton">Login</button>
            </div>
            <div class="d-grid gap-0 col-3 mx-auto">
                <button onclick="reset()"class="btn btn-outline-warning btn-block" id="loginButton">Clear Entry</button>
            </div>
            <p style="text-align:center;">First time?</p>
            <div class="d-grid gap-2 col-3 mx-auto">
                <a href="register.php" class="btn btn-outline-success btn-block">Register</a>
            </div>
        </div>
    </div>
</body>
<script>
    //Form validation - Name: loginForm
    var loggedIn = false;
    document.getElementById("loginButton").addEventListener("click", function() {
        var email = document.getElementById("email").value.trim();
        var pass = document.getElementById("pass").value.trim();
        if (email === "" && pass === "") {
            alert("Unable to Log in: Email and Password field cannot be left blank.");
        } else if (email === "") {
            alert("Unable to Log in: Email field cannot be left blank.");
        } else if (pass === "") {
            alert("Unable to Log in: Password field cannot be left blank.");
        } else {
            console.log("Email entered:", email, "Password entered: ", pass);
        }
    });
    function reset() {
            //reset form
            if(confirm("Are you sure you want to clear the form? Your information will not be saved if you continue.") == true) {
            document.getElementById("loginForm").reset();
            }
        }
</script>
</html>