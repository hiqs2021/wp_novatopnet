*//
Crie um Shortcode para a Galeria
Vamos criar um shortcode no WordPress que você pode usar diretamente no Elementor. Adicione o seguinte código ao seu arquivo functions.php
/*/////*

function dynamic_gallery_shortcode() {
    ob_start();
    ?>
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
    <?php
    return ob_get_clean();
}
add_shortcode('dynamic_gallery', 'dynamic_gallery_shortcode');
