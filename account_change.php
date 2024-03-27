<?php
session_start();
try {
    include 'dbconnection.php';
    $location = '';
    $isAdmin = false;
    if (isset($_SESSION['type'])) { //check if admin

    } else { // if user is not admin
        header("Location: index.php");
        exit();
    }
    $changeUserId = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['uuid'])) { // if true the request is sent by admin dashboard
            $changeUserId = $_POST['uuid'];
            $location = "admindashboard.php";
            $isAdmin = true; //if uuid is passed then process is admin 

        } elseif (isset($_SESSION['id'])) { // if true then the request is from a regular user changing their information
            $changeUserId = $_SESSION['id'];
            $location = "profile.php";
        }
        $sql = "UPDATE customer 
        SET fname = ?, lname = ?, email = ?, password = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['fname']);
        $statement->bindValue(2, $_POST['lname']);
        $statement->bindValue(3, $_POST['email']);
        $statement->bindValue(4, md5($_POST['pass']));
        $statement->bindValue(5, $changeUserId);
        $statement->execute();
        //have to update profile picture seperetly as it otherwise violates 
        if(isset($_POST['profilePicture'])) {
            $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
            $sql = "UPDATE customer 
            SET profilePicture = ?
            WHERE customerId = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(1, $profilePicture, PDO::PARAM_LOB);
            $statement->bindValue(2, $changeUserId);
            $statement->execute();
        }
        if($isAdmin == false) {
            $_SESSION['pfp'] = $_POST['profilePicture'];
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['email'] = $_POST['email'];
        }
        
    }
    header('Location: ' . $location);
    echo "<script>alert('Account data successfully updated.')</script>";
    exit();
} catch (PDOException $e) {
    die($e->getMessage());
}