
  document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.getElementById("navbar");
    const homeSection = document.getElementById("home");

    // Get the actual height of the navbar
    const navbarHeight = navbar.clientHeight;

    // Calculate remaining viewport height and apply it to the home section
    const remainingHeight = `calc(100vh - ${navbarHeight}px)`;
    homeSection.style.height = remainingHeight;

    console.log(navbarHeight);
  });
