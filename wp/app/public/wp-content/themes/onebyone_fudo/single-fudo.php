<?php
/**
 * The Template for displaying fudou single posts.
 *
 * Template: single-fudo.php
 *
 * @package WordPress 6.1
 * @subpackage Fudousan Plugin
 * @subpackage Twenty_XXX
 * Version: 6.1.0
 */

	/**** functions ****/
	require_once WP_PLUGIN_DIR . '/fudou/inc/inc-single-fudo.php';

	/**** ヘッダー(前処理) ****/
	require_once WP_PLUGIN_DIR . '/fudou/inc/inc-single-fudo-header.php';


	status_header( 200 );
	get_header();
	the_post();

?>
<div id="container" class="site-content">

  <div id="content" role="main">

    <?php do_action( 'single-fudo0', $post_id ); ?>


    <?php if ( post_password_required() ){ //パスワード保護あり ?>

    <div id="list_simplepage2">

      <!-- #nav-above -->
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h1 class="entry-title">
          <?php
						//タイトルin ver5.9.0
						do_action( 'single_title_in', $post_id, 'single' );
					?>

          <?php
					//会員ロゴ
					if( get_post_meta( $post_id, 'kaiin', true ) == 1 ) {
						$kaiin_logo = '<span class="fudo_kaiin_type_logo"><img ' . $fudou_lazy_loading . ' src="' . plugins_url() . '/fudou/img/kaiin_s.jpg" alt="会員物件" width="40" height="20"></span>';
						echo apply_filters( 'fudou_kaiin_logo_view', $kaiin_logo );
					}
					?>
          <?php do_action( 'fudo_kaiin_type_logo', $post_id ); 	//会員ロゴ ?>

          <?php
					//会員項目表示判定
					if ( !my_custom_kaiin_view('kaiin_title',$kaiin,$kaiin2) ){
						echo " 会員物件";
					}else{
						echo $title;
					}

					echo  $newup_mark_img;
					?>
        </h1>

        <div class="list_simple_box entry-content">
          <?php the_content();?>
        </div>

      </div>
    </div>


    <?php }else{ //パスワード保護無し ?>

    <!-- ここから物件詳細情報 -->
    <div id="list_simplepage2">

      <!-- #nav-above -->
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h1 class="entry-title">
          <?php
						//タイトルin ver5.9.0
						do_action( 'single_title_in', $post_id, 'single' );
					?>
          <?php
					//会員ロゴ
					if( get_post_meta( $post_id, 'kaiin', true ) == 1 ) {
						$kaiin_logo = '<span class="fudo_kaiin_type_logo"><img ' . $fudou_lazy_loading . ' src="' . plugins_url() . '/fudou/img/kaiin_s.jpg" alt="会員物件" width="40" height="20"></span>';
						echo apply_filters( 'fudou_kaiin_logo_view', $kaiin_logo );
					}
					?>
          <?php do_action( 'fudo_kaiin_type_logo', $post_id ); 	//会員ロゴ ?>

          <?php
					//会員項目表示判定
					if ( !my_custom_kaiin_view('kaiin_title',$kaiin,$kaiin2) ){
						echo " 会員物件";
					}else{
						echo $title;
					}

					echo  $newup_mark_img;
					?>
        </h1>

        <?php do_action( 'single-fudo1', $post_id ); ?>

        <div class="list_simple_box">

          <?php
					//Gutenberg 利用
					if ( get_option( 'fudo_use_gutenberg' ) == 'true' ) { 	//Gutenberg 利用の場合
					?>
          <?php }else{
						//抜粋
						if ( my_custom_kaiin_view('kaiin_excerpt',$kaiin,$kaiin2) && $excerpt ){
							echo '<div class="entry-excerpt">' . $excerpt . '</div>';
						}
					?>
          <?php } ?>


          <?php if( $kaiin == 1 ) { ?>

          <div class="entry-content">

            <?php if( $is_fudoukaiin && get_option('kaiin_users_can_register') == 1 ){ ?>

            <br />
            この物件は、「会員様にのみ限定公開」している物件です。<br />
            非公開物件につき、詳細情報の閲覧には会員ログインが必要です。<br />
            非公開物件を閲覧・資料請求するには会員登録が必要です。<br />

            <?php if( get_option('kaiin_moushikomi') != 1 ){ ?>
            まだ会員登録をしていない方は、簡単に会員登録ができますので是非ご登録ください。<br />
            <br />
            <div align="center">
              <?php echo $kaiin_register_url_tag;?><img <?php echo $fudou_lazy_loading; ?> src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/fudou/img/kaiin_botton.jpg" alt="会員登録" width="300" height="65"></a>
            </div>
            <?php } ?>
            <br />
            <br />

            <?php }else{ ?>
            <br />
            この物件は、閲覧できません。<br />
            <br />
            <br />
            <?php }

						echo '</div><!-- .entry-content -->';


					}else{

						//ユーザー別会員物件リスト
						if ( $kaiin2 === false ) {

							echo '<div class="entry-content">';

							if( get_post_meta( $post_id, 'kaiin', true ) > 1 ){
								//VIP
								echo '<br />';
								echo 'この物件は、閲覧できません。<br />';
								echo '<br />';
							}else{
								echo '<br />';
								echo 'この物件は、「閲覧条件に合った物件のみ公開」している物件です。<br />';
								echo '条件変更をする事で閲覧ができますので、閲覧条件の登録・変更をしてください。<br />';
								echo '<br />';
								echo '<div align="center">';
								echo '<div id="maching_mail"><a href="'.plugins_url().'/fudoumail/fudou_user.php?KeepThis=true&TB_iframe=true&height=500&width=680" ' . $thickbox_class . '>';
								echo '閲覧条件・メール設定</a></div>';

								echo '</div>';
								echo '<br />';
							}

							echo '</div><!-- .entry-content -->';


						}else{
				?>

            <?php
							//Gutenberg 利用
							if ( get_option( 'fudo_use_gutenberg' ) == 'true' ) { 	//Gutenberg 利用の場合
							?>
            <!-- .entry-content -->
            <div class="entry-content">
              <?php the_content();?>
            </div>
            <!-- .entry-content -->
            <?php }else{ ?>
            <?php } ?>


            <!-- ここから左ブロック -->
            <div class="list_picsam">
              <?php

								//画像
								if (!defined('FUDOU_IMG_MAX')){
									$fudou_img_max = 10;
								}else{
									$fudou_img_max = FUDOU_IMG_MAX;
								}

								/*
								 * 物件詳細画像
								 * do_action( 'single_fudou_img', $post_id, $title, $fudou_lazy_loading, $fudou_img_start, $fudou_img_end );
								 * @param int $post_id
								 * @param string $title
								 * @param string $fudou_lazy_loading
								 * @param string $fudou_img_start
								 * @param string $fudou_img_end
								 * @param int $type
								 * Version: 6.1.0
								*/
								do_action( 'single_fudou_img', $post_id, $title, $fudou_lazy_loading, apply_filters( 'fudou_img_start', 1 ), apply_filters( 'fudou_img_end', 10 ), 1 );

							?>
            </div>

            <!-- ここから右ブロック -->
            <div class="list_detail">

              <?php do_action( 'single-fudo2', $post_id ); ?>

              <table>
                <tr>
                  <td class="list_price<?php if( get_post_meta($post_id,'bukkenshubetsu',true) > 3000 ) echo ' rent'; ?>">
                    <dl style="padding:0;margin:0;">
                      <dt><?php if ( get_post_meta($post_id,'bukkenshubetsu',true) <3000 ) { echo '価格';}else{echo '賃料';} ?></dt>
                      <dd class="dpoint4"><?php  if( get_post_meta($post_id, 'seiyakubi', true) != "" ){ echo 'ご成約済'; }else{  my_custom_kakaku_print($post_id); } ?></dd>
                      <dd><?php my_custom_bukkenshubetsu_print($post_id); ?></dd>

                      <?php if( get_post_meta($post_id, 'madorisu', true) !=""){ ;?>
                      <dt>間取</dt>
                      <dd class="dpoint4"><?php my_custom_madorisu_print($post_id); ?></dd>
                      <?php } ?>
                    </dl>
                    <dl style="padding:0;margin:0;">
                      <?php if( get_post_meta($post_id, 'kakakutsubo', true) !=""){ ;?>
                      <dt>坪単価</dt>
                      <dd><?php my_custom_kakakutsubo_print($post_id) ;?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakukyouekihi', true) !="" && get_post_meta($post_id,'bukkenshubetsu',true) > 1200){ ;?>
                      <dt>共益費・管理費</dt>
                      <dd><?php echo apply_filters( 'fudou_number_format', get_post_meta( $post_id, 'kakakukyouekihi', true) );?>円</dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakutsumitate', true) ){ ;?>
                      <dt>修繕積立金</dt>
                      <dd><?php echo apply_filters( 'fudou_number_format', get_post_meta( $post_id, 'kakakutsumitate', true ) );?>円</dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakuhyorimawari', true) !="" ){ ;?>
                      <dt>表面利回り</dt>
                      <dd><?php echo get_post_meta($post_id, 'kakakuhyorimawari', true);?>%</dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakurimawari', true) !=""){ ;?>
                      <dt>現行利回り</dt>
                      <dd><?php echo get_post_meta($post_id, 'kakakurimawari', true);?>%</dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'shakuchiryo', true) || get_post_meta($post_id, 'shakuchikikan', true) !=""){ ;?>
                      <dt></dt>
                      <dd><?php echo my_custom_shakuchi_print($post_id);?></dd>
                      <?php } ?>
                    </dl>
                  </td>
                </tr>

                <?php if( get_post_meta($post_id,'bukkenshubetsu',true) > 3000 ){ ?>
                <tr>
                  <td class="list_price<?php if( get_post_meta($post_id,'bukkenshubetsu',true) > 3000 ) echo ' rent'; ?>">
                    <dl style="padding:0;margin:0;">
                      <?php if( get_post_meta($post_id, 'kakakushikikin', true) !=""){ ;?>
                      <dt>敷金</dt>
                      <dd><?php my_custom_kakakushikikin_print($post_id); ?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakureikin', true) !=""){ ;?>
                      <dt>礼金</dt>
                      <dd><?php my_custom_kakakureikin_print($post_id); ?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakuhoshoukin', true) !=""){ ;?>
                      <dt>保証金</dt>
                      <dd><?php my_custom_kakakuhoshoukin_print($post_id); ?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakukenrikin', true) !=""){ ;?>
                      <dt>権利金</dt>
                      <dd><?php my_custom_kakakukenrikin_print($post_id); ?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakushikibiki', true) !=""){ ;?>
                      <dt>償却・敷引金</dt>
                      <dd><?php my_custom_kakakushikibiki_print($post_id); ?></dd>
                      <?php } ?>

                      <?php if( get_post_meta($post_id, 'kakakukoushin', true) !=""){ ;?>
                      <dt>更新料</dt>
                      <dd><?php my_custom_kakakukoushin_print($post_id); ?></dd>
                      <?php } ?>
                    </dl>
                  </td>
                </tr>
                <?php } ?>
              </table>

              <?php do_action( 'single-fudo10', $post_id ); ?>

              <!-- 2列table -->
              <div id="list_add_table">
                <table id="list_add">
                  <tr>
                    <th>所在地</th>
                    <td><?php my_custom_shozaichi_print($post_id); ?><?php echo get_post_meta($post_id, 'shozaichimeisho', true); ?>
                      <?php if ( get_post_meta($post_id,'bukkenmeikoukai',true) != '0' ) echo '　'. get_post_meta($post_id,'bukkenmei',true);?></td>
                  </tr>
                  <tr>
                    <th>交通</th>
                    <td><?php my_custom_koutsu1_print($post_id); ?>
                      <?php my_custom_koutsu2_print($post_id); ?>
                      <?php if( get_post_meta($post_id, 'koutsusonota', true) !="") 	echo '<br />'.get_post_meta($post_id, 'koutsusonota', true);?></td>
                  </tr>
                </table>
              </div>

              <?php do_action( 'single-fudo11', $post_id ); ?>

              <div id="list_other_table">
                <table id="list_other">

                  <!-- 土地以外 -->
                  <?php if ( get_post_meta($post_id,'bukkenshubetsu',true) >1200 && get_post_meta($post_id,'bukkenshubetsu',true) != 3212 ) { ?>
                  <tr>
                    <th class="th1">築年月</th>
                    <td class="td1"><?php echo get_post_meta($post_id, 'tatemonochikunenn', true);?></td>
                    <th class="th2">新築/中古</th>
                    <td class="td2"><?php my_custom_tatemonoshinchiku_print($post_id); ?></td>
                  </tr>
                  <tr>
                    <th class="th1">面積</th>
                    <td class="td1">
                      <?php if( get_post_meta($post_id, 'tatemonomenseki', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'tatemonomenseki', true);?>m&sup2;
                      <?php } ?>
                    </td>
                    <th class="th2">計測方式</th>
                    <td class="td2"><?php my_custom_tatemonohosiki_print($post_id); ?></td>
                  </tr>
                  <tr>
                    <th class="th1">バルコニー</th>
                    <td class="td1">
                      <?php if( get_post_meta($post_id, 'heyabarukoni', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'heyabarukoni', true);?>m&sup2;
                      <?php } ?>
                    </td>
                    <th class="th2">向き</th>
                    <td class="td2"><?php my_custom_heyamuki_print($post_id); ?></td>
                  </tr>
                  <tr>
                    <th class="th1">建物階数</th>
                    <td class="td1"><?php if(get_post_meta($post_id, 'tatemonokaisu1', true)!="") echo '地上'.get_post_meta($post_id, 'tatemonokaisu1', true).'階　' ;?>
                      <?php if(get_post_meta($post_id, 'tatemonokaisu2', true)!="") echo '地下'.get_post_meta($post_id, 'tatemonokaisu2', true).'階' ;?>
                    </td>
                    <th class="th2">部屋階数</th>
                    <td class="td2">
                      <?php if( get_post_meta($post_id, 'heyakaisu', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'heyakaisu', true);?>階
                      <?php } ?>
                    </td>
                  </tr>



                  <?php
									//v1.9.2 物件名非公開
									if ( get_post_meta($post_id,'bukkenmeikoukai',true) == '1' || get_post_meta($post_id,'bukkenmeikoukai',true) == '' ) {
										$bukkenmeikoukai = true;
									}else{
										$bukkenmeikoukai = false;
									}

									if ( get_post_meta($post_id,'bukkennaiyo',true) || get_post_meta($post_id,'bukkensoukosu',true) ){
									?>
                  <tr>
                    <th class="th1">部屋/区画番号</th>
                    <td class="td1">
                      <?php if( $bukkenmeikoukai && get_post_meta($post_id, 'bukkennaiyo', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'bukkennaiyo', true);?>
                      <?php } ?>
                    </td>

                    <th class="th2">総戸/区画数</th>
                    <td class="td2">
                      <?php if( get_post_meta($post_id, 'bukkensoukosu', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'bukkensoukosu', true);?>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <tr>
                    <th class="th1">建物構造</th>
                    <td class="td1" colspan="3"><?php my_custom_tatemonokozo_print($post_id) ?></td>
                  </tr>

                  <?php if( get_post_meta($post_id,'tatemonozentaimenseki',true) || get_post_meta($post_id,'tatemononobeyukamenseki',true) ){ ?>
                  <tr>
                    <th class="th1">敷地全体面積</th>
                    <td class="td1">
                      <?php if( get_post_meta($post_id, 'tatemonozentaimenseki', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'tatemonozentaimenseki', true);?>m&sup2;
                      <?php } ?>
                    </td>
                    <th class="th2">延べ床面積</th>
                    <td class="td2">
                      <?php if( get_post_meta($post_id, 'tatemononobeyukamenseki', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'tatemononobeyukamenseki', true);?>m&sup2;
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>


                  <?php if( get_post_meta($post_id,'tatemonokentikumenseki',true) ){ ?>
                  <tr>
                    <th class="th1">建築面積</th>
                    <td class="td1"><?php echo get_post_meta($post_id, 'tatemonokentikumenseki', true);?>m&sup2;</td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id, 'kanrininn', true)!='' || get_post_meta($post_id, 'kanrikeitai', true)!='' || get_post_meta($post_id, 'kanrikumiai', true)!='' ){ ?>
                  <tr>
                    <th class="th1">管理形態</th>
                    <td class="td1" colspan="3">
                      <?php my_custom_kanrikeitai_print($post_id); ?>
                      <?php my_custom_kanrininn_print($post_id);?>
                      <?php my_custom_kanrikumiai_print($post_id); ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <tr>
                    <th class="th1">間取内容</th>
                    <td class="td1" colspan="3">
                      <?php my_custom_madorinaiyo_print($post_id); ?><br />
                      <?php echo get_post_meta($post_id, 'madoribiko', true);?>
                    </td>
                  </tr>

                  <?php if( get_post_meta($post_id, 'kakakuhoken', true)!='' || get_post_meta($post_id, 'kakakuhokenkikan', true)!='' || get_post_meta($post_id, 'kakakutsumitate', true)!='' ){ ?>
                  <tr>
                    <th class="th1">住宅保険料</th>

                    <?php if( get_post_meta($post_id, 'kakakutsumitate', true) ){ ;?>
                    <td class="td1">
                      <?php }else{ ?>
                    <td class="td1" colspan="3">
                      <?php } ?>

                      <?php my_custom_kakakuhoken_print($post_id);?>
                      <?php if( get_post_meta($post_id, 'kakakuhokenkikan', true) ){ ?>
                      <?php echo get_post_meta($post_id, 'kakakuhokenkikan', true);?>年
                      <?php } ?>
                    </td>

                    <?php if( get_post_meta($post_id, 'kakakutsumitate', true) ){ ;?>
                    <th class="th2">修繕積立金</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'kakakutsumitate', true ) ){ ?>
                      <?php echo apply_filters( 'fudou_number_format', get_post_meta( $post_id, 'kakakutsumitate', true ) ); ?>円
                      <?php } ?>
                    </td>
                    <?php } ?>

                  </tr>
                  <?php } ?>

                  <?php } ?>
                  <!-- .土地以外 -->

                  <tr>
                    <th class="th1">駐車場</th>
                    <td class="td1"><?php my_custom_chushajo_print($post_id); ?></td>
                    <th class="th2">取引態様</th>
                    <td class="td2"><?php my_custom_torihikitaiyo_print($post_id); ?></td>
                  </tr>
                  <tr>
                    <th class="th1">引渡/入居時期</th>
                    <td class="td1">
                      <?php my_custom_nyukyojiki_print($post_id); ?>
                      <?php echo get_post_meta($post_id, 'nyukyonengetsu', true);?>
                      <?php my_custom_nyukyosyun_print($post_id);?>
                    </td>
                    <th class="th2">現況</th>
                    <td class="td2"><?php my_custom_nyukyogenkyo_print($post_id); ?></td>
                  </tr>

                  <!-- 土地 -->
                  <?php if( get_post_meta($post_id,'tochichimoku',true)!='' || get_post_meta($post_id,'tochiyouto',true)!='' ){ ?>
                  <tr>
                    <th class="th1">地目</th>
                    <td class="td1"><?php my_custom_tochichimoku_print($post_id); ?></td>
                    <th class="th2">用途地域</th>
                    <td class="td2"><?php my_custom_tochiyouto_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochikeikaku',true)!='' || get_post_meta($post_id,'tochichisei',true)!='' ){ ?>
                  <tr>
                    <th class="th1">都市計画</th>
                    <td class="td1"><?php my_custom_tochikeikaku_print($post_id); ?></td>
                    <th class="th2">地勢</th>
                    <td class="td2"><?php my_custom_tochichisei_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochikukaku',true)!='' || get_post_meta($post_id,'tochisokutei',true)!='' ){ ?>
                  <tr>
                    <th class="th1">土地面積</th>
                    <td class="td1"><?php echo get_post_meta($post_id, 'tochikukaku', true);?>m&sup2;</td>
                    <th class="th2">土地面積計測方式</th>
                    <td class="td2"><?php my_custom_tochisokutei_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochishido',true) ){ ?>
                  <tr>
                    <th class="th1">私道負担面積</th>
                    <td class="td1" colspan="3"><?php echo get_post_meta($post_id, 'tochishido', true);?>m&sup2;</td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetback',true) || get_post_meta($post_id,'tochisetback2',true) ){ ?>
                  <tr>
                    <th class="th1">セットバック</th>
                    <td class="td1"><?php my_custom_tochisetback_print($post_id); ?></td>
                    <th class="th2">セットバック量</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'tochisetback2', true ) ){ ?>
                      <?php echo get_post_meta($post_id, 'tochisetback2', true);?>m&sup2;
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochikenpei',true) || get_post_meta($post_id,'tochiyoseki',true) ){ ?>
                  <tr>
                    <th class="th1">建ぺい率</th>
                    <td class="td1"><?php echo get_post_meta($post_id, 'tochikenpei', true);?>%</td>
                    <th class="th2">容積率</th>
                    <td class="td2"><?php echo get_post_meta($post_id, 'tochiyoseki', true);?>%</td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochikenri',true)!='' || get_post_meta($post_id,'tochisetsudo',true)!='' ){ ?>
                  <tr>
                    <th class="th1">土地権利</th>
                    <td class="td1"><?php my_custom_tochikenri_print($post_id); ?></td>
                    <th class="th2">接道状況</th>
                    <td class="td2"><?php my_custom_tochisetsudo_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudohouko1',true)!='' || get_post_meta($post_id,'tochisetsudomaguchi1',true)!='' ){ ?>
                  <tr>
                    <th class="th1">接道方向1</th>
                    <td class="td1"><?php my_custom_tochisetsudohouko1_print($post_id); ?></td>
                    <th class="th2">接道間口1</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'tochisetsudomaguchi1', true ) ){ ?>
                      <?php echo get_post_meta($post_id, 'tochisetsudomaguchi1', true);?>m
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudoshurui1',true)!='' || get_post_meta($post_id,'tochisetsudofukuin1',true)!='' ){ ?>
                  <tr>
                    <th class="th1">接道種別1</th>
                    <td class="td1"><?php my_custom_tochisetsudoshurui1_print($post_id); ?></td>
                    <th class="th2">接道幅員1</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'tochisetsudofukuin1', true ) ){ ?>
                      <?php echo get_post_meta($post_id, 'tochisetsudofukuin1', true);?>m
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudoichishitei1',true)!='' ){ ?>
                  <tr>
                    <th class="th1">位置指定道路1</th>
                    <td class="td1" colspan="3"><?php my_custom_tochisetsudoichishitei1_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudohouko2',true)!='' || get_post_meta($post_id,'tochisetsudomaguchi2',true)!='' ){ ?>
                  <tr>
                    <th class="th1">接道方向2</th>
                    <td class="td1"><?php my_custom_tochisetsudohouko2_print($post_id); ?></td>
                    <th class="th2">接道間口2</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'tochisetsudomaguchi2', true ) ){ ?>
                      <?php echo get_post_meta($post_id, 'tochisetsudomaguchi2', true);?>m
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudoshurui2',true)!='' || get_post_meta($post_id,'tochisetsudofukuin2',true)!='' ){ ?>
                  <tr>
                    <th class="th1">接道種別2</th>
                    <td class="td1"><?php my_custom_tochisetsudoshurui2_print($post_id); ?></td>
                    <th class="th2">接道幅員2</th>
                    <td class="td2">
                      <?php if( get_post_meta( $post_id, 'tochisetsudofukuin2', true ) ){ ?>
                      <?php echo get_post_meta($post_id, 'tochisetsudofukuin2', true);?>m
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochisetsudoichishitei2',true)!='' ){ ?>
                  <tr>
                    <th class="th1">位置指定道路2</th>
                    <td class="td1" colspan="3"><?php my_custom_tochisetsudoichishitei2_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <?php if( get_post_meta($post_id,'tochikokudohou',true)!='' ){ ?>
                  <tr>
                    <th class="th1">国土法届出</th>
                    <td class="td1" colspan="3"><?php my_custom_tochikokudohou_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <!-- .土地 -->

                  <?php do_action( 'single-fudo12', $post_id ); ?>

                  <tr>
                    <th class="th1">周辺環境</th>
                    <td class="td1" colspan="3">

                      <!-- #校区 -->
                      <?php do_action( 'kouku_print', $post_id );?>

                      <?php
											//周辺環境
											if( !$is_fudoukouku && get_post_meta( $post_id, 'shuuhenshougaku', true ) !='' ){
												echo get_post_meta( $post_id, 'shuuhenshougaku', true );
											}

											if( !$is_fudoukouku && get_post_meta( $post_id, 'shuuhenchuugaku', true ) !='' ){
												echo '　' . get_post_meta( $post_id, 'shuuhenchuugaku', true );
												echo  '<br />';
											}

											echo get_post_meta($post_id, 'shuuhensonota', true);
										?>
                    </td>
                  </tr>

                  <tr>
                    <th class="th1">設備・条件</th>
                    <td class="td1" colspan="3"><?php my_custom_setsubi_print($post_id); ?></td>
                  </tr>

                  <?php if( get_post_meta($post_id,'targeturl',true)!='' ){ ?>
                  <tr>
                    <th class="th1">URL</th>
                    <td class="td1" colspan="3"><?php my_custom_targeturl_print($post_id); ?></td>
                  </tr>
                  <?php } ?>

                  <tr>
                    <th class="th1">物件番号</th>
                    <td class="td1" <?php if( get_post_meta($post_id,'keisaikigenbi',true)=='' ) echo ' colspan="3"'; ?>>
                      <?php echo get_post_meta($post_id, 'shikibesu', true);?></td>

                    <?php if( get_post_meta($post_id,'keisaikigenbi',true)!='' ){ ?>
                    <th class="th2">掲載期限日</th>
                    <td class="td2"><?php echo get_post_meta($post_id, 'keisaikigenbi', true);?></td>
                    <?php } ?>
                  </tr>

                  <?php if( get_post_meta($post_id,'koukaijisha',true)!='' || get_post_meta($post_id,'jyoutai',true)!='' ){ ?>
                  <tr>
                    <th class="th1">自社物</th>
                    <td class="td1"><?php my_custom_koukaijisha_print($post_id);?></td>
                    <th class="th2">状態</th>
                    <td class="td2"><?php my_custom_jyoutai_print($post_id);?></td>
                  </tr>
                  <?php } ?>


                  <?php if( get_post_meta( $post_id, 'tokkinotices', true ) !='' ){ //不動産プラグイン v5.0.0 ?>
                  <tr>
                    <th class="th1">特記事項</th>
                    <td class="td1" colspan="3"><?php echo get_post_meta( $post_id, 'tokkinotices', true ); ?></td>
                  </tr>
                  <?php } ?>


                  <?php do_action( 'single-fudo3', $post_id ); ?>

                </table>
              </div>
              <!-- .2列table -->

              <?php do_action( 'single-fudo13', $post_id ); ?>


              <?php
								//Gutenberg 利用
								if ( get_option( 'fudo_use_gutenberg' ) == 'true' ) { 	//Gutenberg 利用の場合
								?>
              <?php }else{ ?>
              <!-- .entry-content -->
              <div class="entry-content">
                <?php the_content();?>
              </div>
              <!-- .entry-content -->
              <?php } ?>

              <?php do_action( 'single-fudo14', $post_id ); ?>

              <!-- 地図 -->
              <?php
								/**
								 * 地図表示 GoogleMaps Places
								 *
								 * @since Fudousan Plugin ver1.7.12
								 * For single-fudo.php apply_filters( 'fudou_single_googlemaps', $post_id , $kaiin , $kaiin2 , $title );
								 *
								 * @param int $post_id Post ID.
								 * @param int $kaiin.
								 * @param int $kaiin2.
								 * @param str $title.
								 * @return text
								 */
								apply_filters( 'fudou_single_googlemaps', $post_id , $kaiin , $kaiin2 , $title );
								?>
              <!-- // 地図 -->


              <?php do_action( 'single-fudo15', $post_id ); ?>

              <?php
							//画像 11～30
							if( $fudou_img_max > 10 ){

								/*
								 * 物件詳細画像2
								 * do_action( 'single_fudou_img', $post_id, $title, $fudou_lazy_loading, $fudou_img_start, $fudou_img_end, $type  );
								 * @param int $post_id
								 * @param string $title
								 * @param string $fudou_lazy_loading
								 * @param string $fudou_img_start
								 * @param string $fudou_img_end
								 * @param int $type
								 * Version: 6.1.0
								*/
								do_action( 'single_fudou_img2', $post_id, $title, $fudou_lazy_loading, apply_filters( 'fudou_img_start2', 11 ), apply_filters( 'fudou_img_end2', $fudou_img_max ), 2 );
							}
						?>
              <div class="list_detail_bottom_info">※物件掲載内容と現況に相違がある場合は現況を優先と致します。</div>

              <?php do_action( 'single-fudo16', $post_id ); ?>

              <!-- 物件詳細ウィジェット -->
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('syousai_widgets') ) : ?>
              <?php endif; ?>


              <?php do_action( 'single-fudo4', $post_id ); ?>


            </div><!-- .list_detail -->


            <?php } ?>

            <?php } ?>
            <!-- //ユーザー別会員物件リスト -->

          </div><!-- .list_simple_box -->

          <!-- .byline -->
          <?php fudou_entry_meta( $post_id ); ?>

        </div><!-- .#nav-above#post-## -->

        <?php do_action( 'single-fudo17', $post_id ); ?>

        <?php
			//SSL
			$fudou_ssl_site_url = get_option('fudou_ssl_site_url');


			//物件問合せ先
			echo '<div id="toiawasesaki">';

			if( $fudou_ssl_site_url != ''){
				//Tweet, Like, Google +1 and Share
				if ( function_exists('disp_social') )
					add_filter('the_content', 'disp_social',1);
				//WP Social Bookmarking Light
				if ( function_exists('wp_social_bookmarking_light_the_content') )
					add_filter('the_content', 'wp_social_bookmarking_light_the_content');
			}

			$fudo_annnai = get_option('fudo_annnai');
			/*
			 * 物件問合せ先 Filter
			 *
			 * Version: 1.7.12
			 */
			$fudo_annnai = apply_filters( 'fudo_single_annnai', $fudo_annnai, $post_id );

			$fudo_annnai = apply_filters( 'the_content', $fudo_annnai );
			$fudo_annnai = str_replace( ']]>', ']]&gt;', $fudo_annnai );
			echo $fudo_annnai;

			echo '</div>';


			do_action( 'single-fudo5', $post_id );


			if( $kaiin == 1 ) {
			}else{

				if ( $kaiin2 ){

					//SSL
					if( $fudou_ssl_site_url !=''){
						//SSL問合せフォーム
						echo '<div id="ssl_botton" align="center">';
						echo '<a href="'.$fudou_ssl_site_url.'/wp-content/plugins/fudou/themes/contact.php?post_type=fudo&p='.$post_id.'&KeepThis=true&TB_iframe=true&height=500&width=620" ' . $thickbox_class . '>';
						echo '<img ' . $fudou_lazy_loading . ' src="'.get_option('siteurl').'/wp-content/plugins/fudou/img/ask_botton.jpg" alt="物件お問合せ" title="物件お問合せ" width="300" height="65"></a>';
						echo '</div>';
						echo '<br />';
					}else{

						//問合せフォーム
						echo '<div id="contact_form">';

						//Tweet, Like, Google +1 and Share
						if ( function_exists('disp_social') )
							add_filter('the_content', 'disp_social',1);
						//WP Social Bookmarking Light
						if ( function_exists('wp_social_bookmarking_light_the_content') )
							add_filter('the_content', 'wp_social_bookmarking_light_the_content');

						$fudo_form = get_option('fudo_form');

						/*
						 * 問合せフォーム Filter
						 *
						 * Version: 1.7.12
						 */
						$fudo_form = apply_filters( 'fudo_single_form', $fudo_form, $post_id );

						$fudo_form = apply_filters( 'the_content', $fudo_form );
						$fudo_form = str_replace( ']]>', ']]&gt;', $fudo_form );
						echo $fudo_form;
						echo '</div>';
					}

				} //kaiin2
			} //kaiin

			//コメント
			if( FUDOU_TRA_COMMENT )	 comments_template( '', true );

			do_action( 'single-fudo6', $post_id );

?>
      </div><!-- .list_simplepage2 -->

      <?php } //パスワード保護 ?>

      <?php edit_post_link( '[編集]', '<span class="edit-link">', '</span>' ); ?>

    </div><!-- .#content -->

  </div><!-- .#container -->


  <?php
	get_sidebar();
	get_footer();