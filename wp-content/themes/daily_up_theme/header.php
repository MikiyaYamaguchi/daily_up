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
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet" type="text/css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php if (is_home() || is_front_page()) : ?>
    <header>
      <div class="sp-icon">
        <a href="#"><img src="/daily_up/wp-content/uploads/twitter_icon_wh.png" alt="Twitter"></a>
      </div>
      <div class="sp-menu">
        <div class="sp-menu-column">
          <div class="sp-menu-content-wrap">
            <div class="row">
              <p class="sp-menu-title">Category</p>
              <div class="row">
                <ul>
                  <?php
                  wp_list_categories(array(
                    'title_li' => '',  //デフォルトで出力されるタイトルを非表示
                    'show_count' => 1, //各カテゴリーに投稿数を表示する
                    'number' => '4'
                  ));
                  ?>
                </ul>
                <p class="more"><a href="/daily_up/category_list">もっと見る</a></p>
              </div>
            </div>
            <div class="row">
              <p class="sp-menu-title">Tag</p>
              <div class="row">
                <ul>
                  <?php
                  $args = array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => '20'
                  );
                  $posttags = get_tags($args);
                  ?>
                </ul>
                <ul class="sp-menu-tag-list">
                  <?php
                  if (!empty($posttags)) :
                    foreach ($posttags as $tag) : ?>
                      <li>
                        <a href='<?php echo get_tag_link($tag->term_id); ?>'>#<?php echo $tag->name ?></a>
                      </li>
                    <?php
                    endforeach;
                  else :
                    ?>
                    <p>タグなし</p>
                  <?php endif; ?>
                </ul>
                <p class="more"><a href="/daily_up/tag_list/">もっと見る</a></p>
              </div>
            </div>
            <div class="row">
              <div class="row">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="header-container">
        <div class="row">
          <div class="drawer-wrap">
            <div class="drawer-box">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="header-logo">
            <div class="logo">
              <a href="/daily_up/">
                <img src="wp-content/uploads/daily_white.svg" alt="Daily Up">
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
              'items_wrap'      => '<ul>%3$s<li class="sns_btn"><a href="#" target="_blank"><img src="/daily_up/wp-content/uploads/twitter_icon_wh.png" alt="Twitter"></a></li></ul>'
            ));
            ?>
          </div>
        </div>
        <div class="row">
          <p class="hdr-copy text-bold">IT・WEBの知識を</p>
          <div class="search">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </header>
  <?php else : ?>
    <header>
      <div class="lower-header-container">
        <div class="lower-logo">
          <a href="/daily_up/">
            <img src="/daily_up/wp-content/uploads/daily_black.svg" alt="Daily Up">
          </a>
        </div>
        <div class="lower-icon">
          <a href="#">
            <img src="/daily_up/wp-content/uploads/twitter_icon_bk.png" alt="Twitter">
          </a>
        </div>
        <div class="lower-drawer-wrap">
          <div class="lower-drawer-box">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="sp-menu">
          <div class="sp-menu-column">
            <div class="sp-menu-content-wrap">
              <div class="row">
                <p class="sp-menu-title">Category</p>
                <div class="row">
                  <ul>
                    <?php
                    wp_list_categories(array(
                      'title_li' => '',  //デフォルトで出力されるタイトルを非表示
                      'show_count' => 1, //各カテゴリーに投稿数を表示する
                      'number' => '4'
                    ));
                    ?>
                  </ul>
                  <p class="more"><a href="/daily_up/category_list">もっと見る</a></p>
                </div>
              </div>
              <div class="row">
                <p class="sp-menu-title">Tag</p>
                <div class="row">
                  <ul>
                    <?php
                    $args = array(
                      'orderby' => 'count',
                      'order' => 'DESC',
                      'number' => '20'
                    );
                    $posttags = get_tags($args);
                    ?>
                  </ul>
                  <ul class="sp-menu-tag-list">
                    <?php
                    if (!empty($posttags)) :
                      foreach ($posttags as $tag) : ?>
                        <li>
                          <a href='<?php echo get_tag_link($tag->term_id); ?>'>#<?php echo $tag->name ?></a>
                        </li>
                      <?php
                      endforeach;
                    else :
                      ?>
                      <p>タグなし</p>
                    <?php endif; ?>
                  </ul>
                  <p class="more"><a href="/daily_up/tag_list/">もっと見る</a></p>
                </div>
              </div>
              <div class="row">
                <div class="row">
                  <?php get_search_form(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php endif; ?>