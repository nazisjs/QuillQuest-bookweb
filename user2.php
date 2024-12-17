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
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="userinfor.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<header>
    <nav>
        <a href="mainpage2.php"><img class="logo" src="pics/logogo.svg" alt="Logo"></a>
        <ul><li><a class="love" href="#">| We love books</a></li></ul>
        <ul class="nav-links">
            <li><a class="line" href="">Orders</a></li>
            <li><a class="line" href="C:\Users\Murat\Desktop\web\customer_reviews\review.html">Customer Reviews</a></li>
            <li><a class="line" href="C:\Users\Murat\Desktop\web\blog\blog.html">Blog</a></li>
            <a href="operation2.php"><button class="reg">Register</button></a>
           <a href="user2.php"><i class="fa fa-user"></i></a>
           <a href="order_p.php"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </nav>
</header>
<body>
    <div class="container">
        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT customer_fullname, address, phone_number, customer_image,password FROM registration WHERE customer_id='$customer_id'");

            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            } 
            ?>
                <h1>It's pleasant to see you here again! </h1>
            <div class="profile-info">
            <img class="profile-image" src="<?php echo $fetch['customer_image']; ?>" alt="Customer Image">
                <div class="text-info">
                    <p><strong>Name:</strong> <?php echo $fetch['customer_fullname']; ?></p>
                </div>
            </div>
            <div class="all">
                <a href="privacy.php"><button class="btns">View personal information</button></a>
                <?php exit() ?> <a href="operation2.php"><button class="btns">Leave account</button></a>
            </div>
        </div>
    </div>
</body>
</html>
