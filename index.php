<!DOCTYPE html>
<html>

<head>
    <title>Home - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
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
            <h5 style="text-align:center; color:white; font-size:50px;">Inflation Station</h5>
        </div>
    </header>
    <br>
    <p style="font-size:150%;"><a href="login.php">Log in</a></p>
    <p style="font-size:150%;">|</p>
    <p style="font-size:150%;">Log out</p>
    <br><br>
    <div class="container justify-content-center">
        <div class="row">
          <div class="col-3">
            <div class="sidecol"><p style="font-size:25px; color:white;"><strong>Top Reviews</strong></p><hr style="color:white; height:8px;"/></div>
          </div>
          <div class="col-6">
            <img src="images/grocery.jpeg" class="img2">   
          </div>
          <div class="col-3">
            <div class="sidecol"><p style="font-size:25px; color:white;"><strong>News</strong></p><hr style="color:white; height:8px;"/></div>
          </div>
      </div>
    </div>
    <br>
    <div class="container-fluid">
    <div class="mx-auto hotcol">
        <div class="row justify-content-center mx-auto">
        <p style="font-size:25px; color:white;"><strong>Trending Products</strong></p><hr style="color:white; height:8px;"/>
        <div class="col-3">
            <div class="itembox"></div>
            <br>
        </div>
        <div class="col-3">
            <div class="itembox"></div>
            <br>
        </div>
        <div class="col-3">
            <div class="itembox"></div>
            <br>
        </div>
        <div class="col-3">
            <div class="itembox"></div>
            <br>
        </div>
        </div>
    </div>
</div>
        <img src="images/tgrass.png" style="width:1522px; height:300px;">
</body>
</html>