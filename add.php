<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Course = $_POST['Course'];
    $Phonenumber = $_POST['Phonenumber'];

    $insertQuery = "INSERT INTO students (Name, Course, Phonenumber) VALUES ('$Name', '$Course', '$Phonenumber')";

    if (mysqli_query($conn, $insertQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
