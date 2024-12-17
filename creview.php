<?php

$conn = new mysqli("localhost","root","","book_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST["customer_name"];
    $book_info = $_POST["book_info"];
    $customer_evaluation = $_POST["customer_evaluation"];
    $star_rating = $_POST["star_rating"];
    $review_date = $_POST["review_date"];

    $insert = "INSERT INTO customer_reviews (book_info, star_rating, customer_name, customer_evaluation, review_date) VALUES (?, ?, ?, ?, ?)";
    $preparation = $conn->prepare($insert);
    $preparation->bind_param("sisss", $book_info, $star_rating, $customer_name, $customer_evaluation, $review_date);

    if ($preparation->execute()) {
        echo "New review added successfully.";
    } else {
        echo "Error: " . $statement->error;
    }

    $preparation->close();
}

$query = "SELECT * FROM customer_reviews ORDER BY review_date DESC limit 6";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer review</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="creview.css">
</head>
<header>
    <nav>
        <a href="mainpage2.php"><img class="logo" src="pics/logogo.svg" alt="Logo"></a>
        <ul><li><a class="love" href="#">| We love books</a></li></ul>
        <ul class="nav-links">
            <li><a href="execution.php">Orders</a></li>
            <li><a href="creview.php">Customer Reviews</a></li>
            <li><a href="blog.php">Blog</a></li>
            <a class="btn" href="operation2.php"><button class="reg">Register</button></a>
            <a class="userlink" href="user2.php"><i class="fa fa-user"></i></a>
            <a class="userlink"href="order_p.php"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </nav>
</header>
<body>
    <section class="texts">
    <h3 class="care">We Care About Our Customer Experience And Opinion</h3>
    <h4 class="text">What our clients say about books?</h4>
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
            <div class="viewbtn">
    <a class="see" href="commentp.php"><button class="view">See more</a></button>
</div>

    
    </section>
    <div class="container">
        <h2 class="second">We Appreciate Your Feedback</h2>
        <h4 class="third">We are always looking for ways to improve your experience. Please take a moment to evaluate and tell us what you think</h4>
        <form id="reviewform" method="POST" action="">
            <div class="form-group">
                <label for="customer_name">Name:</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="book_info">Book Information:</label>
                <input type="text" name="book_info" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="customer_evaluation">Evaluation:</label>
                <textarea name="customer_evaluation" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="star_rating">Rating:</label>
                <select name="star_rating" class="form-control" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            <div class="form-group">
                <label for="review_date">Review Date:</label>
                <input type="date" name="review_date" class="form-control" required>
            </div>
            <button type="submit" class="button2">Submit Review</button>
        </form>
    </div>
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
       <a href="https://www.apple.com/app-store/"><button class="go">GO TO APPSTORE</button></a>
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
                <li><a href="blog.php">Blog</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>| Help & Contacts</h4>
            <ul>
                <li><i class="fa fa-phone"></i><a href="mainpage2.php">87055057027</a></li>
                <li><i class="fa fa-clock"></i><a href="">Mo-Fri, 9AM to 11 PM</a></li>
                <li><i class="fa fa-envelope"></i><a href="">qqbook@mail.ru</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h5 class="question">If you have questions, you can contact us or we will do it for you.</h5>
            <button class="btns">Request a call</button>
            <div class="card-icons">
                <a href="https://www.visa.com.kz/"><i class="fa fa-cc-visa"></i></a>
                <a href="https://www.mastercard.kz/ru-kz.html"><i class="fa fa-cc-mastercard"></i></a>
            </div>
        </div>
    </div>
    <hr><h6>All Rights Reserved 2024</h6></hr>
</footer>

</body>
</html>
