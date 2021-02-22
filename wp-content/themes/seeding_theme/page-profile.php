<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main_column">
      <ul class="bread_wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php single_post_title(); ?>
      </ul>
      <?php
    if(have_posts()): while(have_posts()): the_post();?>
    <h1>Profile<span>プロフィール</span></h1>
    <div class="bg_gray">
      <div class="bg_white">
        <?php
          $name = get_field('name');
          $img = get_field('picture');
          $about = get_field('about');
         ?>
         <section class="about">
           <div class="container">
             <div class="row picture">
                 <figure>
                   <img src="<?php echo $img['url']; ?>" alt="<?php echo $name; ?>">
                 </figure>
                 </div>
                 <p class="profile_name text-center"><?php echo $name; ?></p>
           </div>
         </section>
         <section>
           <div class="container">
             <div class="row profile">
               <p>
                 <?php echo $about; ?>
               </p>
             </div>
           </div>
         </section>
        <?php endwhile; endif; ?>
      </div>
    </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
