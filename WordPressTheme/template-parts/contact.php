<?php //変数 リンク
   $home_link = esc_url(home_url('/'));
   $news_link = esc_url(home_url('/news'));
   $content_link = esc_url(home_url('/content'));
   $works_link = esc_url(get_post_type_archive_link( 'works' ) );
   $overview_link = esc_url(home_url('/overview'));
   $blog_link = esc_url(get_post_type_archive_link( 'blog' ));
   $contact_link = esc_url(home_url('/contact'));
?>
<?php // 変数 contact
   $contact_heading = get_field('contact-heading', 7);
   $contact_body = get_field('contact-body', 7);
?>
<section id="contact" class="l-contact">
   <div class="l-contact__inner">
      <div class="l-contact__title">
         <span class="c-title-sub"><?php echo $contact_heading['contact-en']; ?></span>
         <h2 class="c-title-main"><?php echo $contact_heading['contact-ja']; ?></h2>
      </div>
      <div class="l-contact__text">
         <p><?php echo $contact_body['contact-text']; ?></p>
      </div>
      <p class="l-contact__more">
         <a href="<?php echo $contact_link ?>" class="c-button-more"><?php echo $contact_body['contact-link']; ?></a>
      </p>
   </div>
</section>