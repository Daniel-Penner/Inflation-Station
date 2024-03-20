<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <title>Contact - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootsrap 5-->
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
                                    <a class="nav-link" href="index.html">Home</a>
                                    <a class="nav-link" href="about.html">About</a>
                                    <a class="nav-link" href="contact.html">Contact</a>
                                    <a class="nav-link" href="products.html">Products</a>
                                    <a class="nav-link" href="search.html">Explore</a>
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
            <h5 style="text-align:center; color:white; font-size:50px;">Contact Us</h5>
        </div>
        
    </header>
    <form method="GET" id="contactForm">
        <fieldset>
            <br>
            <div class="container-fluid">
                <div class="mx-auto hotcol">
            <div class="row justify-content-center mx-auto">
                <div class="col-4">
                    <label for="email">
                        <p style="font-size:30px;"><i>Email</i></p>
                    </label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
            </div>
            <br>
                <div class="row justify-content-center mx-auto">
                <div class="col-4">
                    <label for="msg">
                        <p style="font-size:30px;"><i>Message</i></p>
                    </label><br>
                    <textarea class="form-control" id="msg" rows="10" placeholder="How can we help?" required></textarea><br><br>
                </div>
                </div>
                <div class="row justify-content-center mx-auto">
                        <div class="d-grid gap-0 col-3 mx-auto">
                        <button class="btn btn-outline-success btn-block" id="submitButton">Submit</button>
                        </div>
                    </div>
                        </div>
               
                </div>
                </div>
        </fieldset>
    </form>
</body>
</html>