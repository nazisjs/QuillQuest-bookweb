<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainpage2.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Main page</title>
</head>
<header>
    <nav>
        <a href="mainpage2.php"><img class="logo" src="pics/logogo.svg" alt="Logo"></a>
        <ul><li><a class="love">| We love books</a></li></ul>
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
<div class="banner">
        <img class="banner1" src="pics/bg (1).png" alt="Banner Background">
        <h1 class="text1">THE BOOK OF THE WEEK</h1>
        <p class="text2">Little Women is a coming-of-age novel written by American novelist Louisa May Alcott originally published in two volumes in 1868 and 1869. The story follows the lives of the four March sisters—Meg, Jo, Beth, and Amy—and details their passage from childhood to womanhood. Loosely based on the lives of the author and her three sisters, it is classified as an autobiographical or semi-autobiographical novel.</p>
        <img class="banner2" src="pics/little.png" alt="Little Women Book">
        <div class="input-container">
        <input type="text" name="search_text" id="search_text" placeholder="Enter your text here" class="form-control"/>
        <a href="searches.php"><button class="input-group-addon">&#10094;</button></a>
        </div>
    </div>
    <h1 class="main">Editor's Choice</h1>
    <div class="containerr">
        <div class="slider">
            <div class="slide">
                <img src="pics/agatha13.png" alt="Thirteen Problems">
                <h5 class="title">Thirteen Problems</h5>
                <h5 class="name">Agatha Christie</h5>
                <h6 class="price">₽1065</h6>
               <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>
            </div>
            <div class="slide">
                <img src="pics/dostoyevskiiadole.png" alt="The Adolescent">
                <h5 class="title">The Adolescent</h5>
                <h5 class="name">Fyodor Dostoyevsky</h5>
                <h6 class="price">₽1065</h6>
                <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>


            </div>
            <div class="slide">
                <img src="pics/puskin.jpg" alt="E.O">
                <h5 class="title">Eugene Onegion</h5>
                <h5 class="name">Aleksandr Pushkin</h5>
                <h6 class="price">₽1266</h6>
                <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>


            </div>
            <div class="slide">
                <img src="pics/arthur conan basker.png" alt="Baskerville">
                <h5 class="title">The Hound Of Baskervilles</h5>
                <h5 class="name">Aleksandr Push</h5>
                <h6 class="price">₽2419</h6>
                <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>


            </div>
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    </div>
<h1 class="main">Suggested by Customers</h1>
<div class="containerr2">
    <div class="slider2">
        <div class="slide2">
            <img src="pics/to kill a mockingbird.png" alt="mockingbird">
            <h5 class="title">To Kill A Mockingbird</h5>
            <h5 class="name">Harper Lee</h5>
            <h6 class="price">₽2668</h6>
            <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>

        </div>
        <div class="slide2">
            <img src="pics/da vinci code.png" alt="The Adolescent">
            <h5 class="title">The Da Vinci Code</h5>
            <h5 class="name">Velma Wallis</h5>
            <h6 class="price">₽331</h6>
            <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>
        </div>
        <div class="slide2">
            <img src="pics/Blackberry winter.jpg" alt="Blackberry">
            <h5 class="title">Blackberry Winter</h5>
            <h5 class="name">Sarah Jio  </h5>
            <h6 class="price">₽1266</h6>
            <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>
        </div>
        <div class="slide2">
            <img src="pics/Demian.jpg" alt="Demian">
            <h5 class="title">Demian</h5>
            <h5 class="name">Hermann Hesse</h5>
            <h6 class="price">₽3539</h6>
            <a href="operation2.php"><button class="btnss"><i class="fa fa-shopping-cart"></i> Order now</button></a>

        </div>
    </div>
</div>
<div class="contact-information">
    <div class="content">
        <h1 class="contacts">CONTACT US IF SOMETHING WENT WRONG!</h1>
        <p class="contact_text">We are about books and our purpose is to show you the book who can change your life or distract you from the real world into a better one. Quillquest works with the most popular publishers just for your delight. By submitting, you are consenting to give an update for personal information and accepting the privacy policy of the website.</h4>
        <form class="all" method="POST" action="contact.php">
            <input type="text" placeholder="Your opinion" name="name" required>
            <input type="text" placeholder="Your e-mail" name="email" required>
            <button class="btn3">Submit my answer</button>
        </form>
    </div>
    <img class='map' src="pics/map.jpg" alt="Map">
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
    <script src="script.js"></script>
</body>
</html>
   
</body>
</html>
