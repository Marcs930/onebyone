<?php get_header(); ?>
<!-- <body> -->

<div class="container  js-bgWhite">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->



  <main class="main">

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

    <div class="wrapper">
      <h2 class="pageTitle">
        賃貸物件一覧
      </h2>

      <div class="sidebarLayout">
        <div class="sidebarLayout__left">
          <div class="propertyList">
            <div class="propertyList__top">
              <div class="propertyList__amount">
                <span>1,234</span>
                件
              </div>
              <div class="propertyList__sort">
                <select name="sortBy" id="sortBy">
                  <option value="">安い順</option>
                  <option value="">高い順</option>
                  <option value="">新着順</option>
                </select>
              </div>
            </div>
            <ul class="propertyList__buildingList buildingList">
              <li class="buildingList__item">
                <a href="">
                  <img src="./assets/img/common/building-sample.png" alt="">
                  <span class="buildingList__tag">売買有</span>
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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
                  <img src="./assets/img/common/building-sample.png" alt="">
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

          </div>
        </div>
        <div class="sidebarLayout__right">
          <?php
  the_content();
  ?>

          <!-- <aside class="sidebar">
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
          <div class="searchParams">
            <p class="searchParams__heading">検索条件</p>
            <div class="searchParams__inner">

              <div class="searchParams__item searchParams__area">
                <p class="searchParams__title">エリア</p>
                <div class="searchParams_ _area__head">埼玉県</div>
                <div class="searchParams__area__body">和光市</div>
                <div class="searchParams__area__body">志木市</div>
              </div>
              <div class="searchParams__item searchParams__numberBetween">
                <p class="searchParams__title">賃料</p>
                <select name="priceMin" id="priceMin">
                  <option value="">5万円</option>
                  <option value="">6万円</option>
                  <option value="">7万円</option>
                </select>
                <span>~</span>
                <select name="priceMin" id="priceMin">
                  <option value="">5万円</option>
                  <option value="">6万円</option>
                  <option value="">7万円</option>
                </select>
              </div>
              <div class="searchParams__item">
                <p class="searchParams__title">面積</p>
                <select name="priceMin" id="priceMin">
                  <option value="">20m2</option>
                  <option value="">25m2</option>
                  <option value="">30m2</option>
                </select>
                <span>~</span>
                <select name="priceMin" id="priceMin">
                  <option value="">20m2</option>
                  <option value="">25m2</option>
                  <option value="">30m2</option>
                </select>
              </div>
              <div class="searchParams__item">
                <p class="searchParams__title">間取り</p>
                <ul class="searchParams__checkbox --col2">
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">1R</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">1K</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">1LDK</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">2LDK</label>
                  </li>
                </ul>
              </div>
              <div class="searchParams__item">
                <p class="searchParams__title">駅徒歩</p>
                <ul class="searchParams__checkbox --col2">
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">5分</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">10分</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">15分</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">20分</label>
                  </li>
                </ul>
              </div>
              <div class="searchParams__item searchParams__select">
                <p class="searchParams__title">築年数</p>
                <select name="priceMin" id="priceMin">
                  <option value="">5年</option>
                  <option value="">10年</option>
                  <option value="">15年</option>
                </select>
              </div>
              <div class="searchParams__item">
                <p class="searchParams__title">キーワード検索</p>
                <input type="text" name="s" id="s" placeholder="検索">
              </div>
              <div class="searchParams__item">
                <p class="searchParams__title">こだわり条件</p>
                <ul class="searchParams__checkbox --col1">
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">駐車場あり</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">パス・トイレ別</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">ペット可</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">独立洗面台</label>
                  </li>
                </ul>
                <ul class="searchParams__checkbox --col1 searchParams--hidden ">
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">駐車場あり</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">パス・トイレ別</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">ペット可</label>
                  </li>
                  <li class="searchParams__checkitem">
                    <input type="checkbox" name="" id="">
                    <label for="">独立洗面台</label>
                  </li>
                </ul>
                <p class="searchParams__more btn">すべて表示</p>

              </div>
              <input type="hidden" name="s" id="s" placeholder="検索" />
              <input type="submit" class="btn searchBtn --sidebar" placeholder="この条件で検索する">
            </div>
          </div>
          </form>
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
          </aside> -->
        </div>
      </div>
    </div>


  </main>


  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>