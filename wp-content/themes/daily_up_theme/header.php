<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500&display=swap" rel="stylesheet">
  <title></title>
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="header-container">
      <div class="row">
        <div class="header-logo">
          <div class="logo">
            <a href="/daily_up/">
              <img src="wp-content/uploads/daily_white.svg" alt="Daily Up">
            </a>
          </div>
        </div>
        <p class="hdr-copy text-bold">IT・WEBの知識を</p>
        <div class="header-nav">
          <?php
             wp_nav_menu(array(
              'theme_location' => 'global',
              'container'      => 'div',
              'depth'          => 1,
              'menu_class'     => 'global_nav',
              'menu_class'     => 'global_nav', 
      'items_wrap'      => '<ul>%3$s<li class="sns_btn"><a href="#" target="_blank"><img src="/daily_up/wp-content/uploads/twitter_icon_wh.png" alt="Twitter"></a></li></ul>'
            ));
          ?>
          
          
        </div>
      </div>
      <div class="row">
        <div class="search">
         <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </header>