<?php
// Database connection details
$host = "localhost";  // Your database host
$dbname = "hms";  // Your database name
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback data
$sql = "SELECT id, name, email, rating, comments, submission_date FROM tblfeedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
}

h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden; /* Ensures rounded corners are visible */
}

thead {
    background-color: #00bfa5;
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    font-weight: bold;
    font-size: 16px;
}

tbody tr {
    background-color: #fff;
    transition: background-color 0.3s;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

tbody tr td {
    font-size: 14px;
    color: #555;
}

.btn {
    display: inline-block;
    background-color: #00bfa5;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-top: 20px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #009f89;
}

    </style>
</head>
<body>

<h2>Feedbacks</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Comments</th>
            <th>Submission Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['rating']}</td>
                        <td>{$row['comments']}</td>
                        <td>{$row['submission_date']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No feedback found.</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
