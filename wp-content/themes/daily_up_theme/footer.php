<div class="pagetop"><a href="#wrap"></a></div>
<footer>
  <div class="container">
    <?php if (!is_home() && !is_front_page()) : ?>
      <?php include('bread.php'); ?>
    <?php endif; ?>
    <div class="ftr-content-inner">
      <div class="ftr-search-wrap">
        <?php get_search_form(); ?>
      </div>
      <div class="ftr-content-wrap">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container'      => 'div',
          'depth'          => 1,
          'menu_class'     => 'footer_nav',
          'items_wrap'      => '<ul>%3$s<li class="sns_btn"><a href="#" target="_blank"><img src="/daily_up/wp-content/uploads/twitter_icon_bk.png" alt="Twitter"></a></li></ul>',
        ));
        ?>
        <p class="copy-light">Copyright &copy; <?php bloginfo('name'); ?> All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.tile.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
</body>

</html>