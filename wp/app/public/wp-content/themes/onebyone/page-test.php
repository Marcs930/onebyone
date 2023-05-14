<?php get_header();?>
<!-- <body> -->

<div class="container  js-bgWhite">

  <?php get_template_part('includes/header')?>

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



          <div id="search-box">
            <form method="get" action="<?php bloginfo('url');?>">
              <input name="s" id="s" type="text" />
              <input type="hidden" name="post_type" value="chintai">

              <label>1LDK</label>
              <input type="checkbox" name="layout" id="layout" value="1LDK">


              <input id="submit" type="submit" value="検索" />

            </form>
          </div>



          <?php
echo implode(', ', get_meta_values('layout', 'chintai'));
?>

          <?php
$post_type = get_post_type($post);
var_dump($post_type);
?>
<span>検索</span>
<form role="search" method="get" action="<?php bloginfo('url');?>">
<input type="hidden" name="post_type" value="chintai">
<div>
<label>フリーワード検索：
<input type="search"
	placeholder="<?php echo esc_attr_x('キーワードを入力', 'placeholder'); ?>"
	value="<?php echo esc_html(get_search_query()); ?>" name="s" >
</label>
</div>
	<div>カテゴリーorタグorカスタムタクソノミー</div>
		<div>チェックボックス:
<?php
$areas = get_terms('area', array(
  'orderby' => 'name', //色々指定できます
));
if (!is_wp_error($areas)):
  foreach ($areas as $area):

//チェックリスト値の受け渡し
    $t_check = filter_input(INPUT_GET, 'check01', FILTER_DEFAULT, ["options" => ["default" => []], "flags" => FILTER_REQUIRE_ARRAY]);
    $checked["check01"] = [$area->term_id => ""];
    foreach ((array) $t_check as $val) {
      $checked["check01"][$val] = "checked";
    }
    ?>
																<label><input type="checkbox" name="check01[]" value="<?php echo $area->term_id; ?>" <?php echo $checked["check01"][$area->term_id]; ?>><?php echo $area->name . '(' . $area->count . ')'; ?></label>
																<?php endforeach;endif;?>
	</div>
	<div>カテゴリーorタグorカスタムタクソノミー</div>
		<div>チェックボックス:
<?php
$stations = get_terms('station', array(
  'orderby' => 'name', //色々指定できます
));
if (!is_wp_error($stations)):
  foreach ($stations as $station):

//チェックリスト値の受け渡し
    $t_check = filter_input(INPUT_GET, 'check01', FILTER_DEFAULT, ["options" => ["default" => []], "flags" => FILTER_REQUIRE_ARRAY]);
    $checked["check01"] = [$station->term_id => ""];
    foreach ((array) $t_check as $val) {
      $checked["check01"][$val] = "checked";
    }
    ?>
																<label><input type="checkbox" name="check01[]" value="<?php echo $station->term_id; ?>" <?php echo $checked["check01"][$station->term_id]; ?>><?php echo $station->name . '(' . $station->count . ')'; ?></label>
																<?php endforeach;endif;?>
	</div>





	<div>
	    <label>ドロップダウン（プルダウン）：
 <select name="drop01"><option value="">すべて</option>
    <?php
$taxonomys = get_terms('movie', array(
  'hide_empty' => '0', //投稿がないタームも表示
));
if (!is_wp_error($taxonomys) && count($taxonomys)):
  foreach ($taxonomys as $taxonomy):
    $r_tax = filter_input(INPUT_GET, "drop01");
    $selected["drop01"] = [$taxonomy->term_id => ""];
    $selected["drop01"][$r_tax ?: ""] = "selected";
    ?>
																    <option value="<?php echo $taxonomy->term_id; ?>"<?php echo $selected["drop01"][$taxonomy->term_id] ?>><?php echo $taxonomy->name; ?></option>
																	 <?php endforeach;endif;?>
		</select></label></div>

	<div>カスタムフィールド</div>
		<div>チェックボックス：
	<?php
