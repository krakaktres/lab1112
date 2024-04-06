<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student System</h1>
    <h2>Student Info</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Phonenumber</th>
            <th>Action</th>
        </tr>
        <?php
        // Establishing database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "harorot";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM students";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Course'] . "</td>";
                echo "<td>" . $row['Phonenumber'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a> |
                        <a href='delete.php?id=".$row['id']."' class='delete-link'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books available</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>

    <h2>Add New Student</h2>
    <<form action="add.php" method="post">
    <label for="Name">Name:</label>
    <input type="text" name="Name" required><br>
    <label for="Course">Course:</label>
    <input type="text" name="Course" required><br>
    <label for="Phonenumber">Phonenumber:</label>
    <input type="text" name="Phonenumber" required><br>
    <button type="submit">Add Student</button>
</form>

</body>
</html>