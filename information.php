<?php
session_start();
$conn = new mysqli("localhost", "root", "", "book_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$book_id = $_GET['book_id'];

if (!is_numeric($book_id)) {
    die("Invalid book ID.");
}


$search = $conn->prepare("SELECT * FROM book_information WHERE book_id = ?");
$search->bind_param("i", $book_id);
$search->execute();
$result = $search->get_result();

if ($result->num_rows > 0) {
    $fetch = $result->fetch_assoc();
} else {
    die("No book"); 
}

$search->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="information2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information about book</title>
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
           <a href="user3.php"><i class="fa fa-user"></i></a>
          <a href="order_p.php"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </nav>
</header>

<body>
    <div class="information">
        <div class="containerr">
            <img class="images" src="pics/<?php echo ($fetch['book_image']); ?>" alt="Book Image" style="width: 250px; height: 350px;margin-bottom:50px;">
            
            <div class="text"><h3>Title: <?php echo ($fetch['title']); ?></h3>
            <h3>Author: <?php echo ($fetch['author']); ?></h3>
            <h3>Genre: <?php echo ($fetch['genre']); ?></h3>
            <h3>Release date: <?php echo ($fetch['release_date']); ?></h3>
            <h3>ISBN: <?php echo ($fetch['isbn']); ?></h3>
            <h3>Description: <?php echo ($fetch['description']); ?></h3>
            <h3 class="money"><span>Price:</span> <?php echo ($fetch['price']); ?></h3>
            <a href="order_p.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order Now</button></a>
</div>
    </div>
    
    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-logo-section">
                <img class="logo2" src="pics/logogo2.svg" alt="Logo">
                <div class="socials">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>| For Customer</h4>
                <ul>
                    <li><a href="order_p.php">Orders</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>| Quick Links</h4>
                <ul>
                    <li><a href="blog.php">Blog</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>| Help & Contacts</h4>
                <ul>
                    <li><i class="fa fa-phone"></i><a href="#">87055057027</a></li>
                    <li><i class="fa fa-clock"></i><a href="#">Mo-Fri, 9AM to 11 PM</a></li>
                    <li><i class="fa fa-envelope"></i><a href="#">qqbook@mail.ru</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5 class="question">If you have questions, you can contact us or we will do it for you.</h5>
                <button class="btns">Request a call</button>
                <div class="card-icons">
                    <a href="https://www.visa.com.kz/"><i class="fa fa-cc-visa"></i></a>
                    <a href="https://www.mastercard.kz/"><i class="fa fa-cc-mastercard"></i></a>
                </div>
            </div>
        </div>
        <hr><h6 class="rights">All Rights Reserved 2024</h6></hr>
    </footer>
</body>
</html>
