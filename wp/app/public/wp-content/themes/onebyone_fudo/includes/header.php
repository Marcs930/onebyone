  <!-- header: start -->
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="/">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/terass_logo_white.png" alt="" class="header__logo--white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/terass_logo_black.png" alt="" class="header__logo--black">
        </a>
      </h1>
      <nav class="pcNav">
        <ul class="pcNav__list">
          <!-- <li class="pcNav__item"><a href="/rent/">借りる<span>RENT</span></a></li>
          <li class="pcNav__item"><a href="/buy/">買う<span>BUY</span></a></li>
          <li class="pcNav__item"><a href="/sell/">売る<span>SELL</span></a></li> -->
          <!-- <li class="pcNav__item tel"><a href="tel:012-345-6789">営業時間:10:00~18:00 / 定休日:水曜日<span>012-345-6789</span></a></li>
          <li class="pcNav__item"><a href="/contact/" class="pcNav__contactBtn">お問い合わせ
            </a></li> -->

          <?php
wp_nav_menu(
  array(
    'theme_location' => 'place_header',
    'container' => false,
    'menu_class' => 'pcNav__list', //ulタグへclass追加
    'add_li_class' => 'pcNav__item', // liタグへclass追加
    'items_wrap' => '%3$s',

  )
);
?>
          <li class="pcNav__item tel"><a href="tel:012-345-6789">営業時間:10:00~18:00 / 定休日:水曜日<span>012-345-6789</span></a></li>
          <li class="pcNav__item"><a href="/contact/" class="pcNav__contactBtn">お問い合わせ
            </a></li>
        </ul>
      </nav>


      <div class="hamburger  js-hamburgerBtn">
        <span></span>
        <span></span>
      </div>
    </div>
  </header>
  <!-- header: end -->
  <nav class="spNav">
    <ul class="spNav__list">
      <li class="spNav__item"><a href="/rent/">借りる<span>RENT</span></a></li>
      <li class="spNav__item"><a href="/buy/">買う<span>BUY</span></a></li>
      <li class="spNav__item"><a href="/sell/">売る<span>SELL</span></a></li>
    </ul>
    <div class="spNav__btnContainer">
      <a href="/contact" class="btn spPrimaryBtn --contact">
        <span>
          お問い合わせ
        </span>
      </a>
      <a href="" class="btn spPrimaryBtn --line">
        <span>
          LINEで相談
        </span>
      </a>
      <a href="tel:012-345-6789" class="spNav__tel btn">
        お電話でのお問い合わせはこちら
        <span class="tel">012-345-6789</span>
        <span class="time">10:00~17:00（水曜定休）</span>
      </a>
    </div>
    <div class="spNav__snsContainer">
      <span>SNSでも内見動画配信中!!</span>
      <ul class="spNav__snsList">
        <li><a href="" class="snsBtn"><img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_youtube.png" alt=""></a></li>
        <li><a href="" class="snsBtn"><img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_tiktok.png" alt=""></a></li>
      </ul>
    </div>
  </nav>