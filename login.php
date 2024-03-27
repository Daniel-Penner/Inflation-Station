<?php
session_start();
?>
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
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if (!empty($_POST['email'])){
            try{
                $connectionString = "mysql:host=localhost;dbname=db_54925359"; 
                $username = "54925359";
                $password = "54925359"; 
        
                // Create connection
                $pdo = new PDO($connectionString, $username, $password);
                $existingEmail = false;
                $fileContent=file_get_contents($_POST['pfp']);
                $sql = "SELECT customerId, email, fname, password, profilePicture, customerType FROM customer";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $emailMatch = false;
                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                  {
                    if($_POST['email'] == $row['email']){
                        $emailMatch = true;
                        if($_POST['password']==$row['password']){
                            $_SESSION['pfp'] = $row['profilePicture'];
                            if(!is_null($row['customerType'])) {
                                $_SESSION['type'] = $row['customerType'];
                            }
                            $_SESSION['id'] = $row['customerId'];
                            $_SESSION['fname'] = $row['fname'];
                        }
                        else{
                            echo "<script>alert('Unable to Log in: Email and Password do not match.')</script>";
                        }
                    }
                    
                  }
                  if (!$emailMatch){
                    echo "<script>alert('Unable to Log in: Email and Password do not match.')</script>";
                }
        }
                catch(PDOException $e){
                    die($e->getMessage());
                  }
            }
        }        
    ?>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="navborder">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light navround">
                            <div class="container-fluid">
                                <div class="navbar-nav">
                                <?php 
                                    if(isset($_SESSION['id'])) {
                                    echo '<a class="navbar-brand" href="profile.php">
                                        <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['pfp']).'" alt="" width="30" height="30" style="border: 1px black solid; border-radius: 50%;">
                                    </a>';
                                    }
                                    ?>
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="products.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
                                    <?php
                                    if(isset($_SESSION['type'])) {
                                        echo '<a class="nav-link" style="color: rgb(232, 39, 39);" href="admindashboard.php">Admin</a>';
                                    }
                                    ?>
                                </div>
                                <form class="d-flex" action="products.php" method="get">
                                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
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
    <form method="POST" action="login.php" id="loginForm">
        <fieldset>
            <br>
            <div class="row justify-content-center mx-auto">
                <div class="col-4">
                    <label for="email">
                        <p style="font-size:25px;"><i>Email</i></p>
                    </label><br>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required><br>
                </div>
            </div>
            <div class="row justify-content-center mx-auto">
                <div class="col-4">
                    <label for="password">
                        <p style="font-size:25px;"><i>Password</i></p>
                    </label><br>
                    <input type="password" name ="password" class="form-control" id="pass" placeholder="Password" required><br>
                </div>
            </div>
        </fieldset>

    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="d-grid gap-0 col-3 mx-auto">
                <button type ="submit" class="btn btn-outline-success btn-block" id="loginButton">Login</button>
            </div>
            <div class="d-grid gap-0 col-3 mx-auto">
                <button onclick="formReset()" class="btn btn-outline-warning btn-block" id="loginButton">Clear Entry</button>
            </div>
            <p style="text-align:center;">First time?</p>
            <div class="d-grid gap-2 col-3 mx-auto">
                <a href="register.php" class="btn btn-outline-success btn-block">Register</a>
            </div>
        </div>
    </div>
    </form>
</body>
<script>
    //Form validation - Name: loginForm
    var loggedIn = false;
    document.getElementById("loginButton").addEventListener("click", function () {
        var email = document.getElementById("email").value.trim();
        var pass = document.getElementById("pass").value.trim();
        if (email === "" && pass === "") {
            alert("Unable to Log in: Email and Password field cannot be left blank.");
        } else if (email === "") {
            alert("Unable to Log in: Email field cannot be left blank.");
        } else if (pass === "") {
            alert("Unable to Log in: Password field cannot be left blank.");
        }
    });
    function formReset() {
        //reset form
        if (confirm("Are you sure you want to clear the form? Your information will not be saved if you continue.") == true) {
            document.getElementById("loginForm").reset();
        }
    }
</script>

</html>