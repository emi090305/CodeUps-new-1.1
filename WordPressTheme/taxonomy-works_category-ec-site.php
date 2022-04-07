<?php get_header(); ?>

<div class="p-sub-mv js-mv">
  <h1 class="p-sub-mv__title"><?php single_term_title(); ?></h1>
  <!-- sub-mv-imgテンプレート -->
  <?php get_template_part('template-parts/sub-mv-img'); ?>
</div>

<!-- パンくず -->
<div class="c-Breadcrumb">
  <div class="l-inner">
    <?php
    if (function_exists('bcn_display')) {
      bcn_display();
    }
    ?>
  </div>
</div>

<main>
  <div class="p-sub-works l-sub-works">
    <div class="l-inner">
      <div class="p-sub-works__category p-category">
        <ul class="p-category__items">
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/works')); ?>">ALL</a></li>
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/works_category/lp')); ?>">LP</a></li>
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/works_category/corporate-site')); ?>">コーポレートサイト</a></li>
          <li class="p-category__item p-category__item--active"><a href="#">ECサイト</a></li>
        </ul>
      </div>
    </div>

    <div class="p-sub-works__inner">
      <div class="p-sub-works__cards">

        <?php
        $paged = get_query_var('paged') ?: 1;
        $args  = array(
          'paged' => $paged,
          'post_type'      => 'works1',
          'posts_per_page' => 6,
          'tax_query' => array(
            array(
              'taxonomy' => 'works_category',
              'field'    => 'slug',
              'terms'    => array('ec-site')
            )
          ),
        );
        $the_query = new WP_Query($args); ?>

        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="p-sub-works__card p-card-style03">
              <div class="p-card-style03__img">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else {
                  echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/sub-works-01.jpg" alt="アイキャッチ">';
                }
                ?>
              </div>
              <span class="p-card-style03__cat">
                <?php
                if ($terms = get_the_terms($post->ID, 'works_category')) {
                  foreach ($terms as $term) {
                    echo esc_html($term->name);
                  }
                }
                ?>
              </span>
              <h2 class="p-card-style03__company"><?php the_title(); ?></h2>
            </a>

          <?php endwhile; ?>
        <?php else : ?>
          投稿がありません
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>

      <!-- ページネーション -->
      <div class="l-pagination">
        <?php if (function_exists('pagination')) :
          pagination($the_query->max_num_pages, $paged);
        endif;
        ?>
      </div>
    </div>
  </div>
</main>

<!-- contactセクション -->
<?php get_template_part('template-parts/contact'); ?>

<?php get_footer(); ?>