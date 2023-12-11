<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblpeople WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed= $row['Password'];
    $attempt= $_POST['Passwd'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['loggedinuserid']=$row["PersonID"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "search.php"; //Sets a default destination if no BackURL set (parent dir)
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
    }else{
        echo("no");
        //header('Location: login.php');
    }

}
$conn=null;
?>