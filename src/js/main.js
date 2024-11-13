document.addEventListener("DOMContentLoaded", function () {
  const menuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");

  menuButton.addEventListener("click", function () {
    mobileMenu.classList.toggle("hidden");
    mobileMenu.classList.toggle("scale-y-100");
  });
});

let tahun = new Date().getFullYear();

document.getElementById(
  "copyright"
).innerHTML = `${tahun} Company Name. All rights reserved.`;
