<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblpeople WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    if($row['Password']== $_POST['Passwd']){
        $_SESSION['name']=$row["surname"];
        header('Location: search.php');
    }else{

        header('Location: login.php');
    }
}
$conn=null;
?>