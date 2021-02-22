<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500&display=swap" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
	  <script data-ad-client="ca-pub-2725422849471150" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <div class="hdr_top">
        <div class="container">
        <div class="logo">
          <figure class="text-left">
            <a href="/">
            <img src="/wp-content/uploads/2020/08/logo.png" alt="Daily Up">
            </a>
          </figure>
        </div>
        <div class="sp_menu_icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
        </div>
      </div>
      <div class="hdr_nav">
        <div class="container">
          <?php
    wp_nav_menu( array(
      'theme_location' => 'global',
      'container'      => 'div',
      'depth'          => 1,
      'menu_class'     => 'global_nav',
    ) );
  ?>
      <div class="search_menu">
        <ul class="category_list row">
          <h2>Category</h2>
          <?php
          // パラメータを指定
          $args = array(
            // カテゴリー内の記事数順で指定
            'orderby' => 'count',
            // 降順で指定
            'order' => 'DSC'
          );
          $categories = get_categories( $args );
          foreach( $categories as $category ){
            echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> </li> ';
          }?>
        </ul>
        <ul class="tag_list">
          <h2>tag</h2>
          <?php
          // パラメータを指定
          $args = array(
            // タグ名順で指定
              'orderby' => 'name',
              // 昇順で指定
              'order' => 'ASC'
          );
          $posttags = get_tags( $args );

          if ( $posttags ){
            echo ' <ul class="tag-list"> ';
            foreach( $posttags as $tag ) {
              echo '<li><a href="'. get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
            }
            echo ' </ul> ';
          }
          ?>
        </ul>
      </div>
        </div>
      </div>
      <div class="hdr_sns">
        <div class="single_sns">
          <a class="twitter icon-twitter" href="//twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&<?php echo urlencode(get_permalink()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Twitterでシェアする">
          <img src="/wp-content/uploads/2020/08/twitter.png" alt="twitter">
          </a>
          <a class="facebook icon-facebook" href="//www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" title="facebookでシェアする">
          <img src="/wp-content/uploads/2020/08/facebook.png" alt="facebook">
          </a>
        </div>
        <div class="other_sns">
          <a href="https://twitter.com/DailyUpppp" target="_blank" class="twitter">
          <img src="/wp-content/uploads/2020/08/twitter.png" alt="twitter">
          </a>
          <a href="" target="_blank" class="facebook">
          <img src="/wp-content/uploads/2020/08/facebook.png" alt="facebook">
          </a>
        </div>
      </div>
    </header>
    <div class="curtain"></div>
