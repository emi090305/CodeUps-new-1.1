<?php get_header(); ?>

<section class="p-mv js-mv">
  <div class="p-mv__title-box">
    <h2 class="p-mv__title">メインタイトルが入ります</h2>
    <p class="p-mv__sub-title">サブタイトルが入ります</p>
  </div>

  <div class="p-mv__slider">
    <div class="swiper">
      <div class="swiper__mv-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-img">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/mv-01.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/mv-sp-01.jpg" loading="lazy" alt="メインビジュアル img">
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/mv-02.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/mv-sp-02.jpg" loading="lazy" alt="メインビジュアル img">
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/mv-03.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/mv-sp-03.jpg" loading="lazy" alt="メインビジュアル img">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<main>
  <section class="p-news l-news">
    <div class="p-news__inner l-inner">

      <!-- 最新の投稿1件表示 -->
      <?php
      $news_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'posts_per_page' => 1,
        )
      );
      ?>
      <?php if ($news_query->have_posts()) : ?>
        <?php while ($news_query->have_posts()) : ?>
          <?php $news_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="p-news__link p-news-style">
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
            <h3 class="p-news-style__title"><span><?php the_title(); ?></span></h3>
          </a>
        <?php endwhile; ?>
      <?php else : ?>
        投稿がありません
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

      <div class="p-news__btn">
        <a class="c-btn-main" href="<?php echo esc_url(home_url('/news/')); ?>">すべて見る</a>
      </div>
    </div>
  </section>

  <section class="p-content l-content">
    <!-- 背景黄色線 -->
    <div class="p-content__bg-line"></div>
    <div class="l-inner">
      <h2 class="c-section-title">事業内容
        <span class="c-section-title__en">Content</span>
      </h2>
    </div>
    <div class="p-content__items">
      <a href="<?php echo esc_url(home_url('/content/')); ?>" class="p-content__item">
        <picture class="p-content__img">
          <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/content-01.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/content-sp-01.jpg" loading="lazy" alt="事業内容 img">
        </picture>
        <h3 class="p-content__title">経営理念ページへ</h3>
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>/content#content-01" class="p-content__item">
        <picture class="p-content__img">
          <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/content-02.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/content-sp-02.jpg" loading="lazy" alt="事業内容 img">
        </picture>
        <h3 class="p-content__title">理念1へ</h3>
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>/content#content-02" class="p-content__item">
        <picture class="p-content__img">
          <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/content-03.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/content-sp-03.jpg" loading="lazy" alt="事業内容 img">
        </picture>
        <h3 class="p-content__title">理念2へ</h3>
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>/content#content-03" class="p-content__item">
        <picture class="p-content__img">
          <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/content-04.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/content-sp-04.jpg" loading="lazy" alt="事業内容 img">
        </picture>
        <h3 class="p-content__title">理念3へ</h3>
      </a>
    </div>
  </section>

  <section class="p-works l-works">
    <div class="l-inner">
      <h2 class="c-section-title">制作実績
        <span class="c-section-title__en">Works</span>
      </h2>
    </div>

    <div class="p-works__wrapper">
      <div class="p-works__slider">
        <div class="swiper">
          <div class="swiper__works-container">
            <div class="swiper-wrapper">

              <?php
              $news_query = new WP_Query(
                array(
                  'post_type'      => 'works1',
                  'posts_per_page' => 3,
                )
              );
              ?>
              <?php if ($news_query->have_posts()) : ?>
                <?php while ($news_query->have_posts()) : ?>
                  <?php $news_query->the_post(); ?>
                  <div class="swiper-slide">
                    <div class="slide-img">
                      <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                      } else {
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/sub-works-01.jpg" alt="アイキャッチ">';
                      }
                      ?>
                      <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/img/works-01.jpg" alt=""> -->
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>

            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="p-works__text-box p-text-box">
        <div class="p-text-box__inner">
          <h3 class="p-text-box__title">メインタイトルが入ります。</h3>
          <p class="p-text-box__text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
          <div class="p-text-box__btn">
            <a class="c-btn-main" href="<?php echo esc_url(home_url('/works/')); ?>">詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
    <!-- pc黒背景 -->
    <div class="p-works__bg"></div>
  </section>

  <section class="p-overview">
    <!-- 背景黄色線 -->
    <div class="p-overview__bg-line"></div>
    <div class="l-inner">
      <h2 class="c-section-title">企業概要
        <span class="c-section-title__en">Overview</span>
      </h2>
    </div>
    <div class="p-overview__wrapper">
      <picture class="p-overview__img">
        <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/overview.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/overview-sp.jpg" loading="lazy" alt="企業概要 img">
      </picture>
      <div class="p-overview__text-box p-text-box">
        <div class="p-text-box__inner">
          <h3 class="p-text-box__title">メインタイトルが入ります。</h3>
          <p class="p-text-box__text">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
          <div class="p-text-box__btn">
            <a class="c-btn-main" href="<?php echo esc_url(home_url('/overview/')); ?>">詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
    <!-- pc黒背景 -->
    <div class="p-overview__bg"></div>
  </section>

  <section class="p-blog l-blog">
    <div class="l-inner">
      <h2 class="c-section-title">ブログ
        <span class="c-section-title__en">Blog</span>
      </h2>
      <div class="p-blog__items p-card-list01">
        <span class="c-tag-new"></span>

        <?php
        $news_query = new WP_Query(
          array(
            'post_type'      => 'blog1',
            'posts_per_page' => 3,
          )
        );
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : ?>
            <?php $news_query->the_post(); ?>
            <div class="p-card-list01__item p-card-style01">
              <a href="<?php the_permalink(); ?>">
                <div class="p-card-style01__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/sub-works-02.jpg" alt="アイキャッチ">';
                  }
                  ?> </div>
                <div class="p-card-style01__body">
                  <div class="p-card-style01__contents">
                    <h3 class="p-card-style01__title"><?php the_title(); ?></h3>
                    <p class="p-card-style01__text"><?php the_excerpt(); ?></p>
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
                    <time datetime="<?php the_time( 'c' );?>" class="p-card-style01__date"><?php the_time('Y/m/d'); ?></time>
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
      <div class="p-blog__btn">
        <a class="c-btn-main" href="<?php echo esc_url(home_url('/blog/')); ?>">詳しく見る</a>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>