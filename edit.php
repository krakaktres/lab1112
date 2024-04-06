<?php
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Course = $_POST['Course'];
    $Phonenumber = $_POST['Phonenumber'];

    $updateQuery = "UPDATE students SET Name = '$Name', Course = '$Course', Phonenumber = '$Phonenumber' WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Student Information</h1>
    <form action="" method="post">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required><br>
        <label for="Course">Course:</label>
        <input type="text" name="Course" value="<?php echo $row['Course']; ?>" required><br>
        <label for="Phonenumber">Phone Number:</label>
        <input type="text" name="Phonenumber" value="<?php echo $row['Phonenumber']; ?>" required><br>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>
