var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: false,
  centerSlide: "true",
  fade: "true",
  gragCursor: "true",
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
  grabCursor: true,
  keyboard: {
    enabled: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
});
/*scrollbar: {
      el: ".swiper-scrollbar",
    }, */

document.getElementById("modeToggle").addEventListener("change", function () {
  document.body.classList.toggle("dark-mode");
  updateModeText();
});
function updateModeText() {
  let iconmoon = document.querySelector(".fa-moon");
  let iconsun = document.querySelector(".fa-sun");
  let mood = document.querySelector(".mode");
  let home = document.querySelector("#home");
  let services = document.querySelector("#services");
  let frame = document.querySelector(".frame");
  let blog = document.querySelector("#blog");
  let blog_container = document.querySelector(".blog_container");
  let statistic = document.querySelector(".statistics");
  let body = document.querySelector("body");

  const modeText = document.getElementById("modeText");
  const isDarkMode = document.body.classList.contains("dark-mode");

  if (isDarkMode) {
    modeText.textContent = "Dark Mode";
    iconmoon.style.display = "block"; // Set moon icon to block in dark mode
    iconsun.style.display = "none";
    mood.style.background = "#090909";
    home.style.background = "#cbcbcb";
    services.style.background = "#dedddd";
    blog.style.background = "#dedddd";
    blog_container.style.background = "#aeaeae";
    statistic.style.background = "rgb(233, 233, 233)";
    frame.style.background = "#dedddd";
    body.style.background = "#dedddd";
  } else {
    document.body.classList.remove("dark-mode"); // Remove dark-mode class
    modeText.textContent = "Light Mode";
    iconmoon.style.display = "none";
    iconsun.style.display = "block"; // Set sun icon to block in light mode
    mood.style.background = "#fe6e0a";
    document.body.style.background = "#eeeeee"; // Set background color for body
    home.style.background = "#d6fafa";
    services.style.background = "#eff7ff";
    blog.style.background = "#d6fafa";
    blog_container.style.background = "#d6fafa";
    statistic.style.background = "#d6fafa";
    frame.style.background = "linear-gradient(to right, #dbe7f3, #eaf3fb)";
    ("linear-gradient(to right, #dbe7f3, #eaf3fb);");
    body.style.background = "#eff7ff";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  let sidebar = document.querySelector(".slide_barcontainer");

  if (sidebar) {
    let header = document.querySelector(".header");
    let isSidebarVisible = false;

    // Toggle the sidebar visibility on click
    header.addEventListener("click", () => {
      if (isSidebarVisible) {
        sidebar.classList.remove("show-sidebar");
      } else {
        sidebar.classList.add("show-sidebar");
      }

      // Toggle the visibility state
      isSidebarVisible = !isSidebarVisible;
    });

    // Optional: You can also hide the sidebar when the mouse leaves the header
    header.addEventListener("mouseout", () => {
      if (!isSidebarVisible) {
        sidebar.classList.remove("show-sidebar");
      }
    });
  } else {
    console.error("Sidebar not found");
  }
});

let swiperbtn = document.querySelectorAll(".btn");

swiperbtn[0].addEventListener("click", () => {
  this.open("SourceCode/our-doctors/public/index.html", "_blank");
});
swiperbtn[1].addEventListener("click", () => {
  this.open("SourceCode/our-pharmacists/public/index.html", "_blank");
});
swiperbtn[2].addEventListener("click", () => {
  this.open("SourceCode/our-Nurses/public/index.html", "_blank");
});
