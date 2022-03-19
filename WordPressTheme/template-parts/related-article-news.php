<?php $categories = get_the_category($post->ID); ?>
<?php //カテゴリーID
   $category_id = array();
   foreach($categories as $category):
      array_push($category_id, $category->cat_ID);
   endforeach ;
?>
<?php //サブクエリrelated-article
   $args = array(
      'post_type' => 'post', // 投稿タイプ
      'post__not_in' => array($post->ID), // 現在の投稿を関連記事から除外する
      'posts_per_page'=> 4, // 関連記事に表示する投稿するを指定
      'category__in' => $category_id, // カテゴリーIDの配列を指定
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
                     <div class="p-post__foot">

                        <?php $category = get_the_category(); ?>
                        <?php if ($category[0] ) {
                           echo '<p class="p-post__category">' . $category[0]->cat_name . '</p>';
                        } ?>

                        <time class="p-post__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
                     </div>
                  </article>
               </a>
            <?php endwhile; ?>
            
         </div>
      </div>
   </section>
<?php endif; wp_reset_postdata();?>