//チェックリスト値の受け渡し
$r_check = filter_input(INPUT_GET, 'check02', FILTER_DEFAULT, ["options" => ["default" => []], "flags" => FILTER_REQUIRE_ARRAY]);
$checked["check02"] = ["あり" => "", "なし" => ""];
foreach ((array) $r_check as $val) {
  $checked["check02"][$val] = "checked";
}
?>

    <label><input type="checkbox" name="check02[]" value="あり" <?php echo $checked["check02"]["あり"]; ?>>あり</label>
    <label><input type="checkbox" name="check02[]" value="なし" <?php echo $checked["check02"]["なし"]; ?>>なし</label>
</div>

		<div>ラジオボタン検索：
	<?php
//ラジオボタン値の受け渡し
$r_check = filter_input(INPUT_GET, 'radio02', FILTER_DEFAULT, ["options" => ["default" => []], "flags" => FILTER_REQUIRE_ARRAY]);
$checked["radio02"] = ["あり" => "", "なし" => ""];
foreach ((array) $r_check as $val) {
  $checked["radio02"][$val] = "checked";
}
?>

    <label><input type="radio" name="radio02[]" value="あり" <?php echo $checked["radio02"]["あり"]; ?>>あり</label>
    <label><input type="radio" name="radio02[]" value="なし" <?php echo $checked["radio02"]["なし"]; ?>>なし</label>
</div>

	<div>
	    <label>ドロップダウン（プルダウン）：
	<select name="drop02">
<option value="">すべて</option>
	<?php
$r_temp = filter_input(INPUT_GET, "drop02");
$selected["drop02"] = ["1000" => "", "2000" => ""];
$selected["drop02"][$r_temp ?: ""] = "selected";?>

<option value="1000"<?=$selected["drop02"]["1000"];?>>1000円以上</option>
<option value="2000"<?=$selected["drop02"]["2000"];?>>2000円以上</option>
	</select>
</label></div>

<input type="submit" value="絞り込む" />
	<a href="/?s=">条件クリア</a>
</form>


<!-- ここから自作メニュー -->
<h1>自作検索メニュー</h1>
<form method="get" id="searchform" action="<?php bloginfo('url');?>">
<input type="hidden" name="post_type" value="chintai">

    <input type="hidden" name="s" id="s" placeholder="検索" />

    <p>駅</p>
    <?php
$ekis = get_terms('station', array(
  'orderby' => 'name',
));

foreach ($ekis as $eki):
?>
        <label >

        <input type="checkbox" name="catnum[]" value="<?php echo $eki->term_id ?>">
        <?php echo $eki->name; ?>
        </label>

        <?php endforeach;?>


    <p>エリア</p>
    <?php
$towns = get_terms('area', array(
  'orderby' => 'name',
));

foreach ($towns as $town):
?>
        <label >

        <input type="checkbox" name="towns[]" value="<?php echo $town->term_id ?>">
        <?php echo $town->name; ?>
        </label>

        <?php endforeach;?>

        <p>こだわり条件</p>
        <label>
          ペット可
          <input type="checkbox" name="kodawari[]" value="ペット可">
        </label>
        <label>
        風呂トイレ別
          <input type="checkbox" name="kodawari[]" value="風呂トイレ別">
        </label>
        <label>
        駐車場あり
          <input type="checkbox" name="kodawari[]" value="駐車場あり">
        </label>

        <p>家賃</p>

        <select name="low">
          <option value="0">下限なし</option>
          <option value="20000">20,000円</option>
          <option value="50000">50,000円</option>
          <option value="60000">60,000円</option>

        </select>
        <span>～</span>
        <select name="high">
          <option value="999999999">上限なし</option>
          <option value="20000">20,000円</option>

        </select>


<div>

  <input type="submit" value="検索" />
</div>
</form>
<!-- ここまで自作メニュー -->



        </div>
        <div class="sidebarLayout__right">

          <aside class="sidebar">
            <form method="get" id="searchform" action="<?php bloginfo('url');?>">
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
          </aside>
        </div>
      </div>
    </div>


  </main>


  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer')?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer();?>