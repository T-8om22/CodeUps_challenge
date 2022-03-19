<?php get_header(); ?>
<?php get_template_part('template-parts/main-visual'); ?>
<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>
<?php //サブクエリ news
   $news_query = new WP_Query(
      array(
         'post_type' => 'post',
         'posts_per_page' => 1,
      )
   );
?>
<?php //サブクエリ works
   $works_query = new WP_Query(
      array(
         'post_type' => 'works',
         'posts_per_page' => 3,
      )
   );
?>
<?php //サブクエリ blog
   $blog_query = new WP_Query(
      array(
         'post_type' => 'blog',
         'posts_per_page' => 3,
      )
   );
?>
<?php if(have_posts()): ?>
   <?php while(have_posts()):the_post(); ?>

      <main id="top" class="l-container">
         <?php if ( $news_query->have_posts() ) : ?>
            <section id="top-news" class="p-top-news">
               <div class="p-top-news__inner">
                  <div class="p-top-news__content">
                     <div class="c-announce-list">

                        <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
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

                     </div>
                     <p class="p-top-news__all"><a href="<?php echo $news_link ?>" class="c-button-all">すべて見る</a></p>
                  </div>
               </div>
            </section>
         <?php endif; wp_reset_postdata(); ?>

         <?php // 変数 content
            $content_heading = get_field('content-heading');
            $sub_visual_content = get_field('sub-visual', 15);
            $content_sp = $sub_visual_content['sp'];
            $intro = get_field('intro', 15);
            $box_list_01 = get_field('box-list_01', 15);
            $image_01 = $box_list_01['box-card_01'];
            $box_body_01 = $box_list_01['box-body_01'];
            $box_list_02 = get_field('box-list_02', 15);
            $image_02 = $box_list_02['box-card_02'];
            $box_body_02 = $box_list_02['box-body_02'];
            $box_list_03 = get_field('box-list_03', 15);
            $image_03 = $box_list_03['box-card_03'];
            $box_body_03 = $box_list_03['box-body_03'];
         ?>
         <section id="top-content" class="p-top-content">
            <div class="p-top-content__inner">
               <div class="p-top-content__title">
                  <span class="c-title-sub"><?php echo $content_heading['content-en']; ?></span>
                  <h2 class="c-title-main"><?php echo $content_heading['content-ja']; ?></h2>
               </div>
               <nav class="p-top-content__menu p-navigation-content">
                  <ul class="p-navigation-content__items">
                     <li class="p-navigation-content__item">
                        <a href="<?php echo $content_link ?>">
                           <h3 class="p-navigation-content__title"><?php echo $intro['intro-title']; ?></h3>
                           <img src="<?php echo $content_sp['url']; ?>" alt="<?php echo $content_sp['alt']; ?>">
                        </a>
                     </li>
                     <li class="p-navigation-content__item">
                        <a href="<?php echo $content_link ?>/#philosophy_01">
                           <h3 class="p-navigation-content__title"><?php echo $box_body_01['box-title_01']; ?>へ</h3>
                           <img src="<?php echo $image_01['url']; ?>" alt="<?php echo $image_01['alt']; ?>">
                        </a>
                     </li>
                     <li class="p-navigation-content__item">
                        <a href="<?php echo $content_link ?>/#philosophy_02">
                           <h3 class="p-navigation-content__title"><?php echo $box_body_02['box-title_02']; ?>へ</h3>
                           <img src="<?php echo $image_02['url']; ?>" alt="<?php echo $image_02['alt']; ?>">
                        </a>
                     </li>
                     <li class="p-navigation-content__item">
                        <a href="<?php echo $content_link ?>/#philosophy_03">
                           <h3 class="p-navigation-content__title"><?php echo $box_body_03['box-title_03']; ?>へ</h3>
                           <img src="<?php echo $image_03['url']; ?>" alt="<?php echo $image_03['alt']; ?>">
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </section>

         <?php // 変数 works
            $works = get_field('works');
            $works_heading = $works['works-heading'];
            $works_body = $works['works-body'];
         ?>
         <?php if ( $works_query->have_posts() ) : ?>
            <section id="top-works" class="p-top-works">
               <div class="p-top-works__inner">
                  <div class="p-top-works__title">
                     <span class="c-title-sub"><?php echo $works_heading['works-en']; ?></span>
                     <h2 class="c-title-main"><?php echo $works_heading['works-ja']; ?></h2>
                  </div>
               </div>
               <div class="p-top-works__content c-box-list">
                  <div class="c-box-list__item c-box-list__item--center">
                     <div class="c-box-list__part p-box-card swiper js-box-card__swiper">
                        <div class="swiper-wrapper">

                           <?php while ( $works_query->have_posts() ): $works_query->the_post(); ?>
                              <div class="p-box-card__img swiper-slide">
                                 <?php
                                    if (has_post_thumbnail() ) {
                                       the_post_thumbnail('large');
                                    } else {
                                       echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/common/no-img.png" alt="">';
                                    }
                                 ?>
                              </div>
                           <?php endwhile; ?>

                        </div>
                        <div class="swiper-pagination"></div>
                     </div>
                     <div class="c-box-list__part p-box-body u-margin-left">
                        <h3 class="p-box-body__title"><?php echo $works_body['works-title']; ?></h3>
                        <p class="p-box-body__text"><?php echo $works_body['works-text']; ?></p>
                        <p class="p-box-body__more"><a href="<?php echo $works_link ?>" class="c-button-more"><?php echo $works_body['works-link']; ?></a></p>
                     </div>
                  </div>
               </div>
            </section>
         <?php endif; wp_reset_postdata(); ?>

         <?php // 変数 overview
            $overview = get_field('overview');
            $overview_heading = $overview['overview-heading'];
            $overview_content = $overview['overview-content'];
            $overview_body = $overview_content['overview-body'];
            $overview_img = $overview_content['overview-img'];
         ?>
         <section id="top-overview" class="p-top-overview">
            <div class="p-top-overview__inner">
               <div class="p-top-overview__title">
                  <span class="c-title-sub"><?php echo $overview_heading['overview-en']; ?></span>
                  <h2 class="c-title-main"><?php echo $overview_heading['overview-ja']; ?></h2>
               </div>
            </div>
            <div class="p-top-overview__content c-box-list">
               <div class="c-box-list__item c-box-list__item--center c-box-list__item--reverse">
                  <div class="c-box-list__part p-box-card u-margin-left">
                     <div class="p-box-card__img">
                        <?php if( !empty($overview_img) ): ?>
                           <img src="<?php echo $overview_img['url']; ?>" alt="<?php echo $overview_img['alt']; ?>">
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="c-box-list__part p-box-body">
                     <h3 class="p-box-body__title"><?php echo $overview_body['overview-title']; ?></h3>
                     <p class="p-box-body__text"><?php echo $overview_body['overview-text']; ?></p>
                     <p class="p-box-body__more"><a href="<?php echo $overview_link ?>" class="c-button-more"><?php echo $overview_body['overview-link']; ?></a></p>
                  </div>
               </div>
            </div>
         </section>

         <?php // 変数 blog
            $blog_heading = get_field('blog-heading');
         ?>
         <?php if ( $blog_query->have_posts() ) : ?>
            <section id="top-blog" class="p-top-blog">
               <div class="p-top-blog__inner">
                  <div class="p-top-blog__title">
                     <span class="c-title-sub"><?php echo $blog_heading['blog-en']; ?></span>
                     <h2 class="c-title-main"><?php echo $blog_heading['blog-ja']; ?></h2>
                  </div>
                  <div class="p-top-blog__content">
                     <div class="c-post-list">

                        <?php while ( $blog_query->have_posts() ): $blog_query->the_post(); ?>
                           <a href="<?php the_permalink(); ?>" class="c-post-list__item">
                              <article class="p-post">
                                 <div class="p-post__img">
                                    <?php new_articles(3, 3); ?>
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

                     </div>
                     <p class="p-top-blog__more"><a href="<?php echo $blog_link ?>" class="c-button-more">すべて見る</a></p>
                  </div>
               </div>
            </section>
         <?php endif; wp_reset_postdata(); ?>

      </main>

      <?php get_template_part('template-parts/contact'); ?>

   <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>