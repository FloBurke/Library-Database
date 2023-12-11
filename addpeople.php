<?php
session_start();
if (!isset($_SESSION['loggedinuserid']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}

try{
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO TblPeople (PersonID,Gender,Surname,Forename,Password)VALUES (null,:gender,:surname,:forename,:password)");

    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->execute();
}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
$conn=null;
header('Location: people.php');

?>