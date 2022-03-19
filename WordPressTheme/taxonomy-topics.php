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

<main id="taxonomy-topics" class="l-container">

   <section class="p-sub-blog">
      <div class="p-sub-blog__inner">
         <nav class="p-sub-blog__menu p-navigation-archive">
            <ul class="p-navigation-archive__items">
               <li class="p-navigation-archive__item"><a href="<?php echo $blog_link; ?>">ALL</a></li>

               <?php
                  $topics_terms = get_terms( 'topics', array( 'hide_empty' => false ) );
                  $cat = get_queried_object();
                  $cat_name = $cat->name;
               ?>
               <?php foreach ( $topics_terms as $topics_term ) : ?>
                  <li class="p-navigation-archive__item"><a href="<?php echo esc_url( get_term_link( $topics_term, 'topics' ) ); ?>" class="<?php if( $cat_name == esc_html($topics_term->name)){ echo "is-active";}; ?>"><?php echo esc_html( $topics_term->name ); ?></a></li>
               <?php endforeach; ?>

            </ul>
         </nav>
         <div class="p-sub-blog__content">
            <div class="c-post-list">

               <?php if(have_posts()): ?>
                  <?php while(have_posts()):the_post(); ?>

                  <a href="<?php the_permalink(); ?>" class="c-post-list__item">
                     <article class="p-post">
                        <div class="p-post__img">
                           <?php
                              if (has_post_thumbnail() ) {
                                 the_post_thumbnail('large');
                              } else {
                                 echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                              }
                           ?>
                        </div>
                        <div class="p-post__head">
                           <h3 class="p-post__title">
                              <?php
                                 if(mb_strlen($post->post_title, 'UTF-8')>29){
                                    $title= mb_substr($post->post_title, 0, 29, 'UTF-8');
                                    echo $title.'…';
                                 }else{
                                    echo $post->post_title;
                                 }
                              ?>
                           </h3>
                        </div>
                        <div class="p-post__body">
                           <p class="p-post__text">
                              <?php
                                 if(mb_strlen($post->post_content,'UTF-8')>40){
                                    $content= str_replace('\n', '', mb_substr(strip_tags($post-> post_content), 0, 40,'UTF-8'));
                                    echo $content.'…';
                                 }else{
                                    echo str_replace('\n', '', strip_tags($post->post_content));
                                 }
                              ?>
                           </p>
                        </div>
                        <div class="p-post__foot">
                           <p class="p-post__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'topics' )[0]->name ); ?></p>
                           <time class="p-post__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
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