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
  <section class="p-sub-blog l-sub-blog">
    <div class="l-inner">
      <div class="p-sub-blog__category p-category">
        <ul class="p-category__items">
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/blog')); ?>">ALL</a></li>
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/blog_category/category1')); ?>">カテゴリ１</a></li>
          <li class="p-category__item p-category__item--active"><a href="#">カテゴリカテゴリ</a></li>
          <li class="p-category__item"><a href="<?php echo esc_url(home_url('/blog_category/cate')); ?>">カテ</a></li>
        </ul>
      </div>

      <div class="p-sub-blog__cards p-card-list01">

        <?php
        $paged = get_query_var('paged') ?: 1;
        $args  = array(
          'paged' => $paged,
          'post_type'      => 'blog1',
          'posts_per_page' => 9,
          'tax_query' => array(
            array(
              'taxonomy' => 'blog_category',
              'field'    => 'slug',
              'terms'    => array('categorycategory')
            )
          ),
        );
        $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class="p-card-list01__item p-card-style01">
              <a href="<?php the_permalink(); ?>">
                <div class="p-card-style01__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/blog-01.jpg" alt="アイキャッチ">';
                  }
                  ?>
                </div>
                <div class="p-card-style01__body">
                  <div class="p-card-style01__contents">
                    <h3 class="p-card-style01__title"><?php the_title(); ?></h3>
                    <p class="p-card-style01__text"><?php the_excerpt(); ?></p>
                  </div>
                  <div class="p-card-style01__meta">
                    <div class="p-card-style01__cat">
                      <?php
                      if ($terms = get_the_terms($post->ID, 'blog_category')) {  //タクソノミースラッグを変える
                        foreach ($terms as $term) {
                          echo esc_html($term->name);
                        }
                      }
                      ?>
                    </div>
                    <time datetime="<?php the_time( 'c' );?>" class="p-card-style01__date"><?php the_time('Y.m.d'); ?></time>
                  </div>
                </div>
              </a>
            </div>

          <?php endwhile; ?>
        <?php else : ?>
          投稿がありません
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>

      <!-- ページネーション -->
      <div class="l-pagination">
        <?php
        if (function_exists('pagination')) :  //
          pagination($the_query->max_num_pages, $paged);
        endif;
        ?>
      </div>


    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>