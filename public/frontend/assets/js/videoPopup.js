const videoModal = document.getElementById("videoModal");
const youtubeVideo = document.getElementById("youtubeVideo");

// When any play icon is clicked
document.querySelectorAll(".video-icon").forEach((icon) => {
  icon.addEventListener("click", function () {
    const videoURL = this.getAttribute("data-video");
    youtubeVideo.src = videoURL + "?autoplay=1";
  });
});

// Clear iframe on modal close
videoModal.addEventListener("hidden.bs.modal", function () {
  youtubeVideo.src = "";
});
