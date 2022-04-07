<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name=“robots” content=“noindex”>
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="l-header p-header">
    <div class="p-header__inner js-header">

      <?php if (is_front_page()) : //トップページの場合（条件分岐）
      ?>
        <h1 class="p-header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/CodeUps.svg" alt="タイトルロゴ">
          </a>
        </h1>
      <?php else : //それ以外の場合（条件分岐）
      ?>
        <div class="p-header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/CodeUps.svg" alt="タイトルロゴ">
          </a>
        </div>
      <?php endif; ?>

      <!-- グローバルメニュー -->
      <div class="p-header__global-menu p-global-menu">
        <div class="p-global-menu__inner">
          <ul class="p-global-menu__items">
            <li class="p-global-menu__item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
            <li class="p-global-menu__item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
            <li class="p-global-menu__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
            <li class="p-global-menu__item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
            <li class="p-global-menu__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
            <li class="p-global-menu__item--contact"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- ハンバーガーメニュー -->
    <div class="p-header__hamburger c-hamburger js-hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <!-- ドロワーメニュー -->
  <div class="p-header__drawer-menu p-drawer-menu js-drawer-menu">
    <ul class="p-drawer-menu__items">
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
      <li class="p-drawer-menu__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
    </ul>
  </div>