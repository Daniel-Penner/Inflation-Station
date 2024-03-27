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

        } elseif (!empty($_SESSION['id'])) { // if true then the request is from a regular user changing their information
            $changeUserId = $_SESSION['id'];
            $location = "profile.php";
        }
        // Update fname if entered
        if(!empty($_POST['fname'])) {
            $sql = "UPDATE customer 
        SET fname = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['fname']);
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        $_SESSION['fname'] = $_POST['fname'];
        }
        //update lname if entered
        if(!empty($_POST['lname'])) {
            $sql = "UPDATE customer 
        SET lname = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['lname']);
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        $_SESSION['lname'] = $_POST['lname'];
        }
        //update email if entered
        if(!empty($_POST['email'])) {
            $sql = "UPDATE customer 
        SET email = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['email']);
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        $_SESSION['email'] = $_POST['email'];
        }
        //update password if entered
        if(!empty($_POST['pass'])) {
            $sql = "UPDATE customer 
        SET password = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, md5($_POST['pass']));
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        }
        if(!empty($_POST['profilePicture'])) {
            $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
            $sql = "UPDATE customer 
            SET profilePicture = NULL
            WHERE customerId = ?";
            $statement = $pdo->prepare($sql);
            //$statement->bindParam(1, $profilePicture, PDO::PARAM_LOB);
            $statement->bindValue(1, $changeUserId);
            $statement->execute();
            $_SESSION['pfp'] = $_POST['profilePicture'];
        }
        //have to update profile picture seperetly as it otherwise violates 
        if($isAdmin == false) {
            
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