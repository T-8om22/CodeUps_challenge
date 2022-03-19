<?php get_header(); ?>
<?php get_template_part('template-parts/header-hight'); ?>
<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>

<main id="404" class="l-container">

   <section class="p-404">
      <div class="p-404__inner">
         <div class="p-404__content">
            <p class="p-404__title">404 not found</p>
            <p class="p-404__text">お探しのページは<br class="u-hidden-pc">見つかりませんでした。</p>
            <p class="p-404__to-top"><a href="<?php echo $home_link ?>" class="c-button-more">topへ</a></p>
         </div>
      </div>
   </section>

</main>

<?php get_footer(); ?>