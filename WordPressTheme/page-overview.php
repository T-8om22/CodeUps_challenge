<?php get_header(); ?>
<?php get_template_part('template-parts/sub-visual'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main id="sub-overview" class="l-container">

   <section class="p-sub-overview">
      <div class="p-sub-overview__inner">
         <div class="p-sub-overview__content">
            <dl class="p-sub-overview__info p-explain">

               <?php $info = SCF::get('info'); ?>
               <?php foreach ($info as $fields ) { ?>
                  <div class="p-explain__row">
                     <dt class="p-explain__term"><?php echo $fields['term']; ?></dt>
                     <dd class="p-explain__description"><?php echo $fields['description']; ?></dd>
                  </div>
               <?php } ?>

            </dl>
            <div class="p-sub-overview__access p-map">
               <div class="p-map__box">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7479746645863!2d139.7454329!3d35.6585805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1641779748627!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
            </div>
         </div>
      </div>
   </section>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>