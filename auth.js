
    document.addEventListener("DOMContentLoaded", function () {
        const loginLink = document.getElementById("login-link");
        const dropdownMenu = document.getElementById("dropdown-menu");
        const usernameDisplay = document.getElementById("username-display");

        let rememberedEmail = localStorage.getItem("rememberedEmail");

        if (rememberedEmail) {
            const profilePic = localStorage.getItem("profilePic_" + rememberedEmail);
            const username = rememberedEmail.split("@")[0];

            // Replace login button with profile + name
            if (profilePic) {
                loginLink.innerHTML = `<img src="${profilePic}"> ${username}`;
            } else {
                loginLink.textContent = username;
            }

            loginLink.href = "#"; // Prevent redirect

            // Show/hide dropdown on click
            loginLink.addEventListener("click", function (e) {
                e.preventDefault();
                dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
            });

            usernameDisplay.textContent = "Hello, " + username;
        }
    });

    function logout() {
        localStorage.removeItem("rememberedEmail");
        location.reload(); // Refresh page to show LOGIN again
    }

