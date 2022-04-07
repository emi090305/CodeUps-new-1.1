<?php if (is_home() || is_category(['category', 'etc'])) : //お知らせ一覧ページ、各カテゴリーページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-news.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-news-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>

<?php elseif (is_page('content')) : //事業内容ページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-content.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-content-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>

<?php elseif (is_page('works') || is_tax('works_category', ['ec-site', 'lp', 'corporate-site'])) : //制作実績一覧ページ、タクソノミーの各タームページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-works.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-works-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>

<?php elseif (is_page('overview')) : //企業概要ページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-overview.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-overview-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>

<?php elseif (is_page('blog') || is_tax('blog_category', ['cate', 'category1', 'categorycategory'])) : //ブログ記事一覧ページ、タクソノミーの各タームページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-blog.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-blog-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>
  
<?php elseif (is_page('contact')) : //お問い合わせページの場合（条件分岐）
?>
  <picture class="p-sub-mv__img">
    <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-contact.jpg" media="(min-width: 768px)">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/sub-mv-contact-sp.jpg" loading="lazy" alt="サブビジュアル">
  </picture>

<?php endif; ?>