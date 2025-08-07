document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".single-achievement h3");
  const duration = 6000; // total animation time in ms (6 seconds)

  counters.forEach((counter) => {
    // Extract number from text, remove commas and '+' sign
    const text = counter.textContent.trim();
    const hasPlus = text.endsWith("+");
    const numberText = text.replace(/[+,]/g, "");
    const target = parseInt(numberText, 10);

    if (isNaN(target)) return;

    let start = 0;
    const stepTime = Math.max(Math.floor(duration / target), 10);

    const timer = setInterval(() => {
      start += Math.ceil(target / (duration / stepTime));

      if (start >= target) {
        clearInterval(timer);
        // Show final number with commas + plus sign if originally had one
        counter.textContent = target.toLocaleString() + (hasPlus ? "+" : "");
      } else {
        counter.textContent = start.toLocaleString();
      }
    }, stepTime);
  });
});
