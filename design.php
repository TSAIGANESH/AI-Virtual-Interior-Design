<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // User is logged in, you can access user data from the session
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $photo = $_SESSION['photo'];
} else {
    // User is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interia: Best Interior Design Solutions for your Home | Get Free Quotes</title>
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="common-style.css">
    <link rel="stylesheet" href="design-style.css">
    <link rel="shortcut icon" href="source/favicon.ico" type="image/x-icon">
</head>
<body>
    <script src="code.js"></script>
    <script>
        window.onload = function () {
            const username = sessionStorage.getItem("username");
            const photo = sessionStorage.getItem("photo");
        
            if (username) {
                document.getElementById("user-name").textContent = username;
                document.getElementById("user-photo").src = photo || "source/default-avatar.png";
                document.getElementById("user-info").style.display = "inline-flex";
                document.getElementById("login-link").style.display = "none";
            }
        };
        
        function logoutUser() {
            sessionStorage.clear();
            location.reload(); // Refresh the page to remove the user info
        }
    </script>   
    <div class="banner">
        <div class="navbar">
            <img onclick="btn('index.php');" src="source/logo.png" class="logo">
            <ul>
                <li><a href="book.php">Get Quote</a></li>
                <li><a href="#">OUR DESIGNS</a></li>
                <li id="user-info" style="display: none;">
                    <img id="user-photo" src="" alt="User" style="width:32px;height:32px;border-radius:50%;vertical-align:middle;margin-right:5px;">
                    <span id="user-name" style="color:white;"></span>
                    <button onclick="logoutUser()" style="margin-left:10px;padding:5px 10px;">Logout</button>
                  </li>
                  <li id="login-link"><a href="login.html">LOGIN</a>
                </li>
            </ul>
        </div>

        <div class="content">
            <h1>OUR DESIGNS</h1>
        </div>
    </div>

    <div class="up" onclick="totop();">
        <i class="fas fa-arrow-up"></i>
    </div>

    <div class="m1">
        <div class="t1">
            <p>Check out how your dream home can look like. Get inspiration from Interia's vast design catalog spanning across modular kitchens, living rooms, bedrooms, modular wardrobes and more...</p>
        </div>
        <div class="d1">
            <div>
                <img src="newimages/Living room.png">
                <h2>Living Room</h2>
            </div>
            <div>
                <img src="newimages/Dining room.png">
                <h2>Dining room</h2>
            </div>
        </div>
        <div class="d1">
            <div>
                <img src="newimages/Bedroom.png">
                <h2>Master Bedroom</h2>
            </div>
            <div>
                <img src="newimages/Bathroom.png">
                <h2>BathRoom</h2>
            </div>
        </div>
        <div class="d1">
            <div>
                <img src="newimages/Professional Office.png">
                <h2>Office Room</h2></div>
            <div>
                <img src="newimages/Vintage Dining Room.png">
                <h2>Vintage Dining Room</h2>
            </div>
        </div>
        <div class="d1">
            <div>
                <img src="newimages/Vintage Living Room.png">
                <h2>Vintage Living Room</h2></div>
            <div>
                <img src="newimages/Classy Living Room.png">
                <h2>Classy Living Room</h2>
            </div>
        </div>
</div>

    <footer>
        <div class="ftr-m">
            <div class="ftr-t">
                <img src="source/logo.png">
                <ul>
                    <li><a target="_blank" href="https://api.whatsapp.com/send/?phone=+918897392270&text=Hey There! I am interested in interior designs on website. Can I know more on this?"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/profile.php?id=61575081454508"><i class="fab fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/iamsaiganesh1/?hl=en"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="ftr-d">
                <div>
                    <h3>Design ideas</h3>
                    <ul>
                        <li>Living Rooms</li>
                        <li>Dining Room</li>
                        <li>Office</li>
                    </ul>
                </div>
                <div>
                    <h3>Locations</h3>
                    <ul>
                        <li><a href="https://www.google.com/maps/place/Mumbai" target="_blank">Mumbai</a></li>
                        <li><a href="https://www.google.com/maps/place/New+Delhi" target="_blank">New Delhi</a></li>
                        <li><a href="https://www.google.com/maps/place/Bengaluru" target="_blank">Bengaluru</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Explore</h3>
                    <ul>
                        <li><a href="book.php">Book A Design</a></li>
                        <li><a href="design.php">Check Out Our Designs</a></li>
                        <li><a href="https://interior-designer-ai.vercel.app/">DESIGN HERE</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Get in touch</h3>
                    <ul>
                        <li>Call us</li>
                        <a href="tel:8897392270">+91 8897392270</a>
                        <li>Email us</li>
                        <a href="mailto:saig14368@gmail.com">saig14368@gmail.com</a>
                    </ul>
                </div>
            </div>
            <div class="ftr-b">
                <h2>Designed By Meet</h2>
                <p>© 2025 Interia.com | All Rights Reserved</p>
            </div>
        </div>
    </footer>

</body>
</html>