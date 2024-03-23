<?php
session_start();
?>
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
    /*
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
        }*/
    ?>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="navborder">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light navround">
                            <div class="container-fluid">
                                <div class="navbar-nav">
                                    <?php /*
                     if(isset($_SESSION['id'])) {
                     echo '<a class="navbar-brand" href="profile.php">
                         <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['pfp']).'" alt="" width="30" height="30" style="border: 1px black solid; border-radius: 50%;">
                     </a>';
                     }*/
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
            <h5 style="text-align:center; color:white; font-size:50px;">
                <?php //echo $name;   ?>
            </h5>
        </div>
    </header>



    <br>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-sm-8"><img src="<?php //echo $image;   ?>" class="productimage"></div>
            <div class="col-sm-4">
                <div class="sidecol">
                    <p style="font-size:25px; color:white;"><strong>Information</strong></p>
                    <hr style="color:white; height:8px;" />
                    <div class=incol>
                        <li>Price: $
                            <?php //echo $price;   ?>/lb
                        </li>
                        <li>Description:
                            <?php //echo $desc;   ?>
                        </li>
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

        <br>
        <div class="container" style="background-color:rgba(127.96927481889725, 158.31250101327896, 130.66644608974457, 1);">
            <div class="row justify-content-center text-center">
                <p style="font-size:25px; color:white;"><strong>Reviews</strong></p>
                <hr style="color:white; height:8px;" />
                <br>
                <div class="card" style="background-color: rgb(182,212,189); max-width: 50rem; border-radius: 1rem; padding: 1rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:white;">Leave a Comment</h5>
                        <form>
                            <div class="form-group text-center" style="max-width: 10rem; margin: 0 auto;">
                                <label for="rating" style="color: white; padding: 0.5rem;">Rating (1-5):</label>
                                <select class="form-control" id="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message" style="color: white; padding: 0.5rem;">Message:</label>
                                <textarea class="form-control" id="message" rows="3"
                                    placeholder="Enter your message"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row" style="max-width:50rem; background-color:rgb(182,212,189); margin: 0 auto; border-radius: 25px; padding: 20px;">
                    <div class="col-auto">
                        <img src="images\apple.jpg" alt="Profile Picture" style="width:2.5rem; border-radius: 5rem; padding 4rem;">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-auto">
                                <span style="color: white;">John Doe</span>
                            </div>
                            <div class="col-auto">
                                <span style="color: white;">5 stars</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                    viverra dui eget nunc efficitur, nec pretium risus varius.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>