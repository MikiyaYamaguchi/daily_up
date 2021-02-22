<?php get_header(); ?>
<main>
    <div class="single_container container">
      <div class="main_column">
      <section>
      <ul class="bread_wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php $cat = get_the_category(); echo get_category_parents($cat[0], true, '&nbsp;>&nbsp;'); ?>
        <?php the_title(''); ?>
      </ul>
    <?php if(have_posts()): while(have_posts()):the_post(); ?>
      <div class="bg_gray">
      <div class="row single">
        <p class="text-right m0"><?php the_category(','); ?></p>
        <div class="tag_list">
          <p class="m0"><?php the_tags('', ' ', '<br />' ); ?></p>
        </div>
        <h1><?php the_title(); ?></h1>
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
        <div class="row">
          <figure>
            <?php the_post_thumbnail('full'); ?>
          </figure>
        </div>
        <div class="row">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- DailyUp記事最上部広告 -->
          <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-2725422849471150"
               data-ad-slot="2174452254"
               data-ad-format="auto"
               data-full-width-responsive="false"></ins>
          <script>
               (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>
        <p><?php the_content('Read more'); ?></p>
        <div class="row">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- DailyUp記事最下部広告 -->
    <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2725422849471150"
     data-ad-slot="6635607292"
     data-ad-format="auto"
     data-full-width-responsive="false"></ins>
    <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
        </div>
        <div class="next_prev_btns">
          <?php previous_post_link('%link','＜%title'); ?>
          <?php next_post_link('%link','%title＞'); ?>
        </div>
      </div>
    <?php endwhile; endif; ?>
    </section>
    <section class="bg_gray">
      <?php comments_template(); ?>
    </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
