<?php get_header(); ?>
<?php get_template_part('template-parts/header-hight'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="single-blog" class="l-container">

   <?php if(have_posts()): ?>
      <?php while(have_posts()):the_post(); ?>

         <article class="p-single-post">
            <div class="p-single-post__inner">
               <div class="p-single-post__content">
                  <div class="p-single-post__head">
                     <h1 class="p-single-post__title"><?php the_title(); ?></h1>
                     <div class="p-single-post__info">
                        <time class="p-single-post__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                        <p class="p-single-post__category"><a href="<?php echo esc_url( get_term_link( get_the_terms( get_the_ID(), 'topics' )[0], 'topics' ) ); ?>"><?php echo esc_html( get_the_terms( get_the_ID(), 'topics' )[0]->name ); ?></a></p>
                     </div>
                     <div class="p-single-post__img">
                        <?php
                           if (has_post_thumbnail() ) {
                              the_post_thumbnail('large');
                           } else {
                              echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                           }
                        ?>
                     </div>
                  </div>
                  <div class="p-single-post__body">

                     <?php the_content(); ?>

                  </div>
                  <?php get_template_part('template-parts/pagination-single-blog'); ?>
               </div>
               <div class="p-single-post__foot">
                  <?php get_template_part('template-parts/related-article-blog'); ?>
               </div>
            </div>
         </article>

      <?php endwhile; ?>
   <?php endif; ?>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>