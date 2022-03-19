<?php get_header(); ?>
<?php get_template_part('template-parts/sub-visual'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="sub-news" class="l-container">

   <section id="sub-news" class="p-sub-news">
      <div class="p-sub-news__inner">
         <div class="p-sub-news__content">
            <div class="c-announce-list">

               <?php if(have_posts()): ?>
                  <?php while(have_posts()):the_post(); ?>

                     <a href="<?php the_permalink(); ?>" class="c-announce-list__item p-announce">
                        <article class="p-announce__wrap">
                           <div class="p-announce__info">
                              <p class="p-announce__date"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time></p>
                              <?php
                                 $category = get_the_category();
                                 if ($category[0] ) {
                                    echo '<span class="p-announce__category">' . $category[0]->cat_name . '</span>';
                                 }
                              ?>
                           </div>
                           <h3 class="p-announce__title"><?php the_title(); ?></h3>
                        </article>
                     </a>

                  <?php endwhile; ?>
               <?php endif; ?>

            </div>
            <?php get_template_part('template-parts/pagination-archive'); ?>
         </div>
      </div>
   </section>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>