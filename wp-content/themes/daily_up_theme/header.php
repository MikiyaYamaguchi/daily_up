<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <title></title>
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet" type="text/css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div class="row">
        <div class="header-logo">
          <div class="logo">
            <a href="/daily_up/">
              <img src="/wp-content/uploads/2020/08/logo.png" alt="Daily Up">
            </a>
          </div>
        </div>
        <div class="header-nav">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'global',
            'container'      => 'div',
            'depth'          => 1,
            'menu_class'     => 'global_nav',
          ));
          ?>
        </div>
      </div>
    </div>
  </header>