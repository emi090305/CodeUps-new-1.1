<?php get_header(); ?>

<div class="p-sub-mv js-mv">
  <h1 class="p-sub-mv__title">事業内容</h1>
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
  <section class="p-sub-content l-sub-content">
    <div class="l-inner">
      <h2 class="p-sub-content__idea-title">企業理念</h2>
      <p class="p-sub-content__idea-text">説明が入ります。説明が入ります。説明が入ります。説明が入ります。<br>説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
      <div class="p-sub-content__cards">
        <div class="p-sub-content__card p-card-style02">
          <span id="content-01" class="link-position"></span>
          <div class="p-card-style02__wrapper">
            <picture class="p-card-style02__img">
              <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-01.jpg" media="(min-width: 768px)">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-sp-01.jpg" loading="lazy" alt="事業内容 img">
            </picture>
            <div class="p-card-style02__text-box">
              <h3 class="p-card-style02__title">企業理念１</h3>
              <p class="p-card-style02__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
        <div class="p-sub-content__card p-card-style02">
          <span id="content-02" class="link-position"></span>
          <div class="p-card-style02__wrapper p-card-style02__wrapper--rev">
            <picture class="p-card-style02__img">
              <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-02.jpg" media="(min-width: 768px)">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-sp-02.jpg" loading="lazy" alt="事業内容 img">
            </picture>
            <div class="p-card-style02__text-box">
              <h3 class="p-card-style02__title">企業理念１</h3>
              <p class="p-card-style02__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
        <div class="p-sub-content__card p-card-style02">
          <span id="content-03" class="link-position"></span>
          <div class="p-card-style02__wrapper">
            <picture class="p-card-style02__img">
              <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-03.jpg" media="(min-width: 768px)">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-content-sp-03.jpg" loading="lazy" alt="事業内容 img">
            </picture>
            <div class="p-card-style02__text-box">
              <h3 class="p-card-style02__title">企業理念１</h3>
              <p class="p-card-style02__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>