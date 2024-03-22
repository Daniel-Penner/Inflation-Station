<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>Product - Inflation Station</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/indvproduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootsrap 5-->
</head>

<body>
    <?php
    // Database connection
    try{
        $connectionString = "mysql:host=localhost;dbname=db_54925359"; 
        $username = "54925359";
        $password = "54925359"; 

        // Create connection
        $pdo = new PDO($connectionString, $username, $password);


        // SQL query to fetch posts data with author information
        
        $sql = "SELECT * FROM product WHERE productId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_GET['prod']);
        $statement->execute();
          $row = $statement->fetch();
        $name = $row['productName'];
        $price = $row['productPrice'];
        $image = $row['productImageURL'];
        $desc = $row['productDesc'];


        }
        catch(PDOException $e){
          die($e->getMessage());
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
                                        <img src="images/islogo.webp" alt="" width="30" height="30">
                                    </a>';
                                    }
                                    ?>
                                    <a class="nav-link" href="index.php">Home</a>
                                    <a class="nav-link" href="about.php">About</a>
                                    <a class="nav-link" href="contact.php">Contact</a>
                                    <a class="nav-link" href="products.php">Products</a>
                                    <a class="nav-link" href="search.php">Explore</a>
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
            <h5 style="text-align:center; color:white; font-size:50px;"><?php echo $name;?></h5>
        </div>
    </header>
    <br>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-3">
                <!--Right Bar-->
                <div class="sidecol">
                    <p style="font-size:25px; color:white;"><strong>Reviews</strong></p>
                    <hr style="color:white; height:8px;" />
                    <nav>
                        <ul>


                        </ul>
                    </nav>
                </div>

                <!--Left Bar-->
            </div>
            <div class="col-6">
                <img src="<?php echo $image;?>" class="productimage">
            </div>
            <div class="col-3">
                <div class="sidecol">
                    <p style="font-size:25px; color:white;"><strong>Information</strong></p>
                    <hr style="color:white; height:8px;" />
                    <div class=incol>
                        <li>Price: $<?php echo $price;?>/lb</li>
                        <li>Description: <?php echo $desc;?></li>
                    </div>
                    <br>
                    <p style="font-size:25px; color:white;"><strong>Price Change</strong></p>
                    <hr style="color:white; height:8px;" />
                    <div class=incol>
                        <li>Daily: <p style="color:red">+$0.05</p>
                        </li>
                        <li>Weekly: <p style="color:red">+$0.07</p>
                        </li>
                        <li>Monthly: <p style="color:rgb(0, 255, 0)">-$0.10</p>
                        </li>
                        <li>Annual: <p style="color:red">+$0.02</p>
                        </li>
                    </div>
                    <br>
                    <p style="font-size:25px; color:white;"><strong>Get Alerts</strong></p>
                    <hr style="color:white; height:8px;" />
                    <a href="#" class="button">More Info</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="mx-auto hotcol">
        <p style="font-size:25px; color:white;"><strong>Price Tracker:</strong></p>
        <hr style="color:white; height:8px;" />
        <img src="images/graph.png">
    </div>
</body>

</html>