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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interia: Best Interior Design Solutions for your Home | Get Free Quotes</title>
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="common-style.css">
    <link rel="stylesheet" href="book-style.css">
    <link rel="shortcut icon" href="source/favicon.ico" type="image/x-icon">
</head>
<body>
    <script src="book-code.js"></script>
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
                <li><a href="#">Get Quote</a></li>
                <li><a href="design.php">OUR DESIGNS</a></li>
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
            <h1>TALK TO A DESIGNER</h1>
        </div>
    </div>

    <div class="up" onclick="totop();">
        <i class="fas fa-arrow-up"></i>
    </div>
    
    <div class="m1">
        <div class="d1">
            <div class="final">
                <div class="form" id="frm">
                    <form action="send_mail.php" method="POST">
                        <input class="inp" type="text" name="name" placeholder="Name" required autocomplete="off">
                        <input class="inp" type="email" name="email" placeholder="Email" required autocomplete="off">
                        <input class="inp" type="text" name="num" placeholder="Mobile Number" required autocomplete="off">
                        <input class="inp" type="text" name="prop" placeholder="Looking For..." required autocomplete="off">

                        <div>
                            <input type="checkbox" id="whatsapp" checked>
                            <label for="whatsapp">Send me updates on Whatsapp</label>
                        </div>

                        <button type="submit" id="sub-btn">BOOK ONLINE CONSULTATION</button>
                    </form>
                </div>
                <div>
                    <h2 id="subm" style="display:none;">Your details are submitted. <br> Our staff will contact you soon.</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="m4">
        <div class="t4">
            <h1>FAQs</h1>
        </div>
        <div class="d4">
            <!-- FAQ items -->
            <div onclick="showorhide('p1');">
                <h4>How does Interia's AI interior design work?</h4>
                <p id="p1" style="display:none;">You simply upload a photo of your space, and our AI will generate a fully designed interior for it.</p>
            </div>
            <div onclick="showorhide('p2');">
                <h4>Do I need to create an account to use Interia?</h4>
                <p id="p2" style="display:none;">Yes, you need to create a free account or log in to access our AI design features.</p>
            </div>
            <div onclick="showorhide('p3');">
                <h4>Can I see previous designs I've generated?</h4>
                <p id="p3" style="display:none;">Yes! All your generated designs are saved to your account.</p>
            </div>
            <div onclick="showorhide('p4');">
                <h4>Is the AI-generated design customizable?</h4>
                <p id="p4" style="display:none;">Currently, the AI generates a fully designed room based on your selected style.</p>
            </div>
            <div onclick="showorhide('p5');">
                <h4>Is there a limit to how many designs I can generate?</h4>
                <p id="p5" style="display:none;">Free users can generate a limited number of designs per day.</p>
            </div>
            <div onclick="showorhide('p6');">
                <h4>How do I get help if something goes wrong?</h4>
                <p id="p6" style="display:none;">Contact our support team through the "Help" section in your account.</p>
            </div>
            <div onclick="showorhide('p7');">
                <h4>Can I talk to a real designer?</h4>
                <p id="p7" style="display:none;">Yes! We offer real designer consultations for premium users.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="ftr-m">
            <div class="ftr-t">
                <img src="source/logo.png">
                <ul>
                    <li><a target="_blank" href="https://api.whatsapp.com/send/?phone=+918897392270"><i class="fab fa-whatsapp"></i></a></li>
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
