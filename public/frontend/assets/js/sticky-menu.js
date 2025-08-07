window.addEventListener("scroll", function () {
  const navbar = document.getElementById("mainNavbar");

  if (window.scrollY > 100) {
    navbar.classList.add("is-sticky");
  } else {
    navbar.classList.remove("is-sticky");
  }
});
