window.onload = function () {
  console.log("home-code.js loaded");
  const email = sessionStorage.getItem("email");
  const username = sessionStorage.getItem("username");
  const photo = sessionStorage.getItem("photo");

  console.log("Email from sessionStorage:", email);
  console.log("Username from sessionStorage:", username);
  console.log("Photo from sessionStorage:", photo);

  const navUl = document.querySelector(".navbar ul");
  console.log("navUl element:", navUl);

  if (navUl) { // Ensure navUl exists before trying to modify it
    if (email) {
      console.log("User is logged in (email found in sessionStorage)");
      // Create user display
      const userLi = document.createElement("li");
      userLi.innerHTML = `
          <a href="#" id="userLink" style="display:flex; align-items:center; gap:5px;">
              <img src="${photo || 'source/default_user.png'}"
                   style="width:30px; height:30px; border-radius:50%; object-fit:cover;">
              <span>${username || email}</span>
          </a>`;
      navUl.appendChild(userLi);

      // Create logout button
      const logoutLi = document.createElement("li");
      logoutLi.innerHTML = `<a href="#" id="logoutBtn" style="color:red;">Logout</a>`;
      navUl.appendChild(logoutLi);

      // Hook up logout
      document.getElementById("logoutBtn").onclick = function (e) {
          e.preventDefault();
          sessionStorage.clear();
          window.location.href = "login.html";
      };
    } else {
      console.log("User is NOT logged in (email not found in sessionStorage)");
      // Optionally, you could ensure the default "LOGIN" link is present if the user is logged out.
      // However, your current index.html already has it.
    }
  } else {
    console.error("Error: Could not find the .navbar ul element in index.html");
  }
};

function clk1() {
  document.getElementById('img-bk').style.width = "65px";
  document.getElementById('cls-f').style.marginLeft = "0px";
  document.getElementById('d6-2-h1').textContent = "Collect Empty Room Images";
  document.getElementById('d6-2-p').textContent = "Snap a photo of your room or upload an existing image. This is the starting point for transforming your space.";
}

function clk2() {
  document.getElementById('img-bk').style.width = "174px";
  document.getElementById('cls-f').style.marginLeft = "-800px";
  document.getElementById('d6-2-h1').textContent = "Let AI Work Its Magic";
  document.getElementById('d6-2-p').textContent = "Our AI instantly reimagines your room with stunning interior design concepts tailored to your space and style.";
}

function clk3() {
  document.getElementById('img-bk').style.width = "282px";
  document.getElementById('cls-f').style.marginLeft = "-1600px";
  document.getElementById('d6-2-h1').textContent = "Connect with an Expert";
  document.getElementById('d6-2-p').textContent = "Get personalized advice from a professional interior designer who reviews your AI design and refines it with you.";
}

function clk4() {
  document.getElementById('img-bk').style.width = "394px";
  document.getElementById('cls-f').style.marginLeft = "-2400px";
  document.getElementById('d6-2-h1').textContent = "Get Practical Suggestions";
  document.getElementById('d6-2-p').textContent = "Receive curated furniture ideas, color palettes, and layout tips—plus where to shop for them within your budget.";
}

function clk5() {
  document.getElementById('img-bk').style.width = "500px";
  document.getElementById('cls-f').style.marginLeft = "-3200px";
  document.getElementById('d6-2-h1').textContent = "Make It a Reality";
  document.getElementById('d6-2-p').textContent = "Use your finalized design plan to transform your space with confidence. Your dream room is just a few steps away!";
}

// Auto highlight step based on current progress bar width
function im_ch() {
  const w = document.getElementById('img-bk').offsetWidth;
  if (w >= 500) {
    clk5();
  } else if (w >= 394) {
    clk4();
  } else if (w >= 282) {
    clk3();
  } else if (w >= 174) {
    clk2();
  } else {
    clk1();
  }
}

// Animate step progress every 6 seconds
let currentStep = 1;
const stepInterval = setInterval(() => {
  switch (currentStep) {
    case 1: clk1(); break;
    case 2: clk2(); break;
    case 3: clk3(); break;
    case 4: clk4(); break;
    case 5: clk5(); break;
  }
  currentStep++;
  if (currentStep > 5) currentStep = 1;
}, 3000);
