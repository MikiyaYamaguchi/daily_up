<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main_column">
    <ul class="bread_wrap">
      <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
      <?php $cat = get_the_category(); echo get_category_parents($cat[0], true, '&nbsp;'); ?>
    </ul>
    <h1><?php single_cat_title(); ?></h1>
    <div class="bg_gray">
      <section>
        <div class="row item_list">
              <?php if ( have_posts() ): ?>
              <?php while ( have_posts() ) : the_post(); ?>
                  <article class="article_item col span_12">
                    <a href="<?php echo the_permalink(); ?>">
                        　<figure>
                          <a href="<?php echo the_permalink(); ?>">
                          <?php the_post_thumbnail(); ?>
                          </a>
                          </figure>
                          <div>
                            <h2 class="ttl">
                              <?php
                              if(mb_strlen($post->post_title, 'UTF-8')>20){
                              	$title= mb_substr($post->post_title, 0, 20, 'UTF-8');
                              	echo $title.'……';
                              }else{
                              	echo $post->post_title;
                              }
                              ?>
                            </h2>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <time class="date text-right"><?php the_time('Y.n.j'); ?></time>
                          </div>
                        </a>
                  </article>
              <?php endwhile; ?>
              <?php else: ?>
                  <!--投稿が見つからない-->
                  <p>記事がありません。</p>
                  <!--//投稿が見つからない-->
              <?php endif; ?>
        </div>
        <div class="pagenation">
          <?php wp_pagination(); ?>
        </div>
      </section>
    </div>
  </div>
  <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
