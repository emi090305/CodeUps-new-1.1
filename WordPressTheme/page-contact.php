<?php get_header(); ?>

<div class="p-sub-mv js-mv">
  <h1 class="p-sub-mv__title">お問い合わせ</h1>
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
  <div class="p-sub-contact l-sub-contact">
    <div class="l-inner">
      <div class="p-sub-contact__items p-form">
        <!-- contact form7 ショートコード-->
        <?php echo do_shortcode('[contact-form-7 id="209" title="お問い合わせ"]'); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>