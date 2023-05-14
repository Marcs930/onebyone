<?php get_header();?>
<!-- <body> -->

<div class="container arre">

  <?php get_template_part('includes/header')?>

  <!-- CONTENTS: START -->

  <main class="main">
    <div class="pageHead js-scrollTransTarget">
      <picture>
        <source media="(min-width:769px)" srcset="./assets/img/rvw/rvw-pageHead.jpg">
        <source media="(max-width:768px)" srcset="./assets/img/rvw/rvw-pageHead_sp.jpg">
        <img src="./assets/img/rvw/rvw-pageHead.jpg" alt="">
      </picture>
      <div class="wrapper pageHead__inner">
        <h2 class="pageHead__title">
          お客様の声
          <span>Review</span>
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

    <div class="wrapper ">
      <div class="arre-container">
        <h2 class="sectionTitle">
          <span>Review</span>
          お客様の声
        </h2>
        <button href="" class="btn arre-reviewPostBtn reviewPostBtn">レビューを投稿する</button>

      </div>
    </div>

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
            <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_youtube.png" alt=""></a></li>
            <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_tiktok.png" alt=""></a></li>
          </ul>
          <span>SNSでも内見動画配信中!!</span>
        </div>
      </div>
    </section>

    <div class="modalBg"></div>
    <div class="arre-modal">




      <p class="arre-modal__title">レビューを投稿</p>
      <div class="arre-modal__container">

        <?php
the_content();
?>

        <div class="arre-modal__row">
          <span class="label">評価</span>
          <select name="" id="">
            <option value="">★★★★★</option>
            <option value="">★★★★</option>
            <option value="">★★★</option>
            <option value="">★★</option>
            <option value="">★</option>
          </select>
        </div>
        <div class="arre-modal__row">
          <span class="label">コメント</span>
          <textarea name="" id="" cols="30" rows="10" placeholder="コメントをご記入ください"></textarea>
        </div>
        <div class="arre-modal__row">
          <a href="" class="btn modal__btn">レビューを投稿する</a>
        </div>

      </div>

    </div>

  </main>




  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer')?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer();?>