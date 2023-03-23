<?php get_header(); ?>
<!-- <body> -->

<div class="container">

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
          <li class="pcNav__item"><a href="/rent/">借りる<span>RENT</span></a></li>
          <li class="pcNav__item"><a href="/buy/">買う<span>BUY</span></a></li>
          <li class="pcNav__item"><a href="/sell/">売る<span>SELL</span></a></li>
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

  <!-- CONTENTS: START -->

  <main class="main ">
    <div class="idx-mv js-scrollTransTarget">
      <div class="idx-mv__inner wrapper">

        <p class="idx-mv__title">
          都心高級マンションの<br class="is-tab-large">賃貸・売買なら<br>
          <span>TERASS</span>
        </p>
        <div class="search-tab">
          <ul class="search-tab__tab">
            <li class="current" data-id="0">借りる</li>
            <li data-id="1">売る</li>
          </ul>
          <ul class="search-tab__content">
            <li id="0" class="current">
              <div class="search-tab__txtContainer">
                <p class="search-tab__title">物件を探す</p>
                <p class="search-tab__new">
                  一週以内の新着物件
                  <span>123</span>
                  件
                </p>
              </div>
              <div class="search-tab__btnContainer">
                <a href="" class="btn searchByBtn --train">
                  駅・路線<br class="sp"><span>から探す</span></a>
                <a href="" class="btn searchByBtn --area">
                  エリア<br class="sp"><span>から探す</span></a>
                <div class="keyword-search">
                  <input class="text-input" type="search" name="" id="" placeholder="建物名から検索">
                  <button class="submit-btn" type="submit"><img src="" alt=""></button>
                </div>
            </li>
            <li id="1" class="">
              <div class="search-tab__txtContainer">
                <p class="search-tab__title">物件を探す</p>
                <p class="search-tab__new">
                  一週以内の新着物件
                  <span>123</span>
                  件
                </p>
              </div>
              <div class="search-tab__btnContainer">
                <a href="" class="btn searchByBtn --train">
                  駅・路線<br class="sp"><span>から探す</span></a>
                <a href="" class="btn searchByBtn --area">
                  エリア<br class="sp"><span>から探す</span></a>
                <div class="keyword-search">
                  <input class="text-input" type="search" name="" id="" placeholder="建物名から検索">
                  <button class="submit-btn" type="submit"><img src="" alt=""></button>
                </div>
            </li>
          </ul>
          <div class="search-tab__btnToListContainer">
            <a href="" class="btn btnToList">賃貸物件一覧へ</a>
            <a href="" class="btn btnToList">売買物件一覧へ</a>
          </div>
        </div>
      </div>
      <!-- Slider main container -->
      <div class="swiper idx-mv__slider">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider01_v2.jpg" alt="">
          </div>
          <div class="swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider02_v2.jpg" alt="">
          </div>
          <div class="swiper-slide">
            <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider03_v2.jpg" alt="">
          </div>
          <!-- <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider01.jpg" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider02.jpg" alt="">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/slider03.jpg" alt="">
            </div> -->
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <section class="idx-pickup">
      <div class="wrapper">
        <h2 class="sectionTitle">
          <span>Pick up</span>
          ピックアップ
        </h2>
        <div class="filterMenu">
          <ul class="filterMenu__btnList">
            <li class="filterMenu__btnItem current">
              <a href="">
                おすすめ物件
              </a>
            </li>
            <li class="filterMenu__btnItem">
              <a href="">
                新着物件
              </a>
            </li>
            <li class="filterMenu__btnItem">
              <a href="">
                ペット可物件
              </a>
            </li>

          </ul>
          <ul class="filterMenu__toggleBtnList">
            <li class="filterMenu__toggleBtnItem current">
              <a href="">
                賃貸
              </a>
            </li>
            <li class="filterMenu__toggleBtnItem">
              <a href="">
                売買
              </a>
            </li>
          </ul>
        </div>
        <ul class="idx-pickup__buildingList buildingList">
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
          <li class="buildingList__item">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/building-sample.png" alt="">
              <div class="buildingList__content">
                <p class="buildingList__name">六本木レジデンス</p>
                <p class="buildingList__address">東京都港区六本木2丁目</p>
                <p class="buildingList__price">
                  <span class="red">14.7</span>
                  <span>万円/月～</span>
                  <span class="red">14.7</span>
                  <span>万円/月</span>
                </p>
                <p class="buildingList__info">
                  <span>2LDK</span>
                  <span> / </span>
                  <span>2018年5月</span>
                </p>
              </div>
            </a>
          </li>
        </ul>
        <div class="flex">
          <a href="" class="btn btnWhite pickup__btnWhite">
            物件一覧を見る
          </a>
        </div>
      </div>
    </section>

    <section class="idx-review">
      <div class="wrapper">
        <h2 class="sectionTitle">
          <span>Review</span>
          お客様の声
        </h2>
        <ul class="reviewList">
          <li class="reviewList__item">
            <div class="reviewList__head">
              <div class="reviewList__star">
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>

              </div>
              <span class="reviewList__date">2022/10</span>
            </div>
            <div class="reviewList__textArea">
              <p>
                内見の予約から説明、契約までとてもスムーズで安心感がありました。<br>
                丁寧な対応で、気持ちの良い取引ができました。
              </p>
            </div>
          </li>
          <li class="reviewList__item">
            <div class="reviewList__head">
              <div class="reviewList__star">
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>

              </div>
              <span class="reviewList__date">2022/10</span>
            </div>
            <div class="reviewList__textArea">
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quibusdam consequuntur quidem officia, impedit ea fugiat dolorum assumenda autem, incidunt, tenetur accusamus quos quas voluptatem natus ut voluptates veniam numquam totam error maiores magnam. Minima earum natus voluptatum saepe
              </p>
            </div>
          </li>
          <li class="reviewList__item">
            <div class="reviewList__head">
              <div class="reviewList__star">
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>

              </div>
              <span class="reviewList__date">2022/10</span>
            </div>
            <div class="reviewList__textArea">
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quibusdam consequuntur quidem officia, impedit ea fugiat dolorum assumenda autem, incidunt, tenetur accusamus quos quas voluptatem natus ut voluptates veniam numquam totam error maiores magnam. Minima earum natus voluptatum saepe
              </p>
            </div>
          </li>
          <li class="reviewList__item">
            <div class="reviewList__head">
              <div class="reviewList__star">
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_filled.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>
                <span class="starImg">
                  <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/star_frame.png" alt="">
                </span>

              </div>
              <span class="reviewList__date">2022/10</span>
            </div>
            <div class="reviewList__textArea">
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quibusdam consequuntur quidem officia, impedit ea fugiat dolorum assumenda autem, incidunt, tenetur accusamus quos quas voluptatem natus ut voluptates veniam numquam totam error maiores magnam. Minima earum natus voluptatum saepe
              </p>
            </div>
          </li>
        </ul>
        <div class="wrapper flex review__flex">
          <a class="btnUnderLine review__btnUnderLine">
            もっと見る
          </a>
        </div>
      </div>
    </section>
    <section class="cta">
      <div class="cta__inner">
        <p class="cta__heading">
          <span>「物件のお問い合わせ」</span>や<span><br class="is-sp-small">「内見のご予約」</span>など、<br class="is-sp-small">お気軽にお問い合わせください
        </p>
        <div class="cta__btnContainer">
          <a href="tel:012-345-6789" class="cta__tel btn">
            お電話でのお問い合わせはこちら
            <span class="tel">012-345-6789</span>
            <span class="time">
              <span>受付時間</span>
              10:00~17:00（水曜定休）</span>
          </a>
          <div class="cta__btnContainer__inner">
            <a href="/contact" class="btn ctaBtn --contact">
              <span>
                お問い合わせフォームで相談
              </span>
            </a>
            <a href="" class="btn ctaBtn --line">
              <span>

                LINEで相談
              </span>
            </a>
          </div>

        </div>
        <div class="cta__snsContainer">
          <ul class="cta__snsList">
            <li><a href="" class="snsBtn"><img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_youtube.png" alt=""></a></li>
            <li><a href="" class="snsBtn"><img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_tiktok.png" alt=""></a></li>
          </ul>
          <span>SNSでも内見動画配信中!!</span>
        </div>
      </div>
    </section>

    <section class="idx-philosophy">
      <div class="wrapper idx-philosophy__inner">
        <h2 class="sectionTitle is-sp idx-philosophy__title--sp">
          <span>Philosophy</span>
          OneByOneの理念
        </h2>
        <div class="idx-philosophy__img">

          <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/philosophy_v2.jpg" alt="">
        </div>
        <div class="idx-philosophy__container">
          <h2 class="sectionTitle idx-philosophy__title sp">
            <span>Philosophy</span>
            OneByOneの理念
          </h2>
          <p class="idx-philosophy__subTitle">一人ひとりの暮らしに寄り添う</p>
          <p class="idx-philosophy__text">
            OneByOneはお客様一人ひとりに最適な物件を、お役様に寄り添ってお探しいたします。賃貸から売買まで、都心の高級マンションを取り扱っております。ご購入を検討されているマンションも、まずは賃貸からご用意することも可能です。
          </p>
          <a class="btnUnderLine">
            会社概要へ
          </a>
        </div>
      </div>
    </section>

    <section class="idx-news">
      <div class="wrapper">
        <h2 class="sectionTitle">
          <span>News</span>
          ニュース
        </h2>

        <ul class="newsList">
          <li class="newsList__item">
            <span class="newsList__date">2022.10.30</span>
            <a href="" class="newsList__title">年末年始の営業時間について</a>
          </li>
          <li class="newsList__item">
            <span class="newsList__date">2022.10.30</span>
            <a href="" class="newsList__title">年末年始の営業時間について</a>
          </li>
          <li class="newsList__item">
            <span class="newsList__date">2022.10.30</span>
            <a href="" class="newsList__title">年末年始の営業時間について</a>
          </li>
        </ul>
        <div class="flex">
          <a class="btnUnderLine">
            お知らせ一覧へ
          </a>
        </div>
      </div>
    </section>

  </main>


  <!-- CONTENTS: END -->

  <!-- global footer: start -->
  <footer class="footer">
    <div class="footer__inner">
      <div class="footer__left">
        <div class="footer__logo">
          <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/terass_logo_white.png" alt="">
        </div>
        <div class="footer__sns sp">
          <p class="footer__sns__text">SNSで情報発信中</p>
          <ul class="footer__snsList">
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_line_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_tiktok_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_youtube_white.png" alt="">
              </a>
            </li>
          </ul>
        </div>
      </div>

      <ul class="footerNav">
        <li class="footerNav__item">
          <p class="footerNav__heading">
            会社情報
          </p>
          <ul class="footerNav__subList">
            <li class="footerNav__subItem">
              <a href="">会社概要</a>
            </li>
            <li class="footerNav__subItem">
              <a href="">採用情報</a>
            </li>
          </ul>
        </li>
        <li class="footerNav__item">
          <p class="footerNav__heading">
            物件
          </p>
          <ul class="footerNav__subList">
            <li class="footerNav__subItem">
              <a href="">賃貸物件一覧</a>
            </li>
            <li class="footerNav__subItem">
              <a href="">売買物件一覧</a>
            </li>
          </ul>
        </li>
        <li class="footerNav__item">
          <p class="footerNav__heading">
            お知らせ
          </p>
          <ul class="footerNav__subList">
            <li class="footerNav__subItem">
              <a href="">お知らせ一覧</a>
            </li>
          </ul>
        </li>
        <li class="footerNav__item">
          <p class="footerNav__heading">
            情報
          </p>
          <ul class="footerNav__subList">
            <li class="footerNav__subItem">
              <a href="">よくあるご質問</a>
            </li>
          </ul>
        </li>
      </ul>
      <a href="" class="btn footer__contactBtn">お問い合わせ</a>
      <div class="footer__bottom">
        <div class="footer__sns is-sp">
          <p class="footer__sns__text">\ SNSで情報発信中 /</p>
          <ul class="footer__snsList">
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_line_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_tiktok_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/img/common/icon_youtube_white.png" alt="">
              </a>
            </li>
          </ul>
        </div>
        <ul class="footer__bottomList">
          <li class="footer__bottomItem">
            <a href="">プライバシーポシリー</a>
          </li>
        </ul>
      </div>
    </div>
    <span class="footer__copyright">&copy; OneByOne co.ltd 2023</span>
  </footer>
  <!-- global footer: end -->
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
</div><!-- /.container -->

<!-- <div class="bg"></div> -->
<div id="loading" class="loading">
  <div class="loading__wrapper"></div>
</div>

<!-- </body> -->
<?php get_footer(); ?>