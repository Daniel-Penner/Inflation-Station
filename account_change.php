<?php
try {
    include 'dbconnection';
    if (isset($_SESSION['type'])) { //check if admin

    } else { // if user is not admin
        header("Location: index.php");
        exit();
    }
    $changeUserId = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['uuid'])) { // if true the request is sent by admin dashboard
            $changeUserId = $_POST['uuid'];

        } elseif (isset($_SESSION['id'])) { // if true then the request is from a regular user changing their information
            $changeUserId = $_SESSION['id'];
        }
        if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
            header("Location: index.php"); // verify for any empty fields, if empty send them back to the homepage
        } 
        $sql = "UPDATE customer 
        SET fname = ?, lname = ?, email = ?, password = ?, profilePicture = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        
        $statement->bindValue(1, $_POST['fname']);
        $statement->bindValue(2, $_POST['lname']);
        $statement->bindValue(3, $_POST['email']);
        $statement->bindValue(4, $_POST['pass']);
        $statement->bindParam(5, $fileContent, PDO::PARAM_LOB);
        $statement->execute();
    }
} catch (PDOException $e) {
    die($e->getMessage());
}