<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBooks;
CREATE TABLE TblBooks 
(BookID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Author VARCHAR(200) NOT NULL,
Title VARCHAR(200) NOT NULL,
Genre VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPeople;
CREATE TABLE TblPeople
(PersonID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Gender VARCHAR(20) NOT NULL,
Surname VARCHAR(200) NOT NULL,
Forename VARCHAR(200) NOT NULL,
Password VARCHAR(20) NOT NULL);");
$stmt->execute();
$stmt->closeCursor();

//$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSubjects;
//CREATE TABLE TblSubjects
//(SubjectID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//Subjectname VARCHAR(2) NOT NULL,
//Teacher VARCHAR(20) NOT NULL);");
//$stmt->execute();
//$stmt->closeCursor();

//$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupilStudies;
//CREATE TABLE TblPupilStudies
//(Subjectid INT(4),
//Userid INT(5),
//Classposition INT(2),
//Classgrade  CHAR(1),
//Exammark INT(2),
//Comment TEXT,
//PRIMARY KEY(Subjectid,Userid));");
//$stmt->execute();
//$stmt->closeCursor();

?>