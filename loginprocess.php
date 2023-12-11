<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblpeople WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row["Surname"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "/"; //Sets a default destination if no BackURL set (parent dir)
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        header('Location: login.php');
    }

}
$conn=null;
?>