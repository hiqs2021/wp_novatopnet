/**
 * novatopnet Galeria 2025
 
 1 - Estrutura HTML Dinâmica
Adicione o seguinte código ao seu template index.php ou ao local onde deseja exibir a galeria

*/

<div class="gallery-container">
  <?php
    $args = array(
      'posts_per_page' => 9,
      'post_status'    => 'publish',
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
