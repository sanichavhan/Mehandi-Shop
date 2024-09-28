<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mehandi Shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $age = (int) $_POST['age']; // Cast to integer for safety
    $email = $conn->real_escape_string($_POST['email']);
    $mobile = $conn->real_escape_string($_POST['mobile']);

    // SQL query to insert data into the table
    $sql = "INSERT INTO enquiry (name,age,email,mobile)
            VALUES ('$name', $age, '$email', '$mobile')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
