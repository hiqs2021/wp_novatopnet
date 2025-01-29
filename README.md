Estrutura de Arquivos Completa
/wp-content/wp_novatopnet/
  /css/style.css
  /js/script.js
  /fonts/Poppins-Regular.woff2
  /fonts/Poppins-Bold.woff2
Agora vamos garantir que todas as partes do código sejam completas e prontas para implementação no WordPress.

1. Estrutura HTML Dinâmica
Adicione o seguinte código ao seu template index.php ou ao local onde deseja exibir a galeria:

php
<div class="gallery-container">
  <?php
    $args = array(
      'posts_per_page' => 9, // Número de posts a serem exibidos
      'post_status'    => 'publish', // Apenas posts publicados
    );

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) :
      while ($recent_posts->have_posts()) : $recent_posts->the_post();
  ?>
  <div class="gallery-item">
    <?php if (has_post_thumbnail()) : ?>
      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy">
    <?php endif; ?>
    <div class="overlay">
      <h3><?php the_title(); ?></h3>
      <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
      <span class="badge"><?php echo get_the_date(); ?></span>
    </div>
  </div>
  <?php
      endwhile;
      wp_reset_postdata();
    endif;
  ?>
</div>
2. Estilização CSS
Crie um arquivo CSS chamado style.css com o seguinte conteúdo e armazene-o na pasta /wp-content/wp_novatopnet/css/:

css
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  src: url('../fonts/Poppins-Regular.woff2') format('woff2');
}

@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  src: url('../fonts/Poppins-Bold.woff2') format('woff2');
}

.gallery-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1px;
}

.gallery-item {
  position: relative;
}

.gallery-item img {
  width: 100%;
  height: auto;
  display: block;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
  color: #fff;
}

.overlay h3, .overlay p {
  font-family: 'Poppins', sans-serif;
}

.overlay h3 {
  font-weight: 700;
}

.overlay p {
  font-weight: 500;
}

.badge {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #212121;
  color: white;
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  font-weight: 400;
  padding: 5px;
}

@media (max-width: 768px) {
  .gallery-container {
    grid-template-columns: 1fr;
  }
  .gallery-item {
    height: 50vw; /* Ajuste a altura conforme necessário */
  }
  .gallery-item:nth-child(2), .gallery-item:nth-child(3) {
    display: none; /* Oculta imagens extras no modo mobile */
  }
}
3. Implementação JavaScript
Crie um arquivo JavaScript chamado script.js com o seguinte conteúdo e armazene-o na pasta /wp-content/wp_novatopnet/js/:

javascript
document.addEventListener("DOMContentLoaded", function() {
  const badges = document.querySelectorAll('.badge');

  badges.forEach((badge, index) => {
    let delay = 30000 + (index * 3000); // 30s, 33s, 36s, etc.

    setInterval(() => {
      badge.style.transition = "transform 2s";
      badge.style.transform = "rotateY(180deg)";
      setTimeout(() => {
        badge.style.transform = "rotateY(0)";
      }, 2000);
    }, delay);
  });
});
5. Instruções para Adicionar ao WordPress
Adicionar HTML Dinâmico:

Abra o arquivo de template do seu tema onde deseja incluir a galeria (por exemplo, index.php).

Insira o código PHP e HTML da galeria na posição desejada.

Adicionar CSS e JavaScript:

No painel do WordPress, vá até “Aparência” > “Editor de Tema”.

Abra o arquivo functions.php do seu tema e adicione o seguinte código para carregar o CSS e o JavaScript:

php
function load_custom_styles_scripts() {
  wp_enqueue_style('custom-style', get_template_directory_uri() . '/wp_novatopnet/css/style.css');
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/wp_novatopnet/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'load_custom_styles_scripts');
Seguindo esses passos, você conseguirá implementar uma galeria de imagens destacadas dinâmica, responsiva e otimizada no WordPress. Se precisar de mais alguma coisa ou tiver dúvidas, estou aqui para ajudar! 😊
