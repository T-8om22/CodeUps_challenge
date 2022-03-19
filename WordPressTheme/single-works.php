<?php get_header(); ?>
<?php get_template_part('template-parts/header-hight'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="single-works" class="l-container">

   <?php if(have_posts()): ?>
      <?php while(have_posts()):the_post(); ?>

         <article class="p-single-works">
            <div class="p-single-works__inner">
               <div class="p-single-works__content">
                  <div class="p-single-works__head">
                     <h1 class="p-single-works__title"><?php the_title(); ?>様　制作実績</h1>
                     <div class="p-single-works__info">
                        <time class="p-single-works__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                        <p class="p-single-works__category"><a href="<?php echo esc_url( get_term_link( get_the_terms( get_the_ID(), 'genre' )[0], 'genre' ) ); ?>"><?php echo esc_html( get_the_terms( get_the_ID(), 'genre' )[0]->name ); ?></a></p>
                     </div>
                  </div>
                  <div class="p-single-works__body">
                     <div class="p-single-works__gallery p-gallery">
                        <div class="p-gallery__slider swiper js-gallery__slider">
                           <div class="swiper-wrapper">
                              <div class="p-gallery__box swiper-slide">
                                 <?php
                                    if (has_post_thumbnail() ) {
                                       the_post_thumbnail('large');
                                    } else {
                                       echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                                    }
                                 ?>
                              </div>

                              <?php $gallery = SCF::get('gallery'); ?>
                              <?php foreach ($gallery as $fields ) { ?>
                                 <?php $image = wp_get_attachment_image_src($fields['gallery-img'], 'large'); ?>
                                 <?php if( !empty($image[0]) ): ?>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo $image[0];?>" alt=""></div>
                                 <?php elseif($image[0] < 7): ?>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__box swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                 <?php endif; ?>
                              <?php } ?>

                           </div>
                           <div class="swiper-button-prev"></div>
                           <div class="swiper-button-next"></div>
                        </div>
                        <!-- サムネイル -->
                        <div class="p-gallery__thumbs swiper js-gallery__thumbs">
                           <div class="swiper-wrapper">
                              <div class="p-gallery__img swiper-slide">
                                 <?php
                                    if (has_post_thumbnail() ) {
                                       the_post_thumbnail('large');
                                    } else {
                                       echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                                    }
                                 ?>
                              </div>

                              <?php $gallery = SCF::get('gallery'); ?>
                              <?php foreach ($gallery as $fields ) { ?>
                                 <?php $image = wp_get_attachment_image_src($fields['gallery-img'], 'large'); ?>
                                 <?php if( !empty($image[0]) ): ?>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo $image[0];?>" alt=""></div>
                                 <?php elseif($image[0] < 7): ?>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                    <div class="p-gallery__img swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/no-img.png" alt=""></div>
                                 <?php endif; ?>
                              <?php } ?>

                           </div>
                        </div>
                     </div>
                     <div class="p-single-works__box c-block-list">

                        <?php $point_block = SCF::get('point-block'); ?>
                        <?php foreach ($point_block as $fields ) { ?>
                           <div class="c-block-list__item p-point-block">
                              <h2 class="p-point-block__title"><?php echo $fields['block-title']; ?></h2>
                              <p class="p-point-block__text"><?php echo $fields['block-text']; ?></p>
                           </div>
                        <?php } ?>

                     </div>
                  </div>
                  <?php get_template_part('template-parts/pagination-single-works'); ?>
               </div>
               <div class="p-single-works__foot">
                  <?php get_template_part('template-parts/related-article-works'); ?>
               </div>
            </div>
         </article>

      <?php endwhile; ?>
   <?php endif; ?>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>