<div class="l-sub-visual js-sub-visual">
   <picture class="l-sub-visual__img">
      <?php // sub-visual
         $sub_visual_content = get_field('sub-visual', 15);
         $content_sp = $sub_visual_content['sp'];
         $content_pc = $sub_visual_content['pc'];
      ?>

      <?php if (is_home() || is_category() ): ?>
         <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/news/pc/sub-visual.jpg" media="(min-width: 768px)">
         <img src="<?php echo get_template_directory_uri() ?>/assets/img/news/sp/sub-visual.jpg" alt="サブビジュアル">
      <?php elseif( is_page('content') && wp_is_mobile() ) : ?>
         <img src="<?php echo $content_sp['url']; ?>" alt="<?php echo $content_sp['alt']; ?>">
      <?php elseif( is_page('content') && !wp_is_mobile() ) : ?>
         <img src="<?php echo $content_pc['url']; ?>" alt="<?php echo $content_pc['alt']; ?>">
      <?php elseif (is_post_type_archive('works') || is_tax( 'genre' )): ?>
         <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/works/pc/sub-visual.jpg" media="(min-width: 768px)">
         <img src="<?php echo get_template_directory_uri() ?>/assets/img/works/sp/sub-visual.jpg" alt="サブビジュアル">
      <?php elseif (is_page('overview')) : ?>
         <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/overview/pc/sub-visual.jpg" media="(min-width: 768px)">
         <img src="<?php echo get_template_directory_uri() ?>/assets/img/overview/sp/sub-visual.jpg" alt="サブビジュアル">
      <?php elseif (is_post_type_archive('blog') || is_tax( 'topics' )): ?>
         <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/blog/pc/sub-visual.jpg" media="(min-width: 768px)">
         <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog/sp/sub-visual.jpg" alt="サブビジュアル">
      <?php elseif (is_page('contact')) : ?>
         <source srcset="<?php echo get_template_directory_uri() ?>/assets/img/contact/pc/sub-visual.jpg" media="(min-width: 768px)">
         <img src="<?php echo get_template_directory_uri() ?>/assets/img/contact/sp/sub-visual.jpg" alt="サブビジュアル">
      <?php endif; ?>

   </picture>
   <div class="l-sub-visual__content">

      <?php if (is_home() || is_category() || is_post_type_archive('works') || is_tax( 'genre' ) || is_post_type_archive('blog') || is_tax( 'topics' ) ): ?>
         <h1 class="l-sub-visual__title"><?php the_archive_title(); ?></h1>
      <?php else : ?>
         <h1 class="l-sub-visual__title"><?php the_title(); ?></h1>
      <?php endif; ?>

   </div>
</div>