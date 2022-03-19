<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>

<div class="p-pagination">
   <ul class="p-pagination__items">
      <li><?php previous_post_link('%link', 'prev'); ?></li>
      <li><a href="<?php echo $works_link ?>">一覧</a></li>
      <li><?php next_post_link('%link', 'next'); ?></li>
   </ul>
</div>