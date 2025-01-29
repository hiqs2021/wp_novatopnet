document.addEventListener("DOMContentLoaded", function() {
  const badges = document.querySelectorAll('.badge');

  badges.forEach((badge, index) => {
    let delay = 30000 + (index * 3000);

    setInterval(() => {
      badge.style.transition = "transform 2s";
      badge.style.transform = "rotateY(180deg)";
      setTimeout(() => {
        badge.style.transform = "rotateY(0)";
      }, 2000);
    }, delay);
  });
});
