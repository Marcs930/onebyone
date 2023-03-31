<?php get_header(); ?>
<!-- <body> -->

<div class="container">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->

  <main class="main ">
    <div class="pageHead js-scrollTransTarget">
      <picture>
        <source media="(min-width:769px)" srcset="./assets/img/abt/abt-pageHead.jpg">
        <source media="(max-width:768px)" srcset="./assets/img/abt/abt-pageHead_sp.jpg">
        <img src="./assets/img/abt/abt-pageHead.jpg" alt="">
      </picture>
      <div class="wrapper pageHead__inner">
        <h2 class="pageHead__title">
          会社概要
          <span>About</span>
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

    <section class="abt-philosophy">
      <div class="wrapper abt-philosophy__inner">

        <div class="abt-philosophy__container">
          <h2 class="sectionTitle abt-philosophy__title">
            <span>Philosophy</span>
            OneByOneの理念
          </h2>
          <div class="abt-philosophy__img is-sp">

            <img src="./assets/img/common/philosophy_v2.jpg" alt="">
          </div>
          <p class="abt-philosophy__subTitle">一人ひとりの暮らしに寄り添う</p>
          <p class="abt-philosophy__text">
            OneByOneはお客様一人ひとりに最適な物件を、お役様に寄り添ってお探しいたします。賃貸から売買まで、都心の高級マンションを取り扱っております。ご購入を検討されているマンションも、まずは賃貸からご用意することも可能です。
          </p>

        </div>
        <div class="abt-philosophy__img sp">
          <img src="./assets/img/common/philosophy_v2.jpg" alt="">
        </div>
      </div>
    </section>

    <section class="abt-table">
      <div class="wrapper">
        <h2 class="sectionTitle">
          <span>Company</span>
          会社情報
        </h2>
        <table class="table abt-table">
          <tr>
            <th>会社名</th>
            <td>〇〇株式会社</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>埼玉県志木市本町1-2-3</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>埼玉県志木市本町1-2-3</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>埼玉県志木市本町1-2-3</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>埼玉県志木市本町1-2-3</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>東京都〇〇区〇〇町1-2-3 〇〇ビル2F</td>
          </tr>
          <tr>
            <th>住所</th>
            <td>埼玉県志木市本町1-2-3</td>
          </tr>
        </table>
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
            <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_youtube.png" alt=""></a></li>
            <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_tiktok.png" alt=""></a></li>
          </ul>
          <span>SNSでも内見動画配信中!!</span>
        </div>
      </div>
    </section>


  </main>


  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>