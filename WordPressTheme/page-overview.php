<?php get_header(); ?>

<div class="p-sub-mv js-mv">
  <h1 class="p-sub-mv__title">企業概要</h1>
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
  <section class="p-sub-overview l-sub-overview">
    <div class="l-inner">
      <dl class="p-sub-overview__info p-explain">
        <div class="p-explain__block">
          <dt class="p-explain__header">会社名</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">設立</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">資本金</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">売上高</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">代表者</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">従業員数</dt>
          <dd class="p-explain__description">テキストが入ります。</dd>
        </div>
        <div class="p-explain__block p-explain__block--top">
          <dt class="p-explain__header">事業内容</dt>
          <dd class="p-explain__description">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
        </div>
        <div class="p-explain__block">
          <dt class="p-explain__header">所在地</dt>
          <dd class="p-explain__description">東京駅</dd>
        </div>
      </dl>

      <div class="p-sub-overview__map">
        <picture class="p-p-sub-overview__img">
          <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/overview-map.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/overview-map-sp.jpg" loading="lazy" alt="">
        </picture>
      </div>
    </div>
  </section>

  <!-- contactセクション -->
  <?php get_template_part('template-parts/contact'); ?>

</main>

<?php get_footer(); ?>