<?php
session_start();
include_once("connection.php");
    
//print_r($_POST);
$stmt = $conn->prepare("SELECT * FROM tblbooks WHERE Genre=:genre");
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["Title"].' '.$row["Author"]."<br>");
}
?>