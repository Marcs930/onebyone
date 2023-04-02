<?php get_header();?>
<!-- <body> -->

<div class="container">

  <?php get_template_part('includes/header')?>

  <!-- CONTENTS: START -->

  <main class="main">
    <div class="pageHead js-scrollTransTarget">
      <picture>
        <source media="(min-width:769px)" srcset="./assets/img/ctc/ctc-pageHead.jpg">
        <source media="(max-width:768px)" srcset="./assets/img/ctc/ctc-pageHead_sp.jpg">
        <img src="./assets/img/ctc/ctc-pageHead.jpg" alt="">
      </picture>
      <div class="wrapper pageHead__inner">
        <h2 class="pageHead__title">
          お問い合わせ
          <span>Contact</span>
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

    <div class="contents">

      <div class="wrapper progressbarContainer">
        <ul class="progressbar">
          <li class="complete">ご入力</li>
          <li class="active">ご確認</li>
          <li class="">完了</li>
        </ul>
      </div>
    </div>

    <!-- <form action="" method="POST" class=""> -->
    <!-- formタグはプラグインによる自動挿入 -->
    <!-- プラグインに貼り付け -->
    <div class="ctc-form">

      <div class="ctc-form__room">
        <p class="ctc-form__heading">
          お問い合わせ物件
        </p>
        <div class="ctc-form__room__container">
          <img src="./assets/img/common/building_thubmnail_dammy.jpg" alt="">
          <div class="ctc-form__room__info">
            <span> 六本木ヒルズ</span> / <span>16階</span> / <span>3LDK</span>
          </div>
        </div>
      </div>
      <div class="ctc-form__content">
        <p class="ctc-form__heading">
          お問い合わせ内容
        </p>
        <div class="ctc-form__label">
          <label for="">会社名</label>
          <span class="ctc-form__required">必須</span>
        </div>
        <div class="ctc-form__input">
          <p class="ctc-form__error">会社名は必須項目です</p>
          <input class="ctc-form__input --text" type="text" name="" id="" placeholder="田中　太郎">
        </div>
        <div class="ctc-form__label">
          <label for="">ご連絡方法</label>
        </div>
        <div class="ctc-form__input">
          <p class="ctc-form__error">会社名は必須項目です</p>
          <div class="ctc-form__radio">
            <label for="none">
              <input type="radio" name="option" id="none">
              特になし
            </label>
            <label for="tel">
              <input type="radio" name="option" id="tel">
              電話
            </label>
            <label for="email">
              <input type="radio" name="option" id="email">
              メール
            </label>
          </div>

        </div>
        <div class="ctc-form__label">
          <label for="">お問い合わせ内容（複数選択可）</label>
        </div>
        <div class="ctc-form__input">
          <p class="ctc-form__error">会社名は必須項目です</p>
          <div class="ctc-form__check">
            <label for="vacant">
              <input type="checkbox" name="" id="vacant">
              最新の空室情報を知りたい
            </label>
            <label for="info">
              <input type="checkbox" name="" id="info">
              物件の詳細情報を知りたい
            </label>
            <label for="other">
              <input type="checkbox" name="" id="other">
              その他
            </label>
          </div>
        </div>
        <div class="ctc-form__label">
          <label for="">お問い合わせ内容</label>
        </div>
        <textarea class="ctc-form__input --textarea" name="" id="" cols="60" rows="10" placeholder="お問い合わせ内容をご記入ください"></textarea>
      </div>

      <div class="ctc-form__notice">
        <p>
          <a href="">プライバシーポリシー</a>
          を一読のうえ、確認画面へお進みください。
        </p>
      </div>
      <div class="ctc-form__btnContainer">

        <!-- <input type="submit" name="" id="" value="戻る" class="btn" />
          <input type="submit" name="" id="" value="送信する" class="btn -arg" /> -->
        <!-- <input type="submit" name="" id="" value="送信する" class="btn -arg" /> -->
        <button type="submit" class="ctcBtn --back btn">戻る</button>
        <button type="submit" class="ctcBtn --submit btn">送信する</button>
        <!-- <button type="submit" class="ctcBtn --confirm btn">入力内容を確認する</button> -->
      </div>
    </div>
    <!-- プラグインに貼り付け -->

    <!-- formタグはプラグインによる自動挿入 -->
    <!-- </form> -->


  </main>


  <!-- CONTENTS: END -->

  <!-- global footer: start -->
  <footer class="footer">
    <div class="footer__inner">
      <div class="footer__left">
        <div class="footer__logo">
          <img src="./assets/img/common/terass_logo_white.png" alt="">
        </div>
        <div class="footer__sns sp">
          <p class="footer__sns__text">SNSで情報発信中</p>
          <ul class="footer__snsList">
            <li class="footer__snsItem">
              <a href="">
                <img src="./assets/img/common/icon_line_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="./assets/img/common/icon_tiktok_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="./assets/img/common/icon_youtube_white.png" alt="">
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
                <img src="./assets/img/common/icon_line_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="./assets/img/common/icon_tiktok_white.png" alt="">
              </a>
            </li>
            <li class="footer__snsItem">
              <a href="">
                <img src="./assets/img/common/icon_youtube_white.png" alt="">
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
        <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_youtube.png" alt=""></a></li>
        <li><a href="" class="snsBtn"><img src="./assets/img/common/icon_tiktok.png" alt=""></a></li>
      </ul>
    </div>
  </nav>
</div><!-- /.container -->




<!-- CONTENTS: END -->
<?php get_template_part('includes/footer')?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer();?>