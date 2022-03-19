<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;700&family=Roboto&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/img/common/favicon.ico" type="image/x-icon">

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
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

<header id="header" class="l-header <?php if(is_front_page()) { echo 'js-top-header'; } else { echo 'js-sub-header'; } ?>">
  <div class="l-header__inner">
    <div class="l-header__logo">
      <a href="<?php echo $home_link ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/common/logo.svg" alt="ヘッダーロゴ"></a>
    </div>
    <button class="l-header__drawer-button c-hamburger u-hidden-pc js-hamburger">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="l-header__drawer-menu u-hidden-pc js-drawer-menu">
      <ul class="p-navigation-drawer">
        <li class="p-navigation-drawer__item"><a href="<?php echo $home_link ?>"><?php echo $top; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $news_link ?>"><?php echo $news_heading['news-ja']; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $content_link ?>"><?php echo $content_heading['content-ja']; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $works_link ?>"><?php echo $works_heading['works-ja']; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $overview_link ?>"><?php echo $overview_heading['overview-ja']; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $blog_link ?>"><?php echo $blog_heading['blog-ja']; ?></a></li>
        <li class="p-navigation-drawer__item"><a href="<?php echo $contact_link ?>"><?php echo $contact_heading['contact-ja']; ?></a></li>
      </ul>
    </nav>
    <nav class="l-header__menu p-navigation-header u-hidden-sp">
      <ul class="p-navigation-header__items">
        <li class="p-navigation-header__item js-navigation-header__item <?php if( is_home() ) { echo 'is-active'; } ?>"><a href="<?php echo $news_link ?>"><?php echo $news_heading['news-ja']; ?></a></li>
        <li class="p-navigation-header__item js-navigation-header__item <?php if( is_page('content') ) { echo 'is-active'; } ?>"><a href="<?php echo $content_link ?>"><?php echo $content_heading['content-ja']; ?></a></li>
        <li class="p-navigation-header__item js-navigation-header__item <?php if( is_post_type_archive('works') ) { echo 'is-active'; } ?>"><a href="<?php echo $works_link ?>"><?php echo $works_heading['works-ja']; ?></a></li>
        <li class="p-navigation-header__item js-navigation-header__item <?php if( is_page('overview') ) { echo 'is-active'; } ?>"><a href="<?php echo $overview_link ?>"><?php echo $overview_heading['overview-ja']; ?></a></li>
        <li class="p-navigation-header__item js-navigation-header__item <?php if( is_post_type_archive('blog') ) { echo 'is-active'; } ?>"><a href="<?php echo $blog_link ?>"><?php echo $blog_heading['blog-ja']; ?></a></li>
        <li class="p-navigation-header__item p-navigation-header__item--attention js-navigation-header__item <?php if( is_page('contact') ) { echo 'is-active'; } ?>"><a href="<?php echo $contact_link ?>"><?php echo $contact_heading['contact-ja']; ?></a></li>
      </ul>
    </nav>
  </div>
</header>