<?php
session_start();
$conn = new mysqli("localhost", "root", "", "book_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['customer_id'])) {
    die("Customer not logged in.");
}

$customer_id = $_SESSION['customer_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $customer_fullname = $conn->real_escape_string($_POST['customer_fullname']);
    $phone_num = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $country = $conn->real_escape_string($_POST['country']);
    $password = $conn->real_escape_string($_POST['password']);
    $hidden_password = password_hash($password, PASSWORD_DEFAULT);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $files = "image/";
        $target_file = $files . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO registration (customer_fullname, phone_number, address, country, customer_image, password) 
                    VALUES ('$customer_fullname', '$phone_num', '$address', '$country', '$target_file', '$password')"; 
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
}

$select = $conn->query("SELECT customer_fullname, address, country, phone_number, customer_image, password FROM registration WHERE customer_id='$customer_id'");

if ($select->num_rows > 0) {
    $fetch = $select->fetch_assoc();
} else {
    die("Customer data not found.");
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="privacy.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
<header>
    <nav>
        <img class="logo" src="image/logogo.svg" alt="Logo">
        <ul><li><a class="love" href="#">| We love books</a></li></ul>
        <ul class="nav-links">
            <li><a class="line" href="#">Orders</a></li>
            <li><a class="line" href="customer_reviews/review.html">Customer Reviews</a></li>
            <li><a class="line" href="blog/blog.html">Blog</a></li>
            <a href="sent.php"><button class="reg">Register</button></a>
            <a href="user2.php"><i class="fa fa-user"></i></a>
            <a href="order_p.php"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </nav>
</header>
<div class="container">
    <div class="profile">
        <div class="profile-info">
            <img class="profile-image" src="<?php echo $fetch['customer_image']; ?>" alt="Customer Image">
            <div class="text-info">
                    <strong>Password:</strong>
                    <input type="password" id="password" value="<?php echo $fetch['password']; ?>" readonly>
                    <input type="checkbox" id="togglePassword"> Show Password
                </p>
            </div>
        </div>
        <div class="all">
            <a href="privacy.php"><button class="btns">View personal information</button></a>
            <a href="operation2.php"><button class="btns">Leave account</button></a>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('change', function() {
        var passwordField = document.getElementById('password');
        if (this.checked) {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });
</script>
</body>
</html>
