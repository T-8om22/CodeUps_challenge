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

<main id="thanks" class="l-container">

   <section class="p-thanks">
      <div class="p-thanks__inner">
         <div class="p-thanks__content">
            <p class="p-thanks__title">お問い合わせ完了</p>
            <p class="p-thanks__text">3営業日以内に<br class="u-hidden-pc">返信させて頂きます。</p>
            <p class="p-thanks__to-top"><a href="<?php echo $home_link ?>" class="c-button-more">topへ</a></p>
         </div>
      </div>
   </section>

</main>

<?php get_footer(); ?>