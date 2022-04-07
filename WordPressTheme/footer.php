<footer class="p-footer l-footer">
  <div class="p-footer__wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer__logo">
      <img src="<?php echo get_template_directory_uri() ?>/assets/img/CodeUps.svg" alt="タイトルロゴ">
    </a>
    
    <!-- footerメニュー -->
    <div class="p-footer__menu">
      <ul class="p-footer__menu-items">
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
        <li class="p-footer__menu-item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
      </ul>
    </div>
  </div>
  <div class="p-footer__copy"><small lang="en">&copy;</small> 2021 CodeUps Inc.</div>
</footer>

<!-- トップへ戻る -->
<a class="c-to-top" href="#"></a>

<?php wp_footer(); ?>
</body>

</html>