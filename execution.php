<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "book_web");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

if (isset($_POST['add_product'])) {
    $order_id = mysqli_real_escape_string($connect, $_POST['order_id']);
    $bookn = mysqli_real_escape_string($connect, $_POST['book_name']);
    $customern = mysqli_real_escape_string($connect, $_POST['customer_name']);
    $quantity = $_POST['quantity'];
    $order_date = mysqli_real_escape_string($connect, $_POST['order_date']);
    $t_amount = $_POST['total_amount'];
    $ship_add = mysqli_real_escape_string($connect, $_POST['shipping_address']);
    $pay_method = mysqli_real_escape_string($connect, $_POST['payment_method']);
    $tracking_num = mysqli_real_escape_string($connect, $_POST['tracking_number']);
    $image = $_FILES['image']['name'];
    $img_folder = 'image/' . basename($_FILES['image']['name']);
    $insert = "INSERT INTO customer_order (book_name, customer_name, image, quantity, order_date, total_amount, shipping_address, payment_method, tracking_number) VALUES ('$bookn', '$customern', '$image', $quantity, '$order_date', $t_amount, '$ship_add', '$pay_method', '$tracking_num')";
    
    if (mysqli_query($connect, $insert)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $img_folder)) {
            $message = 'New product added';
        } else {
            $message = 'Failed to upload image';
        }
    } else {
        $message = 'No product added: ' . mysqli_error($connect);
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="execution.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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

    <?php
    $select = mysqli_query($connect, "SELECT * FROM customer_order");
    ?>
    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <td>Order id</td>
                    <td>Book Name</td>
                    <td>Customer Name</td>
                    <td>Book Image</td>
                    <td>Quantity</td>
                    <td>Order Date</td>
                    <td>Expected date</td>
                    <td>Total Amount</td>
                    <td>Shipping Address</td>
                    <td>Payment Method</td>
                    <td>Tracking Number</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><img src="pics/<?php echo $row['image']; ?>" height="100" alt="Book Image"></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['expected_date']; ?></td>
                    <td><?php echo $row['total_amount']; ?></td>
                    <td><?php echo $row['shipping_address']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['tracking_number']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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
