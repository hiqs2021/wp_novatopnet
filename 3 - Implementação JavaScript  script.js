/**
 * novatopnet Galeria 2025
 
3. Implementação JavaScript
Crie um arquivo JavaScript chamado script.js com o seguinte conteúdo e armazene-o na pasta /wp-content/wp_novatopnet/js/

*/

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
