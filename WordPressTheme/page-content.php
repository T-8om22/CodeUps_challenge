<?php get_header(); ?>
<?php get_template_part('template-parts/sub-visual'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="sub-content" class="l-container">

   <section class="p-sub-content">
      <div class="p-sub-content__inner">
         <div class="p-sub-content__content">

            <?php if(have_posts()): ?>
               <?php while(have_posts()):the_post(); ?>
                  <?php
                     $intro = get_field('intro');
                     $box_list_01 = get_field('box-list_01');
                     $image_01 = $box_list_01['box-card_01'];
                     $box_body_01 = $box_list_01['box-body_01'];
                     $box_list_02 = get_field('box-list_02');
                     $image_02 = $box_list_02['box-card_02'];
                     $box_body_02 = $box_list_02['box-body_02'];
                     $box_list_03 = get_field('box-list_03');
                     $image_03 = $box_list_03['box-card_03'];
                     $box_body_03 = $box_list_03['box-body_03'];
                  ?>

                  <div class="p-sub-content__intro">

                     <?php if ( $intro['intro-text'] ) : ?>
                        <h2 class="p-sub-content__title"><?php echo $intro['intro-title']; ?></h2>
                        <p class="p-sub-content__text"><?php echo $intro['intro-text']; ?></p>
                     <?php endif; ?>

                  </div>
                  <div class="p-sub-content__body c-box-list">

                     <?php if( $box_body_01['box-text_01'] ) : ?>
                        <div id="philosophy_01" class="c-box-list__item">
                           <div class="c-box-list__part p-box-card">
                              <div class="p-box-card__img">

                                 <?php if( !empty($image_01) ): ?>
                                    <img src="<?php echo $image_01['url']; ?>" alt="<?php echo $image_01['alt']; ?>">
                                 <?php endif; ?>

                              </div>
                           </div>
                           <div class="c-box-list__part p-box-body u-margin-left">
                              <h3 class="p-box-body__title"><?php echo $box_body_01['box-title_01']; ?></h3>
                              <p class="p-box-body__text"><?php echo $box_body_01['box-text_01']; ?></p>
                           </div>
                        </div>
                     <?php endif; ?>
                     <?php if( $box_body_02['box-text_02'] ) : ?>
                        <div id="philosophy_02" class="c-box-list__item c-box-list__item--reverse">
                           <div class="c-box-list__part p-box-card u-margin-left">
                              <div class="p-box-card__img">

                                 <?php if( !empty($image_02) ): ?>
                                    <img src="<?php echo $image_02['url']; ?>" alt="<?php echo $image_02['alt']; ?>">
                                 <?php endif; ?>

                              </div>
                           </div>
                           <div class="c-box-list__part p-box-body">
                              <h3 class="p-box-body__title"><?php echo $box_body_02['box-title_02']; ?></h3>
                              <p class="p-box-body__text"><?php echo $box_body_02['box-text_02']; ?></p>
                           </div>
                        </div>
                     <?php endif; ?>
                     <?php if( $box_body_03['box-text_03'] ) : ?>
                        <div id="philosophy_03" class="c-box-list__item">
                           <div class="c-box-list__part p-box-card">
                              <div class="p-box-card__img">

                                 <?php if( !empty($image_03) ): ?>
                                    <img src="<?php echo $image_03['url']; ?>" alt="<?php echo $image_03['alt']; ?>">
                                 <?php endif; ?>

                              </div>
                           </div>
                           <div class="c-box-list__part p-box-body u-margin-left">
                              <h3 class="p-box-body__title"><?php echo $box_body_03['box-title_03']; ?></h3>
                              <p class="p-box-body__text"><?php echo $box_body_03['box-text_03']; ?></p>
                           </div>
                        </div>
                     <?php endif; ?>

                  </div>

               <?php endwhile; ?>
            <?php endif; ?>

         </div>
      </div>
   </section>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>