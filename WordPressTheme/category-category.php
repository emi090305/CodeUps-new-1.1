<?php get_header(); ?>

<div class="p-sub-mv js-mv">
  <h1 class="p-sub-mv__title"><?php the_archive_title(); ?></h1>
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
  <section class="p-sub-news l-sub-news">
    <div class="l-inner">
      <div class="p-sub-news__items">

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <a class="p-sub-news__item p-news-style" href="<?php the_permalink(); ?>">
              <div class="p-news-style__meta">
                <time datetime="<?php the_time( 'c' );?>" class="p-news-style__date"><?php the_time('Y.m.d'); ?></time>
                <span class="c-cat-main">
                  <?php
                  $category = get_the_category();
                  if ($category[0]) {
                    echo $category[0]->cat_name;
                  }  ?>
                </span>
              </div>
              <h2 class="p-news-style__title"><?php the_title(); ?>
              </h2>
            </a>

          <?php endwhile; ?>
        <?php else : ?>
          投稿がありません
        <?php endif; ?>

      </div>

      <!-- ページネーション -->
      <div class="l-pagination">
        <?php
        if (function_exists('pagination')) :
          pagination($wp_query->max_num_pages, get_query_var('paged'));
        endif;
        ?>
      </div>

    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>