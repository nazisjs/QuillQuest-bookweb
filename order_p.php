<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "book_web");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_product'])) {
    $bookn = mysqli_real_escape_string($connect, $_POST['book_name']);
    $customern = mysqli_real_escape_string($connect, $_POST['customer_name']);
    $quantity = $_POST['quantity'];
    $order_date = mysqli_real_escape_string($connect, $_POST['order_date']);
    $t_amount = $_POST['total_amount'];
    $ship_add = mysqli_real_escape_string($connect, $_POST['shipping_address']);
    $pay_method = mysqli_real_escape_string($connect, $_POST['payment_method']);
    $tracking_num = mysqli_real_escape_string($connect, $_POST['tracking_number']);
    $image = $_FILES['image']['name'];
    $img_folder = 'pics/' . basename($_FILES['image']['name']);

    $insert = "INSERT INTO customer_order (book_name, customer_name, image, quantity, order_date, total_amount, shipping_address, payment_method, tracking_number) VALUES ('$bookn', '$customern', '$image', $quantity, '$order_date', $t_amount, '$ship_add', '$pay_method', '$tracking_num')";
    
    if (mysqli_query($connect, $insert)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $img_folder)) {
            $message = 'New product added successfully into order navigation';
        } else {
            $message = 'No image';
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
    <link rel="stylesheet" href="order_p.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer review</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="order_p.css">
</head>
<header>
    <nav>
        <a href="mainpage2.php"><img class="logo" src="pics/logogo.svg" alt="Logo"></a>
        <ul><li><a class="love" href="#">| We love books</a></li></ul>
        <ul class="nav-links">
            <li><a href="execution.php">Orders</a></li>
            <li><a href="creview.php">Customer Reviews</a></li>
            <li><a href="blog.php">Blog</a></li>
            <a class="btn2" href="operation2.php"><button class="reg">Register</button></a>
            <a class="userlink" href="user2.php"><i class="fa fa-user"></i></a>
            <a class="userlink"href="order_p.php"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </nav>
</header>
<body>
    <?php if (isset($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <div class="containerr">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Add order details</h3>
                <input type="text" placeholder="Book name?" name="book_name" class="box">
                <input type="text" placeholder="Customer name?" name="customer_name" class="box">
                <input type="file" name="image" class="box">
                <div class="quantity">
                    <button type="button" id="decrease">-</button>
                    <input type="number" placeholder="Quantity?" name="quantity" class="box" id="quantity" min="1" value="1">
                    <button type="button" id="increase">+</button>
                </div>
                <input type="number" placeholder="Price per book?" name="price_per_book" class="box" id="price_per_book" value="700">
                <input type="number" placeholder="Total price?" name="total_amount" class="box" id="total_amount" readonly>
                <input type="date" name="order_date" class="box">
                <input type="text" placeholder="Shipping address?" name="shipping_address" class="box">
                <select name="payment_method" class="box">
                    <option value="VISA">VISA</option>
                    <option value="Kaspi">Kaspi</option>
                    <option value="Mastercard">Mastercard</option>
                </select>
                <h6>Choose tracking number</h6>
                <select name="tracking_number" class="box">
                    <option>567890</option>
                    <option>098765</option>
                    <option>987654</option>
                    <option>565465</option>
                    <option>098765</option>
                    <option>987654</option>
                </select>
                <a href="execution.php"><input type="submit" class="btn" name="add_product" value="Add Product"></a>
                <p class="check">I am committed to take responsibility for tracking and not committed to inquire for a refund</p>
            </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const increaseButton = document.getElementById('increase');
            const decreaseButton = document.getElementById('decrease');
            const quantityInput = document.getElementById('quantity');
            const pricePerBookInput = document.getElementById('price_per_book');
            const totalAmountInput = document.getElementById('total_amount');
            const cartCount = document.getElementById('cart-count');

            function updateTotalAmount() {
                const quantity = parseInt(quantityInput.value);
                const pricePerBook = parseFloat(pricePerBookInput.value);
                const totalAmount = quantity * pricePerBook;
                totalAmountInput.value = totalAmount.toFixed(2);
            }

            increaseButton.addEventListener('click', function () {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateTotalAmount();
            });

            decreaseButton.addEventListener('click', function () {
                if (quantityInput.value > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateTotalAmount();
                }
            });

            quantityInput.addEventListener('input', updateTotalAmount);
            pricePerBookInput.addEventListener('input', updateTotalAmount);

            updateTotalAmount();

           
        });
    </script>
</body>
</html>
