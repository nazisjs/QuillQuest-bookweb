<?php
session_start();
$conn = new mysqli("localhost", "root", "", "book_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $customer_fullname = $conn->real_escape_string($_POST['customer_fullname']);
    $phone_num = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $country = $conn->real_escape_string($_POST['country']);
    $password = $conn->real_escape_string($_POST['password']);
    $hidden_password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $img_folder =($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $img_folder)) {
            $sql = "INSERT INTO registration (customer_fullname, phone_number, address, country, customer_image, password) 
                    VALUES ('$customer_fullname', '$phone_num', '$address', '$country', '$img_folder', '$hidden_password')";

            if ($conn->query($sql) === TRUE) {
                $customer_id = $conn->insert_id; 
                $_SESSION['customer_id'] = $customer_id; 
                header("Location: user2.php");
                exit;
            } else {
                echo "Error: " . $sql. $conn->error;
            }
        } 
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $name = $conn->real_escape_string($_POST['customer_fullname']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT customer_id, password FROM registration WHERE customer_fullname='$name'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['customer_id'] = $row['customer_id'];
            header("Location: user2.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
}




$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration & Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="operation.css">
</head>
<body>
<div class="popup-start">
    <h1>Welcome To Book World!</h1>
    <h4>Share your experience and wave of emotions along with us!</h4>
    <button id="openRegistrationBtn" class="reg">Register</button>
    <button id="openLoginBtn" class="reg">Login</button>
    <div id="registrationPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h1>Register Your Account</h1>
            <p class="info-text">For the purpose of industry regulation, your details are required</p>
            <div class="registration-content">
                <div class="photo-section">
                    <img src="pics/Pic.png" alt="Profile Picture">
                </div>
                <div class="form-section">
                    <form id="registrationForm" method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="register" value="1">

                        <label for="customer_fullname">Customer Fullname</label>
                        <input type="text" id="customer_fullname" name="customer_fullname" required>
                        
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                        
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone_number" required>
                        
                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="United States">United States</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antartica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                        </select>
                        
                        <label for="image">Profile Image</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                        
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>                
                        <button type="submit" class="register-button" style="width:100%;">Register Account</button>
                        <h5 class="agree" style="color:#888;text-align:center;width:100%;">By continuing you are agreeing and accepting the terms & conditions</h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h1>Login to Your Account</h1>
            <div class="login-content">
                <div class="photo-section">
                    <img  class="pic2" src="pics/Pic.png" alt="Profile Picture">
                </div>
                <div class="form-section">
                    <form id="loginForm" method="POST" action="">
                        <input type="hidden" name="login" value="1">
                        <label for="customer_fullname">Customer Fullname</label>
                        <input type="text" id="customer_fullname" name="customer_fullname" required>
                        
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>                
                        <button type="submit" class="login-button" style="width:100%;">Login</button>
                        <h5 class="agree" style="color:#888;text-align:center;width:100%;">By continuing you are agreeing and accepting the terms & conditions</h5>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var registrationModal = $('#registrationPopup');
        var loginModal = $('#loginPopup');
        var openRegistrationBtn = $("#openRegistrationBtn");
        var openLoginBtn = $("#openLoginBtn");
        var closeButtons = $(".close");

        openRegistrationBtn.on('click', function() {
            registrationModal.show();
        });

        openLoginBtn.on('click', function() {
            loginModal.show();
        });

        closeButtons.on('click', function() {
            registrationModal.hide();
            loginModal.hide();
        });
        if ($(event.target).is('#loginPopup')) {
                loginModal.hide();
            }
        });
;
</script>
</body>
</html>
