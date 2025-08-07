const track = document.getElementById("logoTrack");
const interval = 4000;
let isTransitioning = false;

setInterval(() => {
  if (isTransitioning) return;
  isTransitioning = true;

  const firstItem = track.children[0];
  const itemWidth = firstItem.getBoundingClientRect().width;

  track.style.transition = "transform 0.6s ease-in-out";
  track.style.transform = `translateX(-${itemWidth}px)`;

  setTimeout(() => {
    track.appendChild(firstItem);
    track.style.transition = "none";
    track.style.transform = "translateX(0)";
    isTransitioning = false;
  }, 600);
}, interval);
