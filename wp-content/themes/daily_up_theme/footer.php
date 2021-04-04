<div class="pagetop"><a href="#wrap"></a></div>
<footer>
  <div class="container">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer',
      'container'      => 'div',
      'depth'          => 1,
      'menu_class'     => 'footer_nav',
    ));
    ?>
    <p class="text-center">Copyright &copy; <?php bloginfo('name'); ?> All Rights Reserved.</p>
  </div>
</footer>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.tile.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
</body>

</html>