<?php
session_start();
try{
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");
    
    $stmt = $conn->prepare("INSERT INTO TblPeople (PersonID,Gender,Surname,Forename,Password)VALUES (null,:gender,:surname,:forename,:password)");

    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':password', $_POST["passwd"]);
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