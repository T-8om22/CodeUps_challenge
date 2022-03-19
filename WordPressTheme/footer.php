<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>
<?php // 変数 top
   $top = get_field('top', 7);
?>
<?php // 変数 news
   $news_heading = get_field('news-heading', 7);
?>
<?php // 変数 content
   $content_heading = get_field('content-heading', 7);
?>
<?php // 変数 works
   $works = get_field('works', 7);
   $works_heading = $works['works-heading'];
?>
<?php // 変数 overview
   $overview = get_field('overview', 7);
   $overview_heading = $overview['overview-heading'];
?>
<?php // 変数 blog
   $blog_heading = get_field('blog-heading', 7);
?>
<?php // 変数 contact
   $contact_heading = get_field('contact-heading', 7);
?>

<footer class="l-footer">
   <div class="l-footer__inner">
      <nav class="l-footer__menu">
         <ul class="p-navigation-footer">
            <li class="p-navigation-footer__item"><a href="<?php echo $home_link ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/logo.svg" alt="フッターロゴ"></a></li>
            <li class="p-navigation-footer__item u-hidden-pc"><a href="<?php echo $home_link ?>"><?php echo $top; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $news_link ?>"><?php echo $news_heading['news-ja']; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $content_link ?>"><?php echo $content_heading['content-ja']; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $works_link ?>"><?php echo $works_heading['works-ja']; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $overview_link ?>"><?php echo $overview_heading['overview-ja']; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $blog_link ?>"><?php echo $blog_heading['blog-ja']; ?></a></li>
            <li class="p-navigation-footer__item"><a href="<?php echo $contact_link ?>"><?php echo $contact_heading['contact-ja']; ?></a></li>
         </ul>
      </nav>
      <div class="l-footer__copy">
         <small> &copy; 2021 CodeUps Inc.</small>
      </div>
   </div>
</footer>

<?php get_template_part('template-parts/to-top'); ?>
<?php wp_footer(); ?>
</body>
</html>