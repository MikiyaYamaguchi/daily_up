<?php get_header(); ?>
<?php
  $searchTag = $GET_['tag'];
  $searchTagObj = get_term_by('slug', $searchTag,'post_tag');
  $searchTagStr = $searchTagObj->name;
  $found_cnt = $wp_query->post_count;
 ?>
<main>
  <div class="container">
    <div class="main_column">
      <ul class="bread_wrap row">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php echo $search_query; ?>
      </ul>
      <section class="bg_gray">
        <?php global $wp_query;
        $total_results = $wp_query -> found_posts;
        $search_query = get_search_query();
         ?>
          <div class="row">
            <div class="row item_list">
          <?php
          if($total_results > 0):
          if(have_posts()):
          while(have_posts()): the_post();
           ?>
           <article class="article_item col span_12">
             <a href="<?php echo the_permalink(); ?>">
               <figure>
                 <?php the_post_thumbnail(); ?>
                 <figcaption><?php echo the_category(); ?></figcaption>
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
             <?php endwhile; endif; else: ?>
               <p class="text-center"><?php echo $search_query; ?>に一致する情報は見つかりませんでした。</p>
             <?php endif; ?>
             <div class="pagenation">
               <?php wp_pagination(); ?>
             </div>
           </div>
         </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
</div>
</main>
<?php get_footer(); ?>
