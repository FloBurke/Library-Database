<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
<form action="searchbook.php" method="post">
    
    Genre:<select name="genre">
            <option value="Horror">Horror</option>
            <option value="Classic">Classic</option>
            <option value="Non-Fiction">Non-fiction</option>
            <option value="Kids">Kids</option>
            <option value="Y-A">Yound-Adult</option>
            <option value="Comedy">Comedy</option>
        </select>
        <input type="submit" value="search"><br>
</form>
<form action="searchauthor.php" method="post">
    
    Author:<select name="author">
    <?php
    session_start();
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT DISTINCT Author FROM Tblbooks ORDER BY Author ASC");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo('<option value='.$row["Author"].'>'.$row["Author"].'</option>');
        }
    ?>

        </select>
        <input type="submit" value="search"><br>
</form>
</body>
</html>