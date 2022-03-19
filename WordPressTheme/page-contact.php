<?php get_header(); ?>
<?php get_template_part('template-parts/sub-visual'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="sub-contact" class="l-container">
   <section class="p-sub-contact">
      <div class="p-sub-contact__inner">
         <div class="p-sub-contact__content p-form">

            <?php the_content(); ?>

         </div>
      </div>
   </section>
</main>
<?php get_footer(); ?>