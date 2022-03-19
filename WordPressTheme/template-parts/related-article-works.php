<?php $term_var = get_the_terms($post->ID, 'genre'); ?>
<?php //サブクエリrelated-article
   $args = array(
      'post_type' => 'works', // 投稿タイプ
      'post__not_in' => array($post->ID), // 現在の投稿を関連記事から除外する
      'posts_per_page'=> 4, // 関連記事に表示する投稿するを指定
      'tax_query' => array(
         'relation' => 'AND',
         array(
            'taxonomy' => 'genre',
            'field'    => 'slug',
            'terms'    => $term_var[0],
         ),
      ),
      'orderby' => 'rand', // ソートをランダムに指定
   );
?>
<?php $query = new WP_Query($args); ?>
<?php if( $query->have_posts() ): ?>
   <section id="related-article" class="p-related-article">
      <div class="p-related-article__inner">
         <h2 class="p-related-article__title">関連記事</h2>
         <div class="p-related-article__content c-related-list">

            <?php while ($query->have_posts()) : $query->the_post(); ?>
               <a href="<?php the_permalink(); ?>" class="c-related-list__item">
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

         </div>
      </div>
   </section>
<?php endif; wp_reset_postdata();?>