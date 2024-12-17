<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "book_web";


$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $insert = "INSERT INTO contact(`name`, `email`) VALUES ('$name', '$email')";

    if ($conn->query($insert) === TRUE) {
        echo "Success!";
    } else {
        echo "Nup: " . $conn->error;
    }
}

$conn->close();
?>
