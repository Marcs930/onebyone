<?php get_header(); ?>
<!-- <body> -->

<div class="container snws">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->

  <main class="main ">
    <div class="pageHead js-scrollTransTarget">
      <picture>
        <source media="(min-width:769px)" srcset="./assets/img/nws/nws-pageHead.jpg">
        <source media="(max-width:768px)" srcset="./assets/img/nws/nws-pageHead_sp.jpg">
        <img src="./assets/img/nws/nws-pageHead.jpg" alt="">
      </picture>
      <div class="wrapper pageHead__inner">
        <h2 class="pageHead__title">
          お知らせ
          <span>News</span>
        </h2>
      </div>
    </div>
    <div class="breadcrumb">
      <div class="wrapper">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a href="" class="breadcrumb__text">トップページ</a>
          </li>
          <li class="breadcrumb__item --current">
            <span class="breadcrumb__text">会社概要</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="sidebarLayout wrapper snws-article">
      <div class="sidebarLayout__left">

        <?php get_template_part('includes/single-content') ?>


        <!-- <article>
          <div class="articleHeading">
            <p class="articleHeading__title">ホームページをリニューアルしました！</p>
            <span class="articleHeading__date">2022/05/26</span>
          </div>

          <h1>h1テキスト</h1>
          <h2>h2テキスト</h2>
          <h3>h3テキスト</h3>
          <h4>h4テキスト</h4>
          <p>本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト本文テキスト</p>
          <ul>
            <li>リスト</li>
            <li>リストリスト</li>
            <li>リストリストリスト</li>
          </ul>
          <a href="">https://google.com</a>
        </article> -->
        <!-- <div class="articlePager">
          <ul class="articlePager__list">
            <li class="articlePager__item --prev">
              <a href="" class="articlePager__text">
                &lt; 前へ
              </a>
            </li>

            <li class="articlePager__item --next">
              <a href="" class="articlePager__text">
                次へ &gt;
              </a>
            </li>
          </ul>
        </div> -->
      </div>
      <div class="sidebarLayout__right">
        <div class="sidebar__cta">
          <p class="sidebar__cta__text">お気軽にお問い合わせ下さい！</p>
          <a href="tel:012-345-6789" class="cta__tel --sidebar btn">
            お電話でのお問い合わせはこちら
            <span class="tel">012-345-6789</span>
            <span class="time">
              10:00~17:00（水曜定休）</span>
          </a>
          <div class="sidebar__cta__btnContainer">
            <a href="/contact" class="btn ctaBtn --contact">
              <span>
                お問い合わせ
              </span>
            </a>
            <a href="" class="btn ctaBtn --line">
              <span>
                LINEで相談
              </span>
            </a>
          </div>
        </div>
        <div class="sidebar__sns">
          <p class="sidebar__sns__text">\ SNSでも内見動画配信中!! /</p>
          <ul class="sidebar__snsList">
            <li><a href="" class="sidebar__snsBtn --youtube"><img src="./assets/img/common/icon_youtube_white.png" alt="">YouTubeチャンネル</a></li>
            <li><a href="" class="sidebar__snsBtn --tiktok"><img src="./assets/img/common/icon_tiktok.png" alt="">Tiktokアカウント</a></li>
          </ul>
        </div>
        </aside>
      </div>
    </div>


    <?php get_template_part('includes/cta') ?>
  </main>

  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>