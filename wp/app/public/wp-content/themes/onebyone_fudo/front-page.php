<?php get_header();?>
<!-- <body> -->

<div class="container">

  <?php get_template_part('includes/header')?>

  <!-- CONTENTS: START -->

  <main class="main ">

    <?php get_template_part('includes/idx-mv')?>


    <!-- 不動産プラグイン -->
    <div id="top_fbox" class="site-content">
      <div id="container">
        <div id="content" role="main">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('top_widgets')): ?>
          <?php var_dump(!function_exists('dynamic_sidebar'));?>
          <?php var_dump(!dynamic_sidebar('top_widgets'));?>

          <?php endif;?>
        </div><!-- #content -->
      </div><!-- #container -->
    </div>
    <!-- 不動産プラグイン -->
    <a href=" <?php echo get_post_type_archive_link('review'); ?>">review</a>
    <a href=" <?php echo get_post_type_archive_link('fudo'); ?>">物件</a>


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

    <?php get_template_part('includes/cta')?>

    <?php get_template_part('includes/idx-philosophy')?>


    <?php get_template_part('includes/idx-news')?>


  </main>


  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer')?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer();?>