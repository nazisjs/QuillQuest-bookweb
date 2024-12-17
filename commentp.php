<?php

$conn = new mysqli("localhost","root","","book_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $customer_name = $_POST["customer_name"];
    $book_info = $_POST["book_info"];
    $customer_evaluation = $_POST["customer_evaluation"];
    $star_rating = $_POST["star_rating"];
    $review_date = $_POST["review_date"];

    $query = "INSERT INTO customer_reviews (book_info, star_rating, customer_name, customer_evaluation, review_date) VALUES (?, ?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("sisss", $book_info, $star_rating, $customer_name, $customer_evaluation, $review_date);

    if ($statement->execute()) {
        echo "New review added successfully.";
    } else {
        echo "Error: " . $statement->error;
    }

    $statement->close();
}

$query = "SELECT * FROM customer_reviews ORDER BY review_date ASC ";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="commentp.css">
</head>
<header>
    <nav>
        <img class="logo" src="pics/logogo.svg" alt="Logo">
        <ul><li><a class="love" href="#">| We love books</a></li></ul>
        <ul class="nav-links">
            <li><a href="#">Orders</a></li>
            <li><a href="#">Customer Reviews</a></li>
            <li><a href="#">Blog</a></li>
            <button class="reg">Register</button>
           <i class="fa fa-user"></i>
           <i class="fa fa-shopping-cart"></i>
        </ul>
    </nav>
</header>
<body>
    <section class="texts">
    <h3 class="care">Dive into the opinions</h3>
            <?php
            if ($result->num_rows > 0) {
                while ($review = $result->fetch_assoc()) {
                    echo "
                        <div class='card mb-5' style='background-color:#fff;'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$review['customer_name']}</h5>
                                <h6 class='card-subtitle mb-2 text-muted text-left text-black'>{$review['book_info']}</h6>
                                <p class='card-text'>{$review['customer_evaluation']}</p>
                                <div class='text-warning'>" . str_repeat('★', $review['star_rating']) . str_repeat('☆', 5 - $review['star_rating']) . "</div>
                                <h6 class='text'>{$review['review_date']}</h6>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "No reviews found.";
            }
            ?>
    </section>
    <section class="place">
    <div class="content">
        <h1 class="firstone">IN ONE PLACE</h1>
        <p class="thirdone">
            Purchasing books is more than just buying; it's about building a meaningful collection. 
            First, consider the purpose: are you buying for education or entertainment? Educational 
            books should be authoritative and current, while entertainment books should be enjoyable 
            and enriching. Think about long-term value — classics and well-regarded non-fiction often 
            remain valuable over time.
        </p>
        <button class="go">GO TO APPSTORE</button>
    </div>
    <img src="pics/mockup.png" alt="Mockup Image">
</section>
       
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
                <li><a href="#">Orders</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>| Quick Links</h4>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About Us</a></li>
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
                <a href="#"><i class="fa fa-cc-visa"></i></a>
                <a href="#"><i class="fa fa-cc-mastercard"></i></a>
            </div>
        </div>
    </div>
    <hr><h6>All Rights Reserved 2024</h6></hr>
</footer>

</body>
</html>
