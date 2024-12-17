<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="searches.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Search</title>
</head>
<body>
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
<section class="explore">
    <h1 class="first">EXPLORE NUMEROUS KIND OF BOOKS</h1>
    <div class="input-wrapper">
        <div class="input-container">
            <form id="searchForm" method="post" action="">
                <div class="input-group">
                    <input type="text" name="search_text" id="search_text" placeholder="Enter preferred book.." class="form-control" />
                    <button type="submit" class="input-group-addon">&#10094;</button>
                </div>
                <div class="filtrate">
                    <div class="filtration">
                        <ul class="one">
                            <li data-category="Science Fiction">Science Fiction</li>
                            <li data-category="Novel">Novel</li>
                            <li data-category="Romance">Romance</li>
                            <li data-category="Detective">Detective</li>
                            <li data-category="Crime">Crime</li>
                            <li data-category="Fantasy">Fantasy</li>
                            <li data-category="Adventure">Adventure</li>
                            <li data-category="History">History</li>
                            <li data-category="Tragedy">Tragedy</li>
                            <li data-category="Psychology">Psychology</li>
                            <li data-category="Fiction">Fiction</li>
                            <li data-category="Poem">Poem</li>
                            <li data-category="all">All</li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" name="category" id="category" value="all">
                
            </form>
        </div>
    </div>
</section>

</div>
</div>
</div>
<div  class="container book-grid">
    <?php
    $connect = mysqli_connect("localhost", "root", "", "book_web");

    $search_text = '';
    $category = 'all';

    if (isset($_POST['search_text'])) {
        $search_text = mysqli_real_escape_string($connect, $_POST['search_text']);
    }

    if (isset($_POST['category'])) {
        $category = mysqli_real_escape_string($connect, $_POST['category']);
    }

    $query = "SELECT * FROM book_information WHERE title LIKE '%$search_text%'";
    if ($category != 'all') {
        $query .= " AND genre = '$category'";
    }

    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="book-container" style="display:grid; grid-template-columns:repeat(4,1fr);">';
        echo '<div class="book-info">';
        echo '<img src="pics/' .$row["book_image"] . '" alt="Book Image">';
        echo '<h6 class="money">' . $row["price"] . '</h6>';
        echo '<h5 class="text">' . $row["genre"] . '</h5>';
        echo '<h5 class="text">' . $row["title"] . '</h5>';
        echo '<h6 class="author">' .$row["author"] . '</h6>';
        echo '<a class="links" href="information.php?book_id=' . $row["book_id"] . '"><button class="btnn">View More</button></a>';
        echo '<a class="links" href="order_p.php?book_id=' . $row["book_id"] . '"><button class="btnn">Order Now</button></a>';
        echo '</div>';
        echo '</div>';
    }
    $price_filter = '';
if (isset($_POST['price'])) {
    $price_filter = mysqli_real_escape_string($connect, $_POST['price']);
}

if (!empty($price_filter) && $price_filter != 'ALL') {
    $price_ranges = explode(',', $price_filter);
    $price_conditions = [];
    foreach ($price_ranges as $range) {
        [$min, $max] = explode('-', $range);
        $price_conditions[] = "(price BETWEEN $min AND $max)";
    }
    $query .= ' AND (' . implode(' OR ', $price_conditions) . ')';
}

    ?>
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
                <a href="https://www.visa.com.kz/kk_KZ"><i class="fa fa-cc-visa"></i></a>
                <a href="https://www.mastercard.kz/ru-kz.html"><i class="fa fa-cc-mastercard"></i></a>
            </div>
        </div>
    </div>
    <hr><h6 class="rights">All Rights Reserved 2024</h6></hr>
</footer>

<script>
    document.querySelectorAll('.filtration ul.one li').forEach(function(li) {
        li.addEventListener('click', function() {
            document.getElementById('category').value = this.getAttribute('data-category');
            document.getElementById('searchForm').submit();
        });
    });
</script>


</body>
</html>
