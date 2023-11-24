<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>

<form action="addbooks.php" method="post">
    Author:<input type="text" name="author"><br>
    Title:<input type="text" name="title"><br>
    Genre:<select name="genre">
            <option value="Horror">Horror</option>
            <option value="Classic">Classic</option>
            <option value="Non-Fiction">Non-fiction</option>
            <option value="Kids">Kids</option>
            <option value="Y-A">Yound-Adult</option>
            <option value="Comedy">Comedy</option>
        </select>
        <input type="submit" value="Add User">
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM TblBooks");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["Author"].' '.$row["Title"].' - '.$row["genre"]."<br>");
}
?>