<?php get_header(); ?>
<!-- <body> -->

<div class="container  js-bgWhite">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->

  <main class="main ">

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
      <div class="sidebarLayout">
        <div class="sidebarLayout__left">
          <p class="buildingTitle">
            <span>六本木ヒルズ</span>
          </p>
          <div class="buildingInfo">
            <p class="buildingInfo__price">
              <span class="buildingInfo__large">900,000円</span>
              <span class="buildingInfo__small">(管理費 8,000円)</span>
            </p>
            <p class="buildingInfo__other">
              <span>敷金：1ヶ月</span>
              <span> / </span>
              <span>礼金：1ヶ月</span>
              <span> / </span>
              <span>専有面積：71.78m2</span>

            </p>
          </div>


          <!-- Slider main container -->
          <div class="swiper buildingSlider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide">
                <img src="./assets/img/common/slider01.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/slider_dammy.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/slider02.jpg" alt="">

              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/slider03.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/philosophy.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/cta.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/slider03.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/philosophy.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="./assets/img/common/cta.jpg" alt="">
              </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

          </div>

          <!-- サムネイル -->
          <div class="buildingThumbnailContainer">

            <div class="swiper buildingSlider__thumbnail">

              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="./assets/img/common/slider01.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/slider_dammy.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/slider02.jpg" alt="">

                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/slider03.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/philosophy.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/cta.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/slider03.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/philosophy.jpg" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="./assets/img/common/cta.jpg" alt="">
                </div>
              </div>
              <!-- If we need navigation buttons -->
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

          <a href="" class="btn spPrimaryBtn --contact roomContactBtn">
            <span>
              この物件を問い合わせる
            </span>
          </a>

          <div class="roomList">
            <p class="roomList__title">賃貸物件一覧</p>
            <table class="roomList__table --sp">

              <tr class="roomList__head roomList__head">
                <th class="roomList__col1"></th>
                <th class="roomList__col2">階</th>
                <th class="roomList__col3">賃料/管理費</th>
                <th class="roomList__col4">敷金/礼金</th>
                <th class="roomList__col5">間取り/専有面積</th>
                <th class="roomList__col6"></th>
              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円</span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円
                  </span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円</span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
            </table>
            <ul class="roomListSp is-sp">
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="roomList">
            <p class="roomList__title">購入物件一覧</p>
            <table class="roomList__table --sp">

              <tr class="roomList__head roomList__head">
                <th class="roomList__col1"></th>
                <th class="roomList__col2">階</th>
                <th class="roomList__col3">賃料/管理費</th>
                <th class="roomList__col4">敷金/礼金</th>
                <th class="roomList__col5">間取り/専有面積</th>
                <th class="roomList__col6"></th>
              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円</span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円
                  </span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
              <tr class="roomList__item">
                <td class="roomList__col1 --img">

                  <img src="./assets/img/common/madorizu.jpg" alt="">
                </td>
                <td class="roomList__col2 --floor">
                  1階
                </td>

                <td class="roomList__col3 --price">

                  <span>150,000円</span>
                  <span>150,000円</span>
                </td>
                <td class="roomList__col4 --deposit">

                  <span class="roomList__siki">
                    <span class="roomList__depositIcon">
                      敷
                    </span>
                    150,000円</span>
                  <span class="roomList__rei">
                    <span class="roomList__depositIcon">
                      礼
                    </span>
                    150,000円
                  </span>
                </td>
                <td class="roomList__col5 --layout">
                  <span>1LDK</span>
                  <span>42.15m2</span>
                </td>

                <td class="roomList__col6 --contact">
                  <a href="" class="btn roomList__contactBtn">お問い合わせ</a>
                  <a href="" class="btn roomList__detailBtn">詳細を見る</a>
                </td>

              </tr>
            </table>
            <ul class="roomListSp is-sp">
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="roomListSpItem">
                <a href="" class="roomListSpItem__container">
                  <img src="./assets/img/common/madorizu.jpg" alt="">
                  <div class="roomListSpItem__info">
                    <div class="roomListSpItem__price">
                      <span class="large">14.7</span>
                      <span class="small">万円/月 （管理費</span>
                      <span class="small">8,000</span>
                      <span class="small">）円</span>

                    </div>
                    <div class="roomListSpItem__deposit">
                      <span class="roomList__siki">
                        <span class="roomList__depositIcon">
                          敷
                        </span>
                        1ヶ月
                      </span>
                      <span class="roomList__rei">
                        <span class="roomList__depositIcon">
                          礼
                        </span>
                        1ヶ月
                      </span>
                    </div>
                    <div class="roomListSpItem__other">

                      <span>3LDK</span>
                      <span> / </span>
                      <span>71.78m2</span>
                      <span> / </span>
                      <span>23階</span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>



          <div class="roomInfo">
            <div class="roomInfo__head">
              概要
            </div>
            <table class="table roomInfo__table">
              <tr>
                <th>所在地</th>
                <td colspan="3">埼玉県志木市本町1-2-3</td>
              </tr>
              <tr>
                <th>駅徒歩</th>
                <td colspan="3">
                  ＪＲ川越線/西大宮駅 歩4分
                  <br>

                  ＪＲ京浜東北線/大宮駅 バス18分 (バス停)シティハイツ三橋 歩9分
                  <br>
                  ＪＲ川越線/指扇駅 歩21分
                </td>
              </tr>
              <tr>
                <th>総階数</th>
                <td colspan="3">地上5階　地下1階</td>
              </tr>
              <tr>
                <th>建物種別</th>
                <td>マンション</td>
                <th>戸数</th>
                <td>30戸</td>
              </tr>
              <tr>
                <th>築年数</th>
                <td>築10年</td>
                <th>向き</th>
                <td>南</td>
              </tr>
            </table>
          </div>

          <div class="roomInfo">
            <div class="roomInfo__head">
              所在地
            </div>
            <div class="roomInfo__map">
              <!-- googleMap -->
              <!-- <iframe src="" frameborder="0"></iframe> -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4581.559174754197!2d139.8076031700237!3d35.710191200664234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ed0d12f9adf%3A0x7d1d4fb31f43f72a!2z5p2x5Lqs44K544Kr44Kk44OE44Oq44O8!5e0!3m2!1sja!2sjp!4v1679320164888!5m2!1sja!2sjp" width="" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
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
    </div>


  </main>

  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>