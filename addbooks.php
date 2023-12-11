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
    
    $stmt = $conn->prepare("INSERT INTO TblBooks (BookID,Author,Title,Genre)VALUES (null,:author,:title,:genre)");

    $stmt->bindParam(':author', $_POST["author"]);
    $stmt->bindParam(':title', $_POST["title"]);
    $stmt->bindParam(':genre', $_POST["genre"]);
    $stmt->execute();
}
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
$conn=null;
header('Location: books.php');

?>