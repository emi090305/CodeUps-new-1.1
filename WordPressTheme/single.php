<?php get_header(); ?>

<!-- パンくず -->
<div class="c-Breadcrumb l-Breadcrumb">
  <div class="l-inner">
    <?php
    if (function_exists('bcn_display')) {
      bcn_display();
    }
    ?>
  </div>
</div>

<main>
  <section class="p-single l-single">
    <div class="p-single__inner l-inner">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <h1 class="p-single__title"><?php the_title(); ?></h1>
          <div class="p-single__meta">
            <time datetime="<?php the_time( 'c' );?>" class="p-single__date"><?php the_time('Y/m/d'); ?></time>

            <?php if (is_singular('blog1')) : //カスタム投稿タイプblog1の場合（条件分岐）
            ?>
              <span class="p-single__cat">
                <?php
                if ($terms = get_the_terms($post->ID, 'blog_category')) {
                  foreach ($terms as $term) {
                    echo esc_html($term->name);
                  }
                }
                ?>
              </span>
            <?php elseif (is_single()) : //記事ページの場合（条件分岐） 
            ?>
              <span class="p-single__cat">
                <?php
                $category = get_the_category();
                if ($category[0]) {
                  echo $category[0]->cat_name;
                }  ?>
              </span>
            <?php endif; ?>

          </div>
          <div class="p-single__img">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('large');
            } else {
              echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/sub-blog01.jpg" alt="アイキャッチ">';
            }
            ?>
          </div>
          <div class="p-single__content">
            <?php the_content(); ?>
          </div>

        <?php endwhile; ?>
      <?php else : ?>
        投稿がありません
      <?php endif; ?>
    </div>
  </section>

  <!-- 前の記事へ・次の記事へ -->
  <ul class="next-page l-next-page">
    <?php if (get_previous_post()) : ?>
      <li class="next-page__list"><?php previous_post_link('%link', 'PREV'); ?></li>
    <?php endif; ?>

    <?php if (is_singular('blog1')) : //カスタム投稿タイプblog1の場合（条件分岐）
    ?>
      <li class="next-page__archive"><a href="<?php echo esc_url(home_url('/blog/')); ?>">一覧</a></li>
    <?php elseif (is_single()) : //記事ページの場合（条件分岐） 
    ?>
      <li class="next-page__archive"><a href="<?php echo esc_url(home_url('/news/')); ?>">一覧</a></li>
    <?php endif; ?>

    <?php if (get_next_post()) : ?>
      <li class="next-page__list"><?php next_post_link('%link', 'NEXT'); ?></li>
    <?php endif; ?>
  </ul>

  <!-- 関連記事 -->
  <section class="p-relation l-relation">
    <div class="l-inner">
      <h2 class="p-relation__title">おすすめ記事</h2>

      <div class="p-relation__cards p-card-list02">

        <?php if (is_singular('blog1')) : //カスタム投稿タイプblog1の場合（条件分岐）
        ?>
          <?php
          $args = array(
            'post_type' => 'blog1', // 投稿タイプを指定
            'orderby' => 'rand', // ランダムで表示
            'posts_per_page' => 4, // 表示する記事数
            'post__not_in' => array($post->ID) // 現在表示している記事を除外（ここ！）
          );
          $post_query = new WP_Query($args);
          if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();
          ?>

              <div class="p-card-list02__item p-card-style01">
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
                      <p class="p-card-style01__text u-mobile"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="p-card-style01__meta">
                      <div class="p-card-style01__cat">
                        <?php
                        if ($terms = get_the_terms($post->ID, 'blog_category')) {
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
            <?php endwhile;
          else :
            ?>
            <p>記事は見つかりませんでした</p>
          <?php endif;
          wp_reset_postdata(); ?>

        <?php elseif (is_single()) : //記事ページの場合（条件分岐）        
        ?>
          <?php
          $args = array(
            'post_type' => 'post', // 投稿タイプを指定
            'orderby' => 'rand', // ランダムで表示
            'posts_per_page' => 4, // 表示する記事数
            'post__not_in' => array($post->ID) // 現在表示している記事を除外（ここ！）
          );
          $post_query = new WP_Query($args);
          if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();
          ?>

              <div class="p-card-list02__item p-card-style01">
                <a href="<?php the_permalink(); ?>">
                  <div class="p-card-style01__img">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                      echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/sub-blog01.jpg" alt="アイキャッチ">';
                    }
                    ?>
                  </div>
                  <div class="p-card-style01__body">
                    <div class="p-card-style01__contents">
                      <h3 class="p-card-style01__title"><?php the_title(); ?></h3>
                      <p class="p-card-style01__text u-mobile"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="p-card-style01__meta">
                      <div class="p-card-style01__cat">
                        <?php
                        $category = get_the_category();
                        if ($category[0]) {
                          echo $category[0]->cat_name;
                        }  ?>
                      </div>
                      <time datetime="<?php the_time( 'c' );?>" class="p-card-style01__date"><?php the_time('Y.m.d'); ?></time>
                    </div>
                  </div>
                </a>
              </div>
            <?php endwhile;
          else :
            ?>
            <p>記事は見つかりませんでした</p>
          <?php endif;
          wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>
    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>