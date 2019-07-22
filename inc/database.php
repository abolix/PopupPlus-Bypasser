
<?php
$servername = 'localhost'; // Should be Localhost
$username = 'root'; // Database Username
$password = ''; // Database Password
$dbname = 'counter'; // Database Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>