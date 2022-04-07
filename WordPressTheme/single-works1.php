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
  <section class="p-single-works l-single-works">
    <div class="l-inner p-single-works__inner">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <h1 class="p-single-works__title"><?php the_title(); ?></h1>
          <div class="p-single-works__meta">
            <time datetime="<?php the_time( 'c' );?>" class="p-single-works__date"><?php the_time('Y/m/d'); ?></time>
            <span class="p-single-works__cat">
              <?php
              if ($terms = get_the_terms($post->ID, 'works_category')) {
                foreach ($terms as $term) {
                  echo esc_html($term->name);
                }
              }
              ?>
            </span>
          </div>
    </div>

    <!-- スライダー -->
    <div class="gallery p-single-works__gallery">

      <!-- カスタムフィールド・スライダー部分 -->

      <!-- メイン -->
      <div class="swiper-container">
        <div class="gallery-slider">
          <div class="swiper-wrapper">

            <?php
            $SliderGroup = SCF::get('slider');
            foreach ($SliderGroup as $fields) {
              $imgurl = wp_get_attachment_image_src($fields['works_img'], 'large');
            ?>

              <div class="swiper-slide">

                <?php if ($fields['works_img'] === "") { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sub-blog02.jpg" alt="ギャラリー img">
                <?php } else { ?>
                  <img src="<?php echo $imgurl[0]; ?>" alt="ギャラリー img">
                <?php
                } ?>

              </div>
            <?php
            } ?>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>

      <!-- サムネイル -->
      <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">

          <?php
          $SliderGroup = SCF::get('slider');
          foreach ($SliderGroup as $fields) {
            $imgurl = wp_get_attachment_image_src($fields['works_img'], 'large');
          ?>

            <div class="swiper-slide">

              <?php if ($fields['works_img'] === "") { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sub-blog02.jpg" alt="ギャラリー img">
              <?php } else { ?>
                <img src="<?php echo $imgurl[0]; ?>" alt="ギャラリー img">
              <?php
              } ?>

            </div>
          <?php
          } ?>
        </div>
      </div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>

<!-- カスタムフィールド・コンテンツ部分 -->
<?php
$ContentsGroup = SCF::get('contents');
foreach ($ContentsGroup as $fields) {
?>

  <?php if ($fields['works_title']) : ?>
    <dl class="p-single-works__contents p-contents">
      <dt class="p-contents__title"><?php echo esc_html($fields['works_title']); ?></dt>
      <dd class="p-contents__text"><?php echo esc_html($fields['works_description']); ?></dd>
    </dl>
  <?php endif; ?>

<?php
} ?>

  </section>

  <!-- 前の記事へ・次の記事へ -->
  <ul class="next-page l-next-page">
    <?php if (get_previous_post()) : ?>
      <li class="next-page__list"><?php previous_post_link('%link', 'PREV'); ?></li>
    <?php endif; ?>

    <li class="next-page__archive"><a href="<?php echo esc_url(home_url('/works/')); ?>">一覧</a></li>

    <?php if (get_next_post()) : ?>
      <li class="next-page__list"><?php next_post_link('%link', 'NEXT'); ?></li>
    <?php endif; ?>
  </ul>

  <!-- 関連記事 -->
  <section class="p-relation l-relation">
    <div class="l-inner">
      <h2 class="p-relation__title">おすすめ記事</h2>

      <div class="p-relation__cards p-card-list02">
        <?php
        $args = array(
          'post_type' => 'works1', // 投稿タイプを指定
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
                  </div>
                  <div class="p-card-style01__meta">
                    <div class="p-card-style01__cat">
                      <?php
                      if ($terms = get_the_terms($post->ID, 'works_category')) {
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

      </div>
    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>