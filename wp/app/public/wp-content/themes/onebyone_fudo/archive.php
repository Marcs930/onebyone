<?php get_header(); ?>
<!-- <body> -->

<div class="container js-bgWhite">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->

  <main class="main">
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
    <section class="arns-newsList">
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
      </div>

      <div class="pager">
        <ul class="pager__list">
          <li class="pager__item --prev">
            <a href="" class="pager__text">
              <!-- <img src="" alt=""> -->
              < </a>
          </li>
          <li class="pager__item current">
            <span class="pager__text">1</span>
          </li>
          <li class="pager__item">
            <a href="" class="pager__text">2</a>
          </li>
          <li class="pager__item --next">
            <a href="" class="pager__text">
              <!-- <img src="" alt=""> -->
              >
            </a>
          </li>
        </ul>
      </div>
    </section>

  </main>

  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>