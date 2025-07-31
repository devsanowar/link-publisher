const openMenu = document.getElementById("openMenu");
const closeMenu = document.getElementById("closeMenu");
const mobileMenu = document.getElementById("mobileMenu");

// Open menu
openMenu.addEventListener("click", () => {
  mobileMenu.classList.add("open");
});

// Close menu
closeMenu.addEventListener("click", () => {
  mobileMenu.classList.remove("open");
});

// Toggle mobile dropdowns
document.querySelectorAll(".mobile-toggle").forEach((toggle) => {
  toggle.addEventListener("click", (e) => {
    e.preventDefault();
    const parent = toggle.parentElement;
    parent.classList.toggle("open");
  });
});
