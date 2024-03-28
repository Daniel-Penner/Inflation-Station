<?php
session_start();
try {
    include 'dbconnection.php';
    $location = '';
    $isAdmin = false;
    $changeUserId = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['uuid'])) { // if true the request is sent by admin dashboard
            $changeUserId = $_POST['uuid'];
            $location = "admindashboard.php";
            $isAdmin = true; //if uuid is passed then process is admin 
            echo "<script>alert(" . $changeUserId . ")</script>";

        } elseif (isset($_SESSION['id'])) { // if true then the request is from a regular user changing their information
            $changeUserId = $_SESSION['id'];
            $location = "profile.php";
        }
        if(isset($_POST['isBanned'])){
        //If isBaned == true 
        if(($_POST['isBanned']) == "true") {
        $sql = "UPDATE customer 
        SET isBanned = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, "true");
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        header('Location: admindashboard.php');
        echo "<script>alert('User has been BANNED from Inflation Station.')</script>";
        exit(); //exit if a user is banned, do not update other fields
        } else {
        $sql = "UPDATE customer 
        SET isBanned = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, "false");
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        header('Location: admindashboard.php');
        echo "<script>alert('User has been UNBANNED from Inflation Station.')</script>";
        exit(); //exit if a user is banned, do not update other fields
        }
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
        if($isAdmin == false) {
        $_SESSION['fname'] = $_POST['fname'];
        }
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
        if($isAdmin == false) {
        $_SESSION['lname'] = $_POST['lname'];
        }
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
        if($isAdmin == false) {
        $_SESSION['email'] = $_POST['email'];
        }
        }

        //update password if entered
        if(!empty($_POST['pass'])) {
            $sql = "UPDATE customer 
        SET password = ?
        WHERE customerId = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_POST['pass']);
        $statement->bindValue(2, $changeUserId);
        $statement->execute();
        }

        if($_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
            $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
            $sql = "UPDATE customer 
            SET profilePicture = ?
            WHERE customerId = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(1, $profilePicture, PDO::PARAM_LOB);
            $statement->bindValue(2, $changeUserId);
            $statement->execute();
            if($isAdmin == false) {
            $_SESSION['pfp'] = $profilePicture;
            }
        }
    }
    header('Location: ' . $location);
    echo "<script>alert('Account data successfully updated.')</script>";
    $pdo = null;
    exit();
} catch (PDOException $e) {
    die($e->getMessage());
}
