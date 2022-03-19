<?php get_header(); ?>
<?php get_template_part('template-parts/sub-visual'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>

<main id="sub-works" class="l-container">

   <section class="p-sub-works">
      <div class="p-sub-works__inner">
         <nav class="p-sub-works__menu p-navigation-archive">
            <ul class="p-navigation-archive__items">
               <li class="p-navigation-archive__item"><a href="<?php echo $works_link; ?>" class="is-active">ALL</a></li>

               <?php $genre_terms = get_terms( 'genre', array( 'hide_empty' => false ) ); ?>
               <?php foreach ( $genre_terms as $genre_term ) : ?>
                  <li class="p-navigation-archive__item"><a href="<?php echo esc_url( get_term_link( $genre_term, 'genre' ) ); ?>"><?php echo esc_html( $genre_term->name ); ?></a></li>
               <?php endforeach; ?>

            </ul>
         </nav>
         <div class="p-sub-works__content">
            <div class="c-card-list">

               <?php if(have_posts()): ?>
                  <?php while(have_posts()):the_post(); ?>

                     <a href="<?php the_permalink(); ?>" <?php post_class( array( 'c-card-list__item' ) ); ?>>
                        <article class="p-card">
                           <div class="p-card__img">
                              <?php
                                 if (has_post_thumbnail() ) {
                                    the_post_thumbnail('large');
                                 } else {
                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                                 }
                              ?>
                              <span class="p-card__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'genre' )[0]->name ); ?></span>
                           </div>
                           <div class="p-card__body">
                              <h3 class="p-card__title">
                                 <?php
                                    if(mb_strlen($post->post_title, 'UTF-8')>13){
                                       $title= mb_substr($post->post_title, 0, 13, 'UTF-8');
                                       echo $title.'…';
                                    }else{
                                       echo $post->post_title;
                                    }
                                 ?>
                              </h3>
                           </div>
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