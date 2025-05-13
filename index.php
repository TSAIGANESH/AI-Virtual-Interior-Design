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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interia: Best Interior Design Solutions for your Home | Get Free Quotes</title>
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="common-style.css">
    <link rel="stylesheet" href="home-style.css">
    <link rel="shortcut icon" href="source/favicon.ico" type="image/x-icon">
</head>
<body>
    <script src="home-code.js"></script>
    <script src="code.js"></script>
    <script>
        window.onload = function () {
            const username = sessionStorage.getItem("username");
            const photo = sessionStorage.getItem("photo");
        
            if (username) {
                document.getElementById("user-name").textContent = username;
                if (photo) {
                    document.getElementById("user-photo").src = photo;
                } else {
                    document.getElementById("user-photo").src = "source/default-avatar.png"; // fallback image
                }
                document.getElementById("user-info").style.display = "inline-flex";
                document.getElementById("login-link").style.display = "none";
            }
        };
        
        function logoutUser() {
            sessionStorage.clear();
            location.reload(); // Refresh to reflect logout
        }
    </script>        
    <div class="banner">
        <div class="navbar">
            <img onclick="btn('index.php');" src="source/logo.png" class="logo">
            <ul>
                <li><a href="book.php">Get Quote</a></li>
                <li><a href="design.php">OUR DESIGNS</a></li>
                <li id="user-info" style="display:none;">
                    <img id="user-photo" src="" alt="User" style="width:32px;height:32px;border-radius:50%;vertical-align:middle;margin-right:5px;">
                    <span id="user-name" style="color:white;"></span>
                    <button onclick="logoutUser()" style="margin-left:10px;padding:5px 10px;">Logout</button>
                  </li>
                  <li id="login-link"><a href="login.html">LOGIN</a>
                </li>     
            </ul>
        </div>

        <div class="content">
            <h1>DESIGN YOUR DREAM</h1>
            <p>Whether it's a magazine-like dream kitchen or your entire home, enjoy end-to-end solutions from design to installation.</p>
            <div>
                <button onclick="btn('book.php');"><span></span>GET QUOTE</button>
                <button onclick="btn('https://interior-designer-ai.vercel.app/');"><span></span>DESIGN HERE</button>
            </div>
        </div>


    </div>

    <div class="up" onclick="totop();">
        <i class="fas fa-arrow-up"></i>
    </div>

    <div class="m1">
        <div class="t1">
            <h1>Why choose us?</h1>
        </div>
        <div class="d1">
            <div><img src="source/icons/home-i-1.png"><h3>Best price guarantee</h3></div>
            <div><img src="source/icons/home-i-2.png"><h3>Within 45Hrs our consultant Will Reach you</h3></div>
            <div><img src="source/icons/home-i-4.png"><h3>146 quality checks</h3></div>
        </div>
    </div>

    <div class="m2">
        <div class="t2">
            <h1>One-stop shop for all things home interiors</h1>
        </div>
        <div class="d2">
            <div>
                <img src="newimages/Living room.png">
                <h2>Living Room</h2>
                <p>Experience the future of interior design with AI-powered live living rooms, crafted through Replicate for a stunning and personalized touch.</p>
            </div>
            <div>
                    <img src="newimages/Dining room.png">
                    <h2>Dining Room</h2>
                    <p>Design your dream dining room effortlessly with AI-powered creations through Replicate, bringing style and sophistication to life.</p>
            </div>
        </div>
    </div>

    <div class="m3">
        <div class="d3">
            <div>
                <h1>Your Vision, Our Expertise: Design It Together</h1>
                <p style="font-size: 1.1rem; line-height: 1.8;">
                    If you generate an image, <strong>our expert agents will consult with you</strong> to provide guidance and assistance in bringing your design to life. 
                    Our team of experienced interior designers and stylists will review your concept, offer professional advice, and help refine every detail—
                    from <em>color palettes and lighting</em> to <em>furniture placement and décor selection</em>.
                  </p>
                  
                  <p style="font-size: 1.1rem; line-height: 1.8;">
                    Whether you're working on a cozy living room, a sleek kitchen, or a complete home makeover, we’re here to ensure your vision is both <strong>beautiful and practical</strong>. 
                    Our experts are just a message away, ready to support you with <strong>personalized recommendations</strong> tailored to your style, preferences, and space.
                  </p>
            </div>
            <div>
                <img src="newimages/Living room.png">
            </div>
        </div>
    </div>

    <div class="m4">
        <div class="t4">
            <h1>Our Achievements</h1>
        </div>
        <div class="d4">
            <div><img src="source/icons/home-i-6.png"><h3>500+ expert designers agents</h3></div>
            <div><img src="source/icons/home-i-7.png"><h3>2.5 lakh+ catalogue products</h3></div>
            <div><img src="source/icons/home-i-8.png"><h3>Services in different cities and countries</h3></div>
        </div>
    </div>

    <div class="m5">
        <div class="t5">
            <h1>See our Customers do the Talking</h1>
            <p>Here's what they have to say</p>
        </div>
        <div class="d5">
            <div onclick="openvid('source/home-m5-vid1.mp4');">
                <img src="source/home-m5-img1.jpg">
                <i>“AVI - Virtual Interior Design delivered stunning AI-generated images in no time, with expert agents guiding me seamlessly to my dream space.”</i>
                <p>Rohit Paul & Shveta</p>
                <p class="loc">Living Room,Telangana</p>
            </div>

            <div onclick="openvid('source/home-m5-vid2.mp4');">
                <img src="source/home-m5-img2.jpg">
                <i>“Our experience with Interia was nice thanks to the project managers. They worked so much on this project, and finished it on time.”</i>
                <p>Swati & Gaurav</p>
                <p class="loc">Dining Room,Bangalore</p>
            </div>

            <div onclick="openvid('source/home-m5-vid3.mp4');">
                <img src="source/home-m5-img3.jpg">
                <i>“This home reflects my vision. Thanks to AVI - Virtual Interior Design, we got the perfect design we always wanted.”</i>
                <p>Puja Bhatia</p>
                <p class="loc">Office,Mumbai</p>
            </div>
        </div>
        <video preload="auto" width="100%" controls id="myvideo" style="visibility: hidden; display: none;">
            <source type="video/mp4">
        </video>
    </div>

    <div class="m6">
        <div class="t6">
            <h1>Design Home In Just 5 Simple steps</h1>
        </div>
        <div class="d6">
            <img src="source/home-m6.png" usemap="#img-mp">
            <div id="img-bk" style="width: 65px;"></div>
        </div>
        <div class="d6-2">
            <h1 id="d6-2-h1">Collect Empty Room images</h1>
            <p id="d6-2-p">Snap a photo of your room or upload an existing image. This is the starting point for transforming your space.</p>
        </div>
        <div class="d6-3">
            <div class="slider">
                <div class="slide">
                    <!-- adding images -->
                    <div class="imgs f" id="cls-f">
                        <img src="newimages/STEP1.jpeg">
                    </div>
                    <div class="imgs">
                        <img src="source/how-m1-2.jpg">
                    </div>
                    <div class="imgs">
                        <img src="source/how-m1-3.jpg">
                    </div>
                    <div class="imgs">
                        <img src="source/how-m1-4.jpg">
                    </div>
                    <div class="imgs">
                        <img src="newimages/step5.jpeg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <map name="img-mp">
        <area shape="circle" coords="32,75,36" id="ara1" onclick="clk1();">
        <area shape="circle" coords="142,75,36" id="ara2" onclick="clk2();">
        <area shape="circle" coords="252,75,36" id="ara3" onclick="clk3();">
        <area shape="circle" coords="362,75,36" id="ara4" onclick="clk4();">
        <area shape="circle" coords="472,75,36" id="ara5" onclick="clk5();">
      </map>

    <div class="m-last">
        <div class="last">
            <div>
                <h1>Your dream home is just a click away</h1>
                <button onclick="btn('login.html');">GET STARTED</button>
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
                    <li><a target="_blank" href="https://www.instagram.com/iamsaiganesh1/?hl=en"><i class="fab fa-instagram"></i></i></a></li>
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
                </div><div>
                    <h3>Explore</h3>
                    <ul>
                        <li><a href="book.php">Book A Design</a></li>
                        <li><a href="design.php">Check Out Our Designs</a></li>
                        <li><a href="https://interior-designer-ai.vercel.app/">DESIGN HERE</a></li></li>
                    </ul>
                </div><div>
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