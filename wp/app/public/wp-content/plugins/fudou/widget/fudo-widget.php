<?php
/*
 * 不動産プラグインウィジェット
 * @package WordPress 6.1
 * @subpackage Fudousan Plugin
 * Version: 6.1.3
*/


//トップ投稿表示(最近の記事)
function fudo_toukouInit_top() {
	register_widget('fudo_toukou_top');
}
add_action('widgets_init', 'fudo_toukouInit_top');

//トップ物件表示
function fudo_widgetInit_top_r() {
	register_widget('fudo_widget_top_r');
}
add_action('widgets_init', 'fudo_widgetInit_top_r');

// 売買路線カテゴリ register Class fudo_widget widget
function fudo_widgetInit_b_r() {
	register_widget('fudo_widget_b_r');
}
add_action('widgets_init', 'fudo_widgetInit_b_r');

// 賃貸路線カテゴリ register Class fudo_widget widget
function fudo_widgetInit_r_r() {
	register_widget('fudo_widget_r_r');
}
add_action('widgets_init', 'fudo_widgetInit_r_r');

// 売買地域カテゴリ register Class fudo_widget widget
function fudo_widgetInit_b_c() {
	register_widget('fudo_widget_b_c');
}
add_action('widgets_init', 'fudo_widgetInit_b_c');

// 賃貸地域カテゴリ register Class fudo_widget widget
function fudo_widgetInit_r_c() {
	register_widget('fudo_widget_r_c');
}
add_action('widgets_init', 'fudo_widgetInit_r_c');

// 物件カテゴリ register Class fudo_widget widget
function fudo_widgetInit_cat() {
	register_widget('fudo_widget_cat');
}
add_action('widgets_init', 'fudo_widgetInit_cat');

// タクソノミー register Class fudo_widget_tag widget
function fudo_widgetInit_tag() {
	register_widget('fudo_widget_tag');
}
add_action('widgets_init', 'fudo_widgetInit_tag');

// 物件検索(キーワード)
function fudo_widgetInit_search() {
	register_widget('fudo_widget_search');
}
add_action('widgets_init', 'fudo_widgetInit_search');



/*
 * トップ投稿表示(最近の記事)
 * Version: 6.1.0
 */
class fudo_toukou_top extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'description'                 => '最近の投稿記事(抜粋優先・アイキャッチ画像)を表示します。',
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_toukou_top', '最近の投稿表示', $widget_ops );
		*/

		parent::__construct(
			'fudo_toukou_top', 		// Base ID
			'最近の投稿表示' ,		// Name
			array( 'description' => '最近の投稿記事(抜粋優先・アイキャッチ画像)を表示します。', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$t_cat = isset($instance['t_cat']) ? esc_attr($instance['t_cat']) : '';
		$item  = isset($instance['item'])  ? esc_attr($instance['item']) : '';
		$date_sort  = isset($instance['date_sort'])  ? esc_attr($instance['date_sort']) : '';
		$date_view  = isset($instance['date_view'])  ? esc_attr($instance['date_view']) : '';

		$bukken_id = isset($instance['bukken_id']) 	? esc_attr($instance['bukken_id']) : '';
		$exclude   = isset($instance['exclude']) 	? esc_attr($instance['exclude']) : '';


		if($item=='') $item = 5;

		?>

		<?php do_action( 'fudo_toukou_top_form1', $this, $instance );?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		タイトル <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>

		<?php do_action( 'fudo_toukou_top_form2', $this, $instance );?>

		<hr>

		絞り込み方法①
		<blockquote>

		<?php do_action( 'fudo_toukou_top_form3', $this, $instance );?>

		<p><label for="<?php echo $this->get_field_id('t_cat'); ?>">
		投稿カテゴリ<br /><?php wp_dropdown_categories(array('show_option_all' => '全てのカテゴリ', 'hide_empty' => 0, 'hierarchical' => 1, 'show_count' => 0, 'name' => $this->get_field_name('t_cat'), 'id' => $this->get_field_id('t_cat'), 'orderby' => 'name', 'selected' => $t_cat  ));?></label>
		</p>

		<p><label for="<?php echo $this->get_field_id('date_sort'); ?>">
		並び順 <select class="widefat" id="<?php echo $this->get_field_id('date_sort'); ?>" name="<?php echo $this->get_field_name('date_sort'); ?>">
			<option value="0"<?php if( empty( $date_sort ) ){echo ' selected="selected"';} ?>>投稿日 (新しい順)</option>
			<option value="1"<?php if( $date_sort == 1 ){echo ' selected="selected"';} ?>>更新日 (新しい順)</option>
		</select></label>
		</p>

		<p><label for="<?php echo $this->get_field_id('exclude'); ?>">
		除外投稿(投稿ID カンマ区切り) <input class="widefat" id="<?php echo $this->get_field_id('exclude'); ?>" name="<?php echo $this->get_field_name('exclude'); ?>" type="text" value="<?php echo $exclude; ?>" /></label>
		</p>

		<?php do_action( 'fudo_toukou_top_form4', $this, $instance );?>

		</blockquote>


		<hr>


		絞り込み方法②
		<blockquote>

		<?php do_action( 'fudo_toukou_top_form5', $this, $instance );?>

		<p><label for="<?php echo $this->get_field_id('bukken_id'); ?>">
		直接 投稿IDで指定(投稿ID カンマ区切り) <input class="widefat" id="<?php echo $this->get_field_id('bukken_id'); ?>" name="<?php echo $this->get_field_name('bukken_id'); ?>" type="text" value="<?php echo $bukken_id; ?>" /></label>
		<label>※投稿IDを指定すると、①で設定した「投稿カテゴリ」「並び順」「除外投稿」の設定は無効になり、指定した投稿ID順に表示されます。</label>
		</p>

		<?php do_action( 'fudo_toukou_top_form6', $this, $instance );?>

		</blockquote>

		<hr>

		<?php do_action( 'fudo_toukou_top_form7', $this, $instance );?>

		<p><label for="<?php echo $this->get_field_id('item'); ?>">
		最大表示数 <input class="widefat" id="<?php echo $this->get_field_id('item'); ?>" name="<?php echo $this->get_field_name('item'); ?>" type="text" value="<?php echo $item; ?>" /></label></p>

		<?php do_action( 'fudo_toukou_top_form8', $this, $instance );?>

		<p><label for="<?php echo $this->get_field_id('date_view'); ?>">
		日付表示 <select class="widefat" id="<?php echo $this->get_field_id('date_view'); ?>" name="<?php echo $this->get_field_name('date_view'); ?>">
			<option value="0"<?php if( empty( $date_view ) ){echo ' selected="selected"';} ?>>投稿日</option>
			<option value="1"<?php if( $date_view == 1 ){echo ' selected="selected"';} ?>>更新日</option>
			<option value="2"<?php if( $date_view == 2 ){echo ' selected="selected"';} ?>>非表示</option>
		</select></label>
		</p>

		<?php do_action( 'fudo_toukou_top_form10', $this, $instance );?>

		<?php

	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return apply_filters( 'fudo_toukou_top_form_update', $new_instance, $old_instance );
		//return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {

		global $wpdb;
		global $fudou_lazy_loading;

		// outputs the content of the widget

		$title = isset($instance['title']) ? esc_attr( apply_filters( 'widget_title', $instance['title'] ) ): '';
		$t_cat = isset($instance['t_cat']) ? esc_attr( $instance['t_cat'] ) : '';
		$item  = isset($instance['item'])  ? esc_attr( $instance['item'] ) : '5';

		//v6.1.0
		$date_sort  = isset($instance['date_sort'])  ? esc_attr($instance['date_sort']) : '';
		//v6.1.0
		$date_view  = isset($instance['date_view'])  ? esc_attr($instance['date_view']) : '';

		//v6.1.0
		$exclude = isset($instance['exclude']) 	? esc_attr( $instance['exclude'] ) : '';
		//num check
		$array_exclude_data = explode( ",", $exclude );
		$exclude_data = '';
		if( $array_exclude_data ){
			$i = 0;
			foreach( $array_exclude_data as $data ) {
				if( is_numeric( $data ) ){
					if( $i > 0 ) $exclude_data .= ",";
					$exclude_data .= (int)$data;
					$i++;
				}
			}
		}

		// Post-ID指定 ver6.1.0
		$bukken_id   = isset($instance['bukken_id']) ? esc_attr( $instance['bukken_id'] ) : '';
		$array_bukken_id = explode( ",", $bukken_id );

		$bukken_id_data = '';
		$sort_bukken_id_data = array();

		//num check
		if( $array_bukken_id ){
			$i = 0;
			foreach( $array_bukken_id as $data ) {
				if( is_numeric( $data ) ){
					if( $i > 0 ) $bukken_id_data .= ",";
					$bukken_id_data .= (int)$data;

					$sort_bukken_id_data[] = (int)$data;
					$i++;
				}
			}
		}



		//image size thumbnail or medium v6.1.0
		$image_size = apply_filters( 'fudo_toukou_top_image_size', 'thumbnail' );

		//width height ver5.5.0 single
		$default_single_width  = apply_filters( 'fudo_single_thumbnail_width', 150 );
		$default_single_height = apply_filters( 'fudo_single_thumbnail_height', 150 );
		$defaultimg_single_width_height = apply_filters( 'defaultimg_single_width_height', ' width="' . $default_single_width . '" height="' . $default_single_height . '"' );

		echo $args['before_widget'];

		$category_link = '';
		if( $t_cat > 0 ){
			$category_link = get_category_link( $t_cat );
		}
		//カテゴリ指定の場合はタイトルにカテゴリリンク
		if ( $title !='' ){
			if( $category_link && $bukken_id_data == '' ){
				echo $args['before_title'] . '<a href="' . $category_link . '">' . $title . '</a>' .  $args['after_title']; 
			}else{
				echo $args['before_title'] . $title . $args['after_title'];
			}
		}


		if( $bukken_id_data != '' ){

			// Post-ID指定 ver6.1.0
			// Post-ID指定の場合は固定ページも対象 ver6.1.0
			$sql  = "SELECT DISTINCT P.ID";
			$sql .= " FROM $wpdb->posts AS P ";
			$sql .= " WHERE P.post_password='' AND P.post_status='publish'";
			$sql .= " AND ( P.post_type='post' OR P.post_type='page' )";
			$sql .= " AND P.ID IN ( ". $bukken_id_data ." )";
		}else{

			$sql  = "SELECT DISTINCT P.ID";
			$sql .= " FROM $wpdb->posts AS P ";
			$sql .= " INNER JOIN ($wpdb->term_taxonomy AS TT ";
			$sql .= " INNER JOIN $wpdb->term_relationships AS TR ON TT.term_taxonomy_id = TR.term_taxonomy_id) ON P.ID = TR.object_id";
			$sql .= " WHERE P.post_password='' AND P.post_status='publish'";
			$sql .= " AND P.post_type='post'";

			// カテゴリ指定
			if( $t_cat > 0 ){
				$sql .= " AND TT.term_id =" . $t_cat .  "";
			}
			// 除外投稿 ver6.1.0
			if( $exclude_data != '' ){
				$sql .= " AND P.ID NOT IN (" . $exclude_data .  ")";
			}
		}

		// 並び順 ver6.1.0
		if( $date_sort == 1 ){
			$sql .= " ORDER BY P.post_modified DESC";
		}else{
			$sql .= " ORDER BY P.post_date DESC";
		}

		$sql .=  " LIMIT 0,".$item."";

		//$sql = $wpdb->prepare($sql,'');
		$metas = $wpdb->get_results( $sql, ARRAY_A );
		if(!empty($metas)) {

			// post_id設定順に並び替える
			if( $sort_bukken_id_data ){
				$bukken_metas = array();
				foreach( $sort_bukken_id_data as $id ){

					foreach ( $metas as $meta ) {
						if( $id == $meta['ID'] ){
							$bukken_metas[] = array(
								'ID' => $meta['ID'],
							);
						}
					}
				}
				if( $bukken_metas ){
					$metas = $bukken_metas;
				}
			}

			$value_dat = '';

			/* 
			 * 最近の投稿表示 テンプレート
			 * v6.1.0
			 */
			$value_dat = apply_filters( 'toukou_top_view_custom', $value_dat, $metas, $instance );

			if( !$value_dat ){

				//...続きを読む
				add_action( 'excerpt_more', array( $this, 'fudo_toukou_top_more'), 99 );
				//文字数
				add_action( 'excerpt_length', array( $this, 'fudo_toukou_top_length'), 99 );

				$value_dat  = "\n<!-- 6.1.0 -->";
				$value_dat .= '<ul id="toukou_top">';
				foreach ( $metas as $meta ) {

					$meta_id = $meta['ID'];

					$post_array = get_post( $meta_id );

					//タイトル
					$post_title = isset( $post_array->post_title ) ? $post_array->post_title : '';

					//抜粋
					$excerpt_data = apply_filters( 'get_the_excerpt', $post_array->post_excerpt, $post_array );

					//投稿日
					$post_date = isset( $post_array->post_date ) ? $post_array->post_date : '';
					$post_date = date('Y/m/d',  strtotime( $post_date ));


					//更新日
					$post_modified = isset( $post_array->post_modified ) ? $post_array->post_modified : '';
					$post_modified = date('Y/m/d',  strtotime( $post_modified ));

					//アイキャッチ画像
					$toukou_top_thumbnail = get_the_post_thumbnail( $meta_id , $image_size,  array( 'alt' => esc_html( $post_title ) ) );

					$value_dat .= '<li><a href="' . get_permalink($meta_id) . '"><span class="toukou_top_post_title">'. esc_html( $post_title ) . '</span></a><br />';
					$value_dat .= '<ul class="toukou_top_post_excerpt">';
					$value_dat .= '<li><span class="toukou_top_post_thumbnail">' . $toukou_top_thumbnail . '</span>';
					$value_dat .= '' . strip_shortcodes( $excerpt_data ) . '';

					if( empty( $date_view ) ){
						$value_dat .= '<span style="float:right;">['.$post_date.']</span>';

					}
					if( $date_view == 1 ){
						$value_dat .= '<span style="float:right;">['.$post_modified.']</span>';
					}


					$value_dat .= '</li></ul>';
					$value_dat .= '</li>';

				}
				$value_dat .= '</ul>';

				//...続きを読む
				remove_action( 'excerpt_more', array( $this, 'fudo_toukou_top_more'), 99 );
				//文字数
				remove_action( 'excerpt_length', array( $this, 'fudo_toukou_top_length'), 99 );
			}

			echo $value_dat;
		}

		echo $args['after_widget'];
	}



	//...続きを読む v6.1.0
	function fudo_toukou_top_more( $more ) {
		return apply_filters( 'fudo_toukou_top_more', '...' );
	}

	//文字数 v6.1.0
	function fudo_toukou_top_length( $length ) {
		return apply_filters( 'fudo_toukou_top_length', 130 ); 
	}

} // Class fudo_toukou_top








/**
 * トップ物件表示
 *
 * Version: 6.1.3
 */
class fudo_widget_top_r extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'description'                 => 'トップページに物件を表示します。',
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_top_r', 'トップ物件表示', $widget_ops );
		*/

		parent::__construct(
			'fudo_top_r', 			// Base ID
			'トップ物件表示' ,		// Name
			array( 'description' => 'トップページに物件を表示します。', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {

		global $is_fudoukaiin;

		$title      = isset($instance['title'])		? esc_attr($instance['title']) : '';
		$item       = isset($instance['item'])		? esc_attr($instance['item']) : '';
		$shubetsu   = isset($instance['shubetsu']) 	? esc_attr($instance['shubetsu']) : '';
		$bukken_cat = isset($instance['bukken_cat']) 	? esc_attr($instance['bukken_cat']) : '';
		$sort       = isset($instance['sort']) 		? esc_attr($instance['sort']) : '';

		$view1 = isset($instance['view1']) ? esc_attr($instance['view1']) : '';
		$view2 = isset($instance['view2']) ? esc_attr($instance['view2']) : '';
		$view3 = isset($instance['view3']) ? esc_attr($instance['view3']) : '';
		$view4 = isset($instance['view4']) ? esc_attr($instance['view4']) : '';
		$view5 = isset($instance['view5']) ? esc_attr($instance['view5']) : '';
		$view6 = isset($instance['view6']) ? esc_attr($instance['view6']) : '';	//バス路線

		$kaiinview = isset($instance['kaiinview']) 	? esc_attr($instance['kaiinview']) : '';
		$seiyaku   = isset($instance['seiyaku']) 	? esc_attr($instance['seiyaku']) : '';		//成約物件
		$button_text = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';

		if($item=='') $item = 4;

		//v6.1.3
		do_action( 'fudo_top_r_widget_form_pre', $this, $instance );

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		タイトル <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form0', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('item'); ?>">
		表示数 <input class="widefat" id="<?php echo $this->get_field_id('item'); ?>" name="<?php echo $this->get_field_name('item'); ?>" type="text" value="<?php echo $item; ?>" /></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form1', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('shubetsu'); ?>">
		種別 <select class="widefat" id="<?php echo $this->get_field_id('shubetsu'); ?>" name="<?php echo $this->get_field_name('shubetsu'); ?>">
			<option value="1"<?php if($shubetsu == 1){echo ' selected="selected"';} ?>>物件すべて</option>
			<option value="2"<?php if($shubetsu == 2){echo ' selected="selected"';} ?>>売買すべて</option>
			<option value="3"<?php if($shubetsu == 3){echo ' selected="selected"';} ?>>売買土地</option>
			<option value="4"<?php if($shubetsu == 4){echo ' selected="selected"';} ?>>売買戸建</option>
			<option value="5"<?php if($shubetsu == 5){echo ' selected="selected"';} ?>>売買マンション</option>
			<option value="6"<?php if($shubetsu == 6){echo ' selected="selected"';} ?>>売買住宅以外の建物全部</option>
			<option value="7"<?php if($shubetsu == 7){echo ' selected="selected"';} ?>>売買住宅以外の建物一部</option>
			<option value="10"<?php if($shubetsu == 10){echo ' selected="selected"';} ?>>賃貸すべて</option>
			<option value="11"<?php if($shubetsu == 11){echo ' selected="selected"';} ?>>賃貸居住用</option>
			<option value="12"<?php if($shubetsu == 12){echo ' selected="selected"';} ?>>賃貸事業用</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form2', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('bukken_cat'); ?>">
		物件カテゴリ <select class="widefat" id="<?php echo $this->get_field_id('bukken_cat'); ?>" name="<?php echo $this->get_field_name('bukken_cat'); ?>">
			<option value="0"<?php if($bukken_cat == 0){echo ' selected="selected"';} ?>>すべて</option>
		<?php

		//物件カテゴリ
		$terms = get_terms('bukken', 'hide_empty=0');

		if ( !empty( $terms ) ){
			foreach ( $terms as $term ) {
				echo  '<option value="'.$term->term_id.'"';
				if( $bukken_cat == $term->term_id )	echo ' selected="selected"';
				echo '>'.$term->name.'</option>';
			}
		}
		?>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form3', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('sort'); ?>">
		並び順 <select class="widefat" id="<?php echo $this->get_field_id('sort'); ?>" name="<?php echo $this->get_field_name('sort'); ?>">
			<option value="2"<?php if($sort == 2){echo ' selected="selected"';} ?>>新しい順(登録日)</option>
			<option value="3"<?php if($sort == 3){echo ' selected="selected"';} ?>>古い順(登録日)</option>
			<option value="8"<?php if($sort == 8){echo ' selected="selected"';} ?>>新しい順(更新日)</option>
			<option value="9"<?php if($sort == 9){echo ' selected="selected"';} ?>>古い順(更新日)</option>
			<option value="4"<?php if($sort == 4){echo ' selected="selected"';} ?>>高い順(価格)</option>
			<option value="5"<?php if($sort == 5){echo ' selected="selected"';} ?>>安い順(価格)</option>
			<option value="6"<?php if($sort == 6){echo ' selected="selected"';} ?>>広い順(面積)</option>
			<option value="7"<?php if($sort == 7){echo ' selected="selected"';} ?>>狭い順(面積)</option>
			<option value="1"<?php if($sort == 1){echo ' selected="selected"';} ?>>ランダム</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form4', $this, $instance );
		?>


		表示項目<br />
		<p><label for="<?php echo $this->get_field_id('view1'); ?>">
		タイトル <select class="widefat" id="<?php echo $this->get_field_id('view1'); ?>" name="<?php echo $this->get_field_name('view1'); ?>">
			<option value="1"<?php if($view1 == 1){echo ' selected="selected"';} ?>>表示する</option>
			<option value="2"<?php if($view1 == 2){echo ' selected="selected"';} ?>>表示しない</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form5', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('view2'); ?>">
		価格 <select class="widefat" id="<?php echo $this->get_field_id('view2'); ?>" name="<?php echo $this->get_field_name('view2'); ?>">
			<option value="1"<?php if($view2 == 1){echo ' selected="selected"';} ?>>表示する</option>
			<option value="2"<?php if($view2 == 2){echo ' selected="selected"';} ?>>表示しない</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form6', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('view3'); ?>">
		間取り・土地面積 <select class="widefat" id="<?php echo $this->get_field_id('view3'); ?>" name="<?php echo $this->get_field_name('view3'); ?>">
			<option value="1"<?php if($view3 == 1){echo ' selected="selected"';} ?>>表示する</option>
			<option value="2"<?php if($view3 == 2){echo ' selected="selected"';} ?>>表示しない</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form7', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('view4'); ?>">
		地域 <select class="widefat" id="<?php echo $this->get_field_id('view4'); ?>" name="<?php echo $this->get_field_name('view4'); ?>">
			<option value="1"<?php if($view4 == 1){echo ' selected="selected"';} ?>>表示する</option>
			<option value="2"<?php if($view4 == 2){echo ' selected="selected"';} ?>>表示しない</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form8', $this, $instance );
		?>


		<p><label for="<?php echo $this->get_field_id('view5'); ?>">
		路線・駅 <select class="widefat" id="<?php echo $this->get_field_id('view5'); ?>" name="<?php echo $this->get_field_name('view5'); ?>">
			<option value="1"<?php if($view5 == 1){echo ' selected="selected"';} ?>>表示する</option>
			<option value="2"<?php if($view5 == 2){echo ' selected="selected"';} ?>>表示しない</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form9', $this, $instance );
		?>


	<?php if($is_fudoukaiin && get_option('kaiin_users_can_register') == '1' ){ ?>
		<p><label for="<?php echo $this->get_field_id('kaiinview'); ?>">
		会員物件 <select class="widefat" id="<?php echo $this->get_field_id('kaiinview'); ?>" name="<?php echo $this->get_field_name('kaiinview'); ?>">
			<option value="1"<?php if($kaiinview == 1){echo ' selected="selected"';} ?>>会員・一般物件を表示する</option>
			<option value="2"<?php if($kaiinview == 2){echo ' selected="selected"';} ?>>会員物件を表示しない</option>
			<option value="3"<?php if($kaiinview == 3){echo ' selected="selected"';} ?>>会員物件だけ表示</option>
		</select></label></p>
	<?php } ?>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form10', $this, $instance );
		?>


	<!-- v5.3.0 -->
		<p><label for="<?php echo $this->get_field_id('seiyaku'); ?>">
		成約物件 <select class="widefat" id="<?php echo $this->get_field_id('seiyaku'); ?>" name="<?php echo $this->get_field_name('seiyaku'); ?>">
			<option value=""<?php if( !$seiyaku ){echo ' selected="selected"';} ?>>全て表示する</option>
			<option value="1"<?php if($seiyaku == 1){echo ' selected="selected"';} ?>>成約物件を表示しない</option>
			<option value="2"<?php if($seiyaku == 2){echo ' selected="selected"';} ?>>成約物件だけ表示</option>
		</select></label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form11', $this, $instance );
		?>


	<!-- v5.9.0 -->
		<p><label for="<?php echo $this->get_field_id('button_text'); ?>">
		物件詳細リンクテキスト <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
		※空欄の場合「→物件詳細」と 表示されます</label></p>


		<?php
		//v6.1.3
		do_action( 'fudo_top_r_widget_form12', $this, $instance );
		?>

		<?php 
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {

		//v6.1.3
		return apply_filters( 'fudo_top_r_widget_form_update', $new_instance, $old_instance );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {

		global $is_fudoukaiin;
		global $wpdb;
		global $fudou_lazy_loading;

		$img_path = get_option('upload_path');
		if ( empty( $img_path ) ){
			$img_path = 'wp-content/uploads';
		}
		//WordPressのアドレス(URL)
		$img_folder_url = site_url( '/' ) . $img_path;

		//for block
		if( !isset( $args['widget_id'] ) ){
			$args['widget_id'] = 'box' . mt_rand();
		}

		if( !isset( $args['id'] ) ){
			$args['id'] = 'top_widgets';
		}

		$title      = isset($instance['title']) 	? esc_attr( apply_filters( 'widget_title', $instance['title'] ) ) : '';
		$item       = isset($instance['item']) 		? esc_attr( $instance['item'] ) : 4;			//表示数
		$shubetsu   = isset($instance['shubetsu']) 	? esc_attr( $instance['shubetsu'] ) : '';
		$bukken_cat = isset($instance['bukken_cat']) 	? esc_attr( $instance['bukken_cat'] ) : '';

		$sort  = isset($instance['sort'])  ? esc_attr( $instance['sort'] ) : '';
		$view1 = isset($instance['view1']) ? esc_attr( $instance['view1'] ) : '1';
		$view2 = isset($instance['view2']) ? esc_attr( $instance['view2'] ) : '1';
		$view3 = isset($instance['view3']) ? esc_attr( $instance['view3'] ) : '1';
		$view4 = isset($instance['view4']) ? esc_attr( $instance['view4'] ) : '1';
		$view5 = isset($instance['view5']) ? esc_attr( $instance['view5'] ) : '1';
		$view6 = isset($instance['view6']) ? esc_attr( $instance['view6'] ) : '1';	//バス路線

		$kaiinview = isset($instance['kaiinview']) ? esc_attr( $instance['kaiinview'] ) : 1 ;
		if( !$is_fudoukaiin || get_option('kaiin_users_can_register') != '1' ){
			$kaiinview = 1;
		}

		$seiyaku = isset($instance['seiyaku']) ? esc_attr( $instance['seiyaku'] ) : '';		//成約物件

		//ボタン名 v5.9.0
		$button_text = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';
		if( $button_text == '' ){
			$button_text = '→物件詳細';
		}


		//NEW/UP
		$newup_mark = get_option('newup_mark');
		if($newup_mark == '') $newup_mark=14;

		$where_data = "";
		//種別
		switch ($shubetsu) {
			case 1 :	//物件すべて
				break;
			case 2 :	//売買すべて
				$where_data = " AND CAST( PM_1.meta_value AS SIGNED )<3000";
				break;
			case 3 :	//売買土地
				$where_data = " AND Left(PM_1.meta_value,2) ='11'";
				break;
			case 4 :	//売買戸建
				$where_data = " AND Left(PM_1.meta_value,2) ='12'";
				break;
			case 5 :	//売買マンション
				$where_data = " AND Left(PM_1.meta_value,2) ='13'";
				break;
			case 6 :	//売住宅以外の建物全部
				$where_data = " AND Left(PM_1.meta_value,2) ='14'";
				break;
			case 7 :	//売住宅以外の建物一部
				$where_data = " AND Left(PM_1.meta_value,2) ='15'";
				break;

			case 10 :	//賃貸すべて
				$where_data = " AND  CAST( PM_1.meta_value AS SIGNED )>3000";
				break;
			case 11 :	//賃貸居住用
				$where_data = " AND Left(PM_1.meta_value,2) ='31'";
				break;
			case 12 :	//賃貸事業用
				$where_data = " AND Left(PM_1.meta_value,2) ='32'";
				break;

			default:
				break;
		}


		//sort
		switch ($sort) {
			case 1 :	//ランダム
				$order_data = " rand()";
				break;
			case 2 :	//新しい順 (登録日)
				$order_data = " P.post_date DESC";
				break;
			case 3 :	//古い順 (登録日)
				$order_data = " P.post_date ASC";
				break;
			case 4 :	//高い順
				$order_data = " CAST( PM_2.meta_value AS SIGNED ) DESC";
				break;
			case 5 :	//安い順
				$order_data = " CAST( PM_2.meta_value AS SIGNED ) ASC";
				break;
			case 6 :	//広い順
				$order_data = " CAST( PM_3.meta_value AS SIGNED ) DESC";
				break;
			case 7 :	//狭い順
				$order_data = " CAST( PM_3.meta_value AS SIGNED ) ASC";
				break;
			case 8 :	//新しい順 (更新日)
				$order_data = " P.post_modified DESC";
				break;
			case 9 :	//古い順 (更新日)
				$order_data = " P.post_modified ASC";
				break;

			default:
				$order_data = " P.post_date DESC";
				break;
		}



		//SQL
		$sql = "";
		$sql .= "SELECT DISTINCT P.ID,P.post_title,P.post_modified,P.post_date";
		$sql .= " FROM (((((((($wpdb->posts AS P";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM   ON P.ID = PM.post_id) ";
		//種別
		if( $shubetsu != 1 ){
			$sql .= " INNER JOIN $wpdb->postmeta AS PM_1 ON P.ID = PM_1.post_id) ";
		}else{
			$sql .= " )";
		}

		//価格(sort)
		if( $sort == 4 || $sort == 5 ){
			$sql .= " INNER JOIN $wpdb->postmeta AS PM_2 ON P.ID = PM_2.post_id) ";
		}else{
			$sql .= " )";
		}

		//面積(sort)
		if( $sort == 6 || $sort == 7 ){
			$sql .= " INNER JOIN $wpdb->postmeta AS PM_3 ON P.ID = PM_3.post_id) ";
		}else{
			$sql .= " )";
		}

		//会員
		if( $kaiinview != 1 ){
			$sql .= " INNER JOIN $wpdb->postmeta AS PM_4 ON P.ID = PM_4.post_id) ";
		}else{
			$sql .= " )";
		}

		//成約物件 v5.3.0
		if( $seiyaku ){
			$sql .= " INNER JOIN $wpdb->postmeta AS PM_5 ON P.ID = PM_5.post_id) ";
		}else{
			$sql .= " )";
		}

		//カテゴリ
		if( $bukken_cat > 0){
			$sql .= " INNER JOIN $wpdb->term_relationships AS TR ON P.ID = TR.object_id) ";
			$sql .= " INNER JOIN $wpdb->term_taxonomy AS TT ON TR.term_taxonomy_id = TT.term_taxonomy_id) ";
		}else{
			$sql .= " ))";
		}

		/*
		 * トップ物件表示 org追加SQL条件 INNER JOIN
		 *
		 * Version: 1.7.4
		 */
		$sql =  apply_filters( 'fudo_top_widget_inner_join_data', $sql, $kaiinview );

			$sql .= " WHERE";
			$sql .= " P.post_status='publish' AND P.post_password = '' AND P.post_type ='fudo'";

		//種別
		if( $shubetsu != 1 )
			$sql .= " AND PM_1.meta_key='bukkenshubetsu'";

		//価格(sort)
		if( $sort == 4 || $sort == 5 )
			$sql .= " AND PM_2.meta_key='kakaku'";

		//面積(sort)
		if( $sort == 6 || $sort == 7 ){
			$sql .= " AND (PM_3.meta_key='tatemonomenseki' or PM_3.meta_key='tochikukaku' )";
			$sql .= " AND PM_3.meta_value !='' ";
		}

		//会員物件を表示しない
		if( $kaiinview == 2 ){
			$sql .= " AND PM_4.meta_key='kaiin' AND PM_4.meta_value < 1 ";
		}

		//会員物件だけ表示
		if( $kaiinview == 3 ){
			$sql .= " AND PM_4.meta_key='kaiin' AND PM_4.meta_value > 0 ";
		}

		//成約物件を表示しない v5.3.0
		if( $seiyaku == 1 ){
			$sql .= " AND PM_5.meta_key='seiyakubi' AND PM_5.meta_value = '' ";
		}
		//成約物件だけを表示する
		if( $seiyaku == 2 ){
			$sql .= " AND PM_5.meta_key='seiyakubi' AND PM_5.meta_value != '' ";
		}

		//画像
		$sql .= " AND (PM.meta_key='fudoimg1' OR PM.meta_key='fudoimg2') ";
		$sql .= " AND PM.meta_value !='' ";

		//カテゴリ
		if( $bukken_cat > 0){
			$sql .= " AND TT.term_id = ".$bukken_cat."";
		}

		/*
		 * トップ物件表示 org追加SQL条件 WHERE
		 *
		 * Version: 1.7.4
		 */
		$sql =  apply_filters( 'fudo_top_widget_where_data', $sql, $kaiinview );


		// 種別指定
		$sql .= $where_data;
		$sql .= " ORDER BY ".$order_data." limit ". $item . "";

		//$sql = $wpdb->prepare($sql,'');
		$metas = $wpdb->get_results( $sql, ARRAY_A );


		//ユーザー別会員物件リスト
		$kaiin_users_rains_register = get_option('kaiin_users_rains_register');

		//物件詳細リンク
		if ( defined('FUDOU_BUKKEN_TARGET') && FUDOU_BUKKEN_TARGET== 1 ){
			$target_link = ' target="_blank" rel="noopener"';
		}else{
			$target_link = '';
		}

		if( !empty( $metas ) ){

			//カウント v6.1.1
			$item_count_class = 'item_count' . count( $metas );

			//width height ver5.5.0
			$default_width  = apply_filters( 'fudo_top_thumbnail_width', 150 );
			$default_height = apply_filters( 'fudo_top_thumbnail_height', 150 );
			$defaultimg_width_height = apply_filters( 'defaultimg_width_height', 'width="' . $default_width . '" height="' . $default_height . '"' );

			echo '<!-- fudo_top_r v6.1.1 -->';
			echo $args['before_widget'];

			if ( $title ){
				echo $args['before_title'] . $title . $args['after_title'];
			}

			echo '<div id="box'.$args['widget_id'].'">';
			echo '<ul id="'.$args['widget_id'].'_1" class="grid-content ' . $item_count_class . '">';

			//grid_count css class
			$grid_count = 1;

			foreach ( $metas as $meta ) {

				$rosen_bus = false;	//路線を「バス」に設定している?

				$post_id	= $meta['ID'];
				$post_title	= $meta['post_title'];
				$post_url	= str_replace('&p=','&amp;p=',get_permalink($post_id));

				//newup_mark
				$post_modified =  $meta['post_modified'];
				$post_date =   $meta['post_date'];
				$post_modified_date =  vsprintf("%d-%02d-%02d", sscanf($post_modified, "%d-%d-%d"));
				$post_date =  vsprintf("%d-%02d-%02d", sscanf($post_date, "%d-%d-%d"));

				$newup_mark_img=  '';
				if( $newup_mark != 0 && is_numeric($newup_mark) ){
					if( ( abs(strtotime($post_modified_date) - strtotime(date("Y/m/d"))) / (60 * 60 * 24) ) < $newup_mark ){
						if($post_modified_date == $post_date ){
							$newup_mark_img = '<div class="new_mark">new</div>';
						}else{
							$newup_mark_img = '<div class="new_mark up_mark">up</div>';
						}
					}
				}

				//会員2
				$kaiin = 0;
				if( !is_user_logged_in() && get_post_meta($post_id, 'kaiin', true) > 0 ) $kaiin = 1;
				//ユーザー別会員物件リスト
				$kaiin2 = users_kaiin_bukkenlist( $post_id, $kaiin_users_rains_register, get_post_meta( $post_id, 'kaiin', true ) );

				echo '<li class="'.$args['widget_id'].' box1 grid_count'. $grid_count . '">';

				//grid_count css class
				$grid_count++;
				if( $grid_count > 4 ){
					$grid_count = 1;
				}

				echo $newup_mark_img;

				//会員項目表示判定
				if ( !my_custom_kaiin_view('kaiin_gazo',$kaiin,$kaiin2) ){
					echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . apply_filters( 'fudou_kaiin_img', plugins_url() . '/fudou/img/kaiin.png', $post_id ) . '" alt="会員物件" ' . $defaultimg_width_height . ' >';
				}else{

					//サムネイル画像
					$fudoimg1_data = get_post_meta($post_id, 'fudoimg1', true);
					if($fudoimg1_data != '')	$fudoimg_data=$fudoimg1_data;
					$fudoimg2_data = get_post_meta($post_id, 'fudoimg2', true);
					if($fudoimg2_data != '')	$fudoimg_data=$fudoimg2_data;

					/*
					 * fudoimg_data Filter
					 *
					 * Version: 5.2.3
					 **/
					$fudoimg_data = apply_filters( 'pre_fudoimg_data', $fudoimg_data, $post_id, 'fudo_top_r', $args['widget_id'] );

					$fudoimg_alt = str_replace("　"," ",$post_title);

					echo '<a href="' . $post_url . '" ' . $target_link . '>';

					if( $fudoimg_data !="" ){

						/*
						 * Add url fudoimg_data Pre
						 *
						 * Version: 1.7.12
						 *
						 **/
						$fudoimg_data = apply_filters( 'pre_fudoimg_data_add_url', $fudoimg_data, $post_id );

						//Check URL
						if ( checkurl_fudou( $fudoimg_data )) {
							echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . $fudoimg_data . '" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '">';
						}else{
							//Check attachment
							$sql  = "SELECT P.ID,P.guid";
							$sql .= " FROM $wpdb->posts AS P";
							$sql .= " WHERE P.post_type ='attachment' AND P.guid LIKE '%/$fudoimg_data' ";
							//$sql = $wpdb->prepare($sql,'');
							$metas = $wpdb->get_row( $sql );
							$attachmentid = '';
							if(!empty($metas)) {
								$attachmentid  =  $metas->ID;
							}

							/*
							 * fudoimg_data to attachmentid
							 *
							 * Version: 1.9.2
							 **/
							$attachmentid = apply_filters( 'fudoimg_data_to_attachmentid', $attachmentid, $fudoimg_data, $post_id );

							if($attachmentid !=''){
								/*
								 * thumbnail_type
								 * thumbnail、medium、large、full
								 *
								 * Version: 5.2.3
								 **/
								$fudo_top_thumbnail_type = apply_filters( 'fudo_top_thumbnail_type', 'thumbnail', 'fudo_top_r', $args['widget_id'] );

								$fudoimg_data1 = wp_get_attachment_image_src( $attachmentid, $fudo_top_thumbnail_type );
								$fudoimg_url   = isset( $fudoimg_data1[0] ) ? $fudoimg_data1[0] : '';

								//width height ver5.5.0
								$fudoimg_width  = isset( $fudoimg_data1[1] ) ? $fudoimg_data1[1] : $default_width;
								$fudoimg_height = isset( $fudoimg_data1[2] ) ? $fudoimg_data1[2] : $default_height;
								$fudoimg_width_height = apply_filters( 'fudoimg_width_height', 'width="' . $fudoimg_width . '" height="' . $fudoimg_height . '"' );


								//light-box v1.7.9 SSL
								$large_guid_url = wp_get_attachment_image_src( $attachmentid, 'large' );
								if( isset( $large_guid_url[0] ) && $large_guid_url[0] ){
									$guid_url = $large_guid_url[0];

									//width height ver5.5.0
									$guid_width  = isset( $large_guid_url[1] ) ? $large_guid_url[1] : $default_width;
									$guid_height = isset( $large_guid_url[2] ) ? $large_guid_url[2] : $default_height;
									$guidimg_width_height = apply_filters( 'guidimg_width_height', 'width="' . $guid_width . '" height="' . $guid_height . '"' );

								}else{
									$guid_url = get_the_guid( $attachmentid );
									if( is_ssl() ){
										$guid_url= str_replace( 'http://', 'https://', $guid_url );
									}
								}

								if( $fudoimg_url !='' ){
									echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . $fudoimg_url .'" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '" ' . $fudoimg_width_height . '>';
								}else{
									echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . $guid_url . '" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '" ' . $guidimg_width_height . '>';
								}
							}else{

								/*
								 * Add url fudoimg_data
								 *
								 * Version: 1.7.12
								 **/
								$fudoimg_data = apply_filters( 'fudoimg_data_add_url', $fudoimg_data, $post_id );

								if ( checkurl_fudou( $fudoimg_data )) {
									echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . $fudoimg_data . '" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '">';
								}else{
									echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . apply_filters( 'fudou_nowprinting_img', plugins_url() . '/fudou/img/nowprinting.png', $post_id ) . '" alt="' . $fudoimg_data . '" ' . $defaultimg_width_height . '>';
								}
							}
						}

					}else{
						echo '<img ' . $fudou_lazy_loading . ' class="box1image" src="' . apply_filters( 'fudou_nowprinting_img', plugins_url() . '/fudou/img/nowprinting.png', $post_id ) . '" alt="' . $fudoimg_alt . '" ' . $defaultimg_width_height . '>';
					}
					echo '</a>';
				}


				/*
				 * トップ物件表示 追加項目
				 * v1.7.12
				 * v6.1.3
				 * Add $instance
				 */
				do_action( 'fodou_top_bukken0', $post_id, $kaiin, $kaiin2, $instance );

				//ver5.9.0
				do_action( 'fodou_top_bukken_title_in', $post_id, 'top_bukken' );

				//タイトル
				if ( my_custom_kaiin_view('kaiin_title',$kaiin,$kaiin2) ){
					if($view1=="1" && $post_title !=''){
						echo '<span class="top_title">';
						echo str_replace("　"," ",$post_title).'';
						echo '</span><br>';
					}
				}


				//v6.1.3
				do_action( 'fodou_top_bukken1', $post_id, $kaiin, $kaiin2, $instance );


				//会員2
				if ( !my_custom_kaiin_view( 'kaiin_kakaku',$kaiin,$kaiin2 ) 
					&& !my_custom_kaiin_view( 'kaiin_madori', $kaiin, $kaiin2 )
					&& !my_custom_kaiin_view( 'kaiin_menseki', $kaiin, $kaiin2 )
					&& !my_custom_kaiin_view( 'kaiin_shozaichi', $kaiin, $kaiin2 )
					&& !my_custom_kaiin_view( 'kaiin_kotsu', $kaiin, $kaiin2) ){
					echo '<span class="top_kaiin">この物件は 会員様限定で公開している物件です</span>';
				}


				//v6.1.3
				do_action( 'fodou_top_bukken2', $post_id, $kaiin, $kaiin2, $instance );


				//価格 v1.7.12
				if ( my_custom_kaiin_view('kaiin_kakaku',$kaiin,$kaiin2) ){

					if($view2=="1"){

						//ver5.3.3
						do_action( 'fodou_top_bukken_view2a', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view2a_2', $post_id, $kaiin, $kaiin2, $instance );


						echo '<span class="top_price">';
						if( get_post_meta($post_id, 'seiyakubi', true) != "" ){
							echo 'ご成約済　';
						}else{
							//非公開の場合
							if(get_post_meta($post_id,'kakakukoukai',true) == "0"){
								$kakakujoutai_data = get_post_meta($post_id,'kakakujoutai',true);
								if($kakakujoutai_data=="1")	echo '相談';
								if($kakakujoutai_data=="2")	echo '確定';
								if($kakakujoutai_data=="3")	echo '入札';

								//価格状態 v1.9.0
								do_action( 'fudou_add_kakakujoutai', $kakakujoutai_data, $post_id );
								echo '　';
							}else{
								$kakaku_data = get_post_meta($post_id,'kakaku',true);
								if( is_numeric( $kakaku_data ) ){
									if ( function_exists( 'fudou_money_format_ja' ) ) {
										// Money Format 億万円 表示
										echo apply_filters( 'fudou_money_format_ja', $kakaku_data );
									}else{
										echo floatval($kakaku_data)/10000;
										echo "万円";
									}
								}
							}
						}
						echo '</span>';

						//ver5.3.3
						do_action( 'fodou_top_bukken_view2b', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view2b_2', $post_id, $kaiin, $kaiin2, $instance );
					}
				}


				//v6.1.3
				do_action( 'fodou_top_bukken3', $post_id, $kaiin, $kaiin2, $instance );


				//間取り・土地面積
				if($view3=="1"){

					//ver5.3.3
					do_action( 'fodou_top_bukken_view3a', $post_id, $kaiin, $kaiin2 );
					//ver6.1.3
					do_action( 'fodou_top_bukken_view3a_2', $post_id, $kaiin, $kaiin2, $instance );

					//間取り v5.9.0
					if ( my_custom_kaiin_view('kaiin_madori',$kaiin,$kaiin2) ){

						$madori = get_post_meta($post_id,'madorisu',true);
						$madorisyurui_data = get_post_meta($post_id,'madorisyurui',true);
						if($madorisyurui_data=="10")	$madori .= 'R ';
						if($madorisyurui_data=="20")	$madori .= 'K ';
						if($madorisyurui_data=="25")	$madori .= 'SK ';
						if($madorisyurui_data=="30")	$madori .= 'DK ';
						if($madorisyurui_data=="35")	$madori .= 'SDK ';
						if($madorisyurui_data=="40")	$madori .= 'LK ';
						if($madorisyurui_data=="45")	$madori .= 'SLK ';
						if($madorisyurui_data=="50")	$madori .= 'LDK ';
						if($madorisyurui_data=="55")	$madori .= 'SLDK ';

						if( $madori ){
							echo ' <span class="top_madori">' . $madori . '</span>';
						}
					}

					//ver5.3.3
					do_action( 'fodou_top_bukken_view3b', $post_id, $kaiin, $kaiin2 );
					//ver6.1.3
					do_action( 'fodou_top_bukken_view3b_2', $post_id, $kaiin, $kaiin2, $instance );

					//土地面積 v5.9.0
					if ( my_custom_kaiin_view('kaiin_menseki',$kaiin,$kaiin2) ){
						if ( get_post_meta($post_id,'bukkenshubetsu',true) < 1200 ) {
							if( get_post_meta($post_id, 'tochikukaku', true) !="" ) 
								echo ' <span class="top_menseki">'. get_post_meta( $post_id, 'tochikukaku', true ) . 'm&sup2;</span>';
						}
					}

					//ver5.3.3
					do_action( 'fodou_top_bukken_view3c', $post_id, $kaiin, $kaiin2 );
					//ver6.1.3
					do_action( 'fodou_top_bukken_view3c_2', $post_id, $kaiin, $kaiin2, $instance );
				}


				//v6.1.3
				do_action( 'fodou_top_bukken4', $post_id, $kaiin, $kaiin2, $instance );


				//所在地 v5.9.0
				if ( my_custom_kaiin_view('kaiin_shozaichi',$kaiin,$kaiin2) ){

					if($view4=="1"){

						//ver5.3.3
						do_action( 'fodou_top_bukken_view4a', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view4a_2', $post_id, $kaiin, $kaiin2, $instance );

						$shozaichi = '';
						$shozaichiken_data = get_post_meta($post_id,'shozaichicode',true);
						$shozaichiken_data = myLeft($shozaichiken_data,2);
						$shozaichicode_data = get_post_meta($post_id,'shozaichicode',true);
						$shozaichicode_data = myLeft($shozaichicode_data,5);
						$shozaichicode_data = myRight($shozaichicode_data,3);

						if($shozaichiken_data !="" && $shozaichicode_data !=""){
							$sql = "SELECT narrow_area_name FROM " . $wpdb->prefix . DB_SHIKU_TABLE . " WHERE middle_area_id=".$shozaichiken_data." and narrow_area_id =".$shozaichicode_data."";
						//	$sql = $wpdb->prepare($sql,'');
							$metas = $wpdb->get_row( $sql );
							if( !empty($metas) ) {
								$shozaichi .= $metas->narrow_area_name;
							}
						}
						$shozaichi .= get_post_meta($post_id, 'shozaichimeisho', true);

						if( $shozaichi ){
							echo '<br><span class="top_shozaichi">' . $shozaichi . '</span>';
						}

						//ver5.3.3
						do_action( 'fodou_top_bukken_view4b', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view4b_2', $post_id, $kaiin, $kaiin2, $instance );
					}
				}


				//v6.1.3
				do_action( 'fodou_top_bukken5', $post_id, $kaiin, $kaiin2, $instance );


				//交通路線 v5.9.0
				if ( my_custom_kaiin_view('kaiin_kotsu',$kaiin,$kaiin2) ){

					if($view5=="1"){

						//ver5.3.3
						do_action( 'fodou_top_bukken_view5a', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view5a_2', $post_id, $kaiin, $kaiin2, $instance );

						$koutsurosen = '';
						$koutsurosen_data = get_post_meta($post_id, 'koutsurosen1', true);
						$koutsueki_data = get_post_meta($post_id, 'koutsueki1', true);
						$shozaichiken_data = get_post_meta($post_id,'shozaichicode',true);
						$shozaichiken_data = myLeft($shozaichiken_data,2);

						if($koutsurosen_data !=""){
							$sql = "SELECT rosen_name FROM " . $wpdb->prefix . DB_ROSEN_TABLE . " WHERE rosen_id = ".$koutsurosen_data."";
						//	$sql = $wpdb->prepare($sql,'');
							$metas = $wpdb->get_row( $sql );
							if( !empty( $metas ) ){
								if( $metas->rosen_name == 'バス' ){
									$rosen_bus = true;
								}
								$koutsurosen .= $metas->rosen_name;
							}
						}

						//交通駅
						if( $koutsurosen_data && $koutsueki_data && !$rosen_bus ){
							$sql = "SELECT DTS.station_name";
							$sql .= " FROM " . $wpdb->prefix . DB_ROSEN_TABLE . " AS DTR";
							$sql .= " INNER JOIN " . $wpdb->prefix . DB_EKI_TABLE . " AS DTS ON DTR.rosen_id = DTS.rosen_id";
							$sql .= " WHERE DTS.station_id=".$koutsueki_data." AND DTS.rosen_id=".$koutsurosen_data."";
						//	$sql = $wpdb->prepare($sql,'');
							$metas = $wpdb->get_row( $sql );
							if( !empty($metas) ){
								if($metas->station_name != '＊＊＊＊'){
									$koutsurosen .= $metas->station_name.'駅';
								}
							}
						}

						if( $koutsurosen ){
							echo '<br><span class="top_kotsu">'. $koutsurosen . '</span>';
						}

						//ver5.3.3
						do_action( 'fodou_top_bukken_view5b', $post_id, $kaiin, $kaiin2 );
						//ver6.1.3
						do_action( 'fodou_top_bukken_view5b_2', $post_id, $kaiin, $kaiin2, $instance );

					}
				}


				//v6.1.3
				do_action( 'fodou_top_bukken6', $post_id, $kaiin, $kaiin2, $instance );


				//v6.1.3
				do_action( 'fodou_top_bukken7', $post_id, $kaiin, $kaiin2, $instance );


				/*
				echo '<br>更新日:';
				echo $post_modified_date;
				*/

				//add class v6.0.1
				echo '<div class="top_r_footer">';
				//会員ロゴ
				if( get_post_meta( $post_id, 'kaiin', true ) == 1 ) {
					$kaiin_logo = '<span class="fudo_kaiin_type_logo"><img ' . $fudou_lazy_loading . ' src="' . plugins_url() . '/fudou/img/kaiin_s.jpg" alt="会員物件" width="40" height="20"></span>';
					echo apply_filters( 'fudou_kaiin_logo_view', $kaiin_logo );
				}
				do_action( 'fudo_kaiin_type_logo', $post_id );	//会員ロゴ


				//v6.1.3
				do_action( 'fodou_top_bukken8', $post_id, $kaiin, $kaiin2, $instance );


				//物件詳細リンク
				echo '<span style="float:right;" class="box1low"><a href="' . $post_url . '" ' . $target_link . '>' . $button_text . '</a></span>';
				echo '</div>';


				//v6.1.3
				do_action( 'fodou_top_bukken9', $post_id, $kaiin, $kaiin2, $instance );

				echo '</li>';

			}	//loop

			echo '</ul>';
			echo '</div>';

			echo $args['after_widget'];

		}	//!empty( $metas )
	}
} // Class fudo_widget_top_r












/*
 * 売買路線カテゴリ
 * Version: 5.8.0
 */
class fudo_widget_b_r extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_b_r', '売買路線カテゴリ', $widget_ops );
		*/

		parent::__construct(
			'fudo_b_r', 			// Base ID
			'売買路線カテゴリ' ,		// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title'])  ? esc_attr($instance['title']) : '';
		$tenkai = isset($instance['tenkai']) ? esc_attr($instance['tenkai']) : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('tenkai'); ?>">
		階層展開 <select class="widefat" id="<?php echo $this->get_field_id('tenkai'); ?>" name="<?php echo $this->get_field_name('tenkai'); ?>">
			<option value="0"<?php if($tenkai == 0){echo ' selected="selected"';} ?>>展開する</option>
			<option value="1"<?php if($tenkai == 1){echo ' selected="selected"';} ?>>クリックで展開</option>
		</select></label></p>

		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		global $wpdb;

		$site = home_url( '/' ); 

		//種別
		$bukken_shubetsu = isset($_GET['shu']) 	? myIsNum_f($_GET['shu']) : '';

		// outputs the content of the widget
		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$tenkai = isset($instance['tenkai']) 	? esc_attr( $instance['tenkai'] ) : '';

		if($tenkai == '1'){
			echo '<style type="text/css">';
			echo '.children1r { display:none; }';
			echo '</style>';

			echo '<script type="text/javascript">';
			echo 'function tree1r(menu_class,menu_id) {';
			echo '		var ul=document.getElementById(menu_id);';
			echo '		if (ul.style.display == "block") ul.style.display="none";';
			echo '		else {';
			echo '			var sib=ul.parentNode.childNodes;';
			echo '			for (var i=0; i < sib.length; i++)';
			echo '				if (sib[i].className == menu_class) sib[i].style.display="none";';
			echo '				ul.style.display="block";';
			echo '		}';
			echo '	}';
			echo '</script>';
		}

		echo $args['before_widget'];

		$shu = isset($_GET['shu']) ? myIsNum_f($_GET['shu']) : '';
		$mid = isset($_GET['mid']) ? myIsNum_f($_GET['mid']) : '';
		$nor = isset($_GET['nor']) ? myIsNum_f($_GET['nor']) : '';

	//	$so  = isset($_GET['so']) ?  esc_attr( stripslashes($_GET['so']))  : apply_filters( 'bukken_sort', '' );
	//	$ord = isset($_GET['ord']) ? esc_attr( stripslashes($_GET['ord'])) : apply_filters( 'bukken_ord', '' );

		if ( $shu == "1" ){
			echo '<style type="text/css">';
			echo '.children1r_'.$mid.' { display:block; }';
			echo '</style>';
		}



		$sql  = " SELECT DISTINCT DTR.rosen_name,DTR.rosen_id,DTS.station_name, DTS.station_id ,DTS.station_ranking";
		$sql .= " FROM (((((($wpdb->posts AS P ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM ON P.ID = PM.post_id ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM_1 ON P.ID = PM_1.post_id ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM_2 ON P.ID = PM_2.post_id ) ";
		$sql .= " INNER JOIN " . $wpdb->prefix . DB_ROSEN_TABLE . " AS DTR ON CAST( PM_1.meta_value AS SIGNED ) = DTR.rosen_id) ";
		$sql .= " INNER JOIN " . $wpdb->prefix . DB_EKI_TABLE . " AS DTS ON DTS.rosen_id = DTR.rosen_id AND  CAST( PM.meta_value AS SIGNED ) = DTS.station_id)";

		//検索 SQL 表示制限 INNER JOIN
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_inner_join', '' );
		//New 検索 SQL 表示制限 INNER JOIN v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_inner_join_return', $sql, 'fudo_b_r' );

		$sql .= " WHERE";
		$sql .= "  ( P.post_status='publish' ";
		$sql .= " AND P.post_password = '' ";
		$sql .= " AND P.post_type ='fudo' ";
		$sql .= " AND PM.meta_key='koutsueki1' ";
		$sql .= " AND PM_1.meta_key='koutsurosen1' ";
		$sql .= " AND PM_2.meta_key='bukkenshubetsu' ";
		$sql .= " AND PM_2.meta_value < 3000 ";

		//検索 SQL 表示制限 WHERE
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql, 'fudo_b_r' );

		$sql .= " ) ";
		$sql .= " OR ";
		$sql .= " ( P.post_status='publish' ";
		$sql .= " AND P.post_password = '' ";
		$sql .= " AND P.post_type ='fudo' ";
		$sql .= " AND PM.meta_key='koutsueki2' ";
		$sql .= " AND PM_1.meta_key='koutsurosen2' ";
		$sql .= " AND PM_2.meta_key='bukkenshubetsu' ";
		$sql .= " AND PM_2.meta_value < 3000 ";

		//検索 SQL 表示制限 WHERE
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql, 'fudo_b_r' );

		$sql .= " ) ";

	//	$sql = $wpdb->prepare($sql,'');
		$metas = $wpdb->get_results( $sql, ARRAY_A );
		if(!empty($metas)) {

			if ( $title ){
				echo $args['before_title'] . $title . $args['after_title'];
			}else{
				echo $args['before_title'] . '売買路線カテゴリ' . $args['after_title'];
			}

			//ソート
			foreach($metas as $key => $row){
				$foo[$key] = $row["rosen_name"];
				$bar[$key] = $row["station_ranking"];
			}
			array_multisort($foo,SORT_DESC,$bar,SORT_ASC,$metas);


			/*
			 * navigation_widgets_format
			 * ver5.5.0
			 */
			$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
			// This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php
			$format = apply_filters( 'navigation_widgets_format', $format );
			if ( 'html5' === $format ) {
				// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
				$aria_label = $title ? $title : '売買路線カテゴリ';
				echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
			}


			$tmp_rosen_id= '';
			echo '<ul>';
			foreach ( $metas as $meta ) {

				$rosen_name =  $meta['rosen_name'];
				$rosen_id   =  $meta['rosen_id'];
				$station_name =  $meta['station_name'];
				$station_id   =  $meta['station_id'];

				if( $tmp_rosen_id != $rosen_id){
					if( $tmp_rosen_id != ''){
						echo '</ul>';
						echo '</li>';
					}

					//路線表示
					echo '<li class="cat-item cat-item'.$rosen_id.'">';
					if( $mid == $rosen_id && $bukken_shubetsu == 1 ) echo '<b>';
					if($tenkai == '1'){
						echo "<a href=\"javascript:tree1r('children1r_$rosen_id','children1r_$rosen_id');\">$rosen_name</a>";
					}else{
						echo '<a href="'.$site.'?bukken=rosen&amp;shu=1&amp;mid='.$rosen_id.'&amp;nor=&amp;paged=&amp;so=&amp;ord=">'.$rosen_name.'</a>';
					}

					if( $mid == $rosen_id && $bukken_shubetsu == 1 ) echo '</b>';
					echo '<ul class="children children1r children1r_'.$rosen_id.'" id="children1r_'.$rosen_id.'">';
				}


				//駅表示
					echo '<li class="cat-item current-cat">';
					if( $nor == $station_id && $bukken_shubetsu == 1 ) echo '<b>';
					echo  '<a href="'.$site.'?bukken=station&amp;shu=1&amp;mid='.$rosen_id.'&amp;nor='.$station_id.'&amp;paged=&amp;so=&amp;ord=">'.$station_name.'</a>';
					if( $nor == $station_id && $bukken_shubetsu == 1 ) echo '</b>';
					echo '</li>';

				$tmp_rosen_id   = $rosen_id;

			}
			echo '</ul>';
			echo '</li>';
			echo '</ul>';
			if ( 'html5' === $format ) {
				echo '</nav>';
			}

		}
		echo $args['after_widget'];

	}
} // Class fudo_widget_b_r







/*
 * 賃貸路線カテゴリ
 * Version: 5.8.0
 */
class fudo_widget_r_r extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_r_r', '賃貸路線カテゴリ', $widget_ops );
		*/

		parent::__construct(
			'fudo_r_r', 			// Base ID
			'賃貸路線カテゴリ' ,		// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title'])  ? esc_attr($instance['title']) : '';
		$tenkai = isset($instance['tenkai']) ? esc_attr($instance['tenkai']) : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('tenkai'); ?>">
		階層展開 <select class="widefat" id="<?php echo $this->get_field_id('tenkai'); ?>" name="<?php echo $this->get_field_name('tenkai'); ?>">
			<option value="0"<?php if($tenkai == 0){echo ' selected="selected"';} ?>>展開する</option>
			<option value="1"<?php if($tenkai == 1){echo ' selected="selected"';} ?>>クリックで展開</option>
		</select></label></p>

		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		global $wpdb;

		$site = home_url( '/' ); 

		//種別
		$bukken_shubetsu = isset($_GET['shu']) 	? myIsNum_f($_GET['shu']) : '';

		// outputs the content of the widget
		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$tenkai = isset($instance['tenkai']) 	? esc_attr( $instance['tenkai'] ) : '';

		if($tenkai == '1'){

			echo '<style type="text/css">';
			echo '.children2r { display:none; }';
			echo '</style>';

			echo '<script type="text/javascript">';
			echo '	function tree2r(menu_class,menu_id) {';
			echo '		var ul=document.getElementById(menu_id);';
			echo '		if (ul.style.display == "block") ul.style.display="none";';
			echo '		else {';
			echo '			var sib=ul.parentNode.childNodes;';
			echo '			for (var i=0; i < sib.length; i++)';
			echo '				if (sib[i].className == menu_class) sib[i].style.display="none";';
			echo '				ul.style.display="block";';
			echo '		}';
			echo '	}';
			echo '</script>';
		}

		echo $args['before_widget'];

		$shu = isset($_GET['shu']) ? myIsNum_f($_GET['shu']) : '';
		$mid = isset($_GET['mid']) ? myIsNum_f($_GET['mid']) : '';
		$nor = isset($_GET['nor']) ? myIsNum_f($_GET['nor']) : '';

		if ( $shu == "2" ){
			echo '<style type="text/css">';
			echo '.children2r_'.$mid.' { display:block; }';
			echo '</style>';
		}


		$sql  = " SELECT DISTINCT DTR.rosen_name,DTR.rosen_id,DTS.station_name, DTS.station_id ,DTS.station_ranking";
		$sql .= " FROM (((((($wpdb->posts AS P ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM ON P.ID = PM.post_id ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM_1 ON P.ID = PM_1.post_id ) ";
		$sql .= " INNER JOIN $wpdb->postmeta AS PM_2 ON P.ID = PM_2.post_id ) ";
		$sql .= " INNER JOIN " . $wpdb->prefix . DB_ROSEN_TABLE . " AS DTR ON CAST( PM_1.meta_value AS SIGNED ) = DTR.rosen_id) ";
		$sql .= " INNER JOIN " . $wpdb->prefix . DB_EKI_TABLE . " AS DTS ON DTS.rosen_id = DTR.rosen_id AND  CAST( PM.meta_value AS SIGNED ) = DTS.station_id)";

		//検索 SQL 表示制限 INNER JOIN
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_inner_join', '' );
		//New 検索 SQL 表示制限 INNER JOIN v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_inner_join_return', $sql, 'fudo_r_r' );

		$sql .= " WHERE";
		$sql .= "  ( P.post_status='publish' ";
		$sql .= " AND P.post_password = '' ";
		$sql .= " AND P.post_type ='fudo' ";
		$sql .= " AND PM.meta_key='koutsueki1' ";
		$sql .= " AND PM_1.meta_key='koutsurosen1' ";
		$sql .= " AND PM_2.meta_key='bukkenshubetsu' ";
		$sql .= " AND PM_2.meta_value > 3000 ";

		//検索 SQL 表示制限 WHERE
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql, 'fudo_r_r' );

		$sql .= " ) ";
		$sql .= " OR ";
		$sql .= " ( P.post_status='publish' ";
		$sql .= " AND P.post_password = '' ";
		$sql .= " AND P.post_type ='fudo' ";
		$sql .= " AND PM.meta_key='koutsueki2' ";
		$sql .= " AND PM_1.meta_key='koutsurosen2' ";
		$sql .= " AND PM_2.meta_key='bukkenshubetsu' ";
		$sql .= " AND PM_2.meta_value > 3000 ";

		//検索 SQL 表示制限 WHERE
		$sql .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql, 'fudo_r_r' );

		$sql .= " ) ";


	//	$sql = $wpdb->prepare($sql,'');
		$metas = $wpdb->get_results( $sql, ARRAY_A );
		if(!empty($metas)) {

			if ( $title ){
				echo $args['before_title'] . $title . $args['after_title'];
			}else{
				echo $args['before_title'] . '賃貸路線カテゴリ' . $args['after_title'];
			}

			//ソート
			foreach($metas as $key => $row){
				$foo[$key] = $row["rosen_name"];
				$bar[$key] = $row["station_ranking"];
			}
			array_multisort($foo,SORT_DESC,$bar,SORT_ASC,$metas);


			/*
			 * navigation_widgets_format
			 * ver5.5.0
			 */
			$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
			// This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php
			$format = apply_filters( 'navigation_widgets_format', $format );
			if ( 'html5' === $format ) {
				// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
				$aria_label = $title ? $title : '賃貸路線カテゴリ';
				echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
			}


			$tmp_rosen_id= '';
			echo '<ul>';
			foreach ( $metas as $meta ) {

				$rosen_name =  $meta['rosen_name'];
				$rosen_id   =  $meta['rosen_id'];
				$station_name =  $meta['station_name'];
				$station_id   =  $meta['station_id'];

				if( $tmp_rosen_id != $rosen_id){
					if( $tmp_rosen_id != ''){
						echo '</ul>';
						echo '</li>';
					}


					//路線表示
					echo '<li class="cat-item cat-item'.$rosen_id.'">';
					if( $mid == $rosen_id && $bukken_shubetsu == 2 ) echo '<b>';
					if($tenkai == '1'){
						echo "<a href=\"javascript:tree2r('children2r_$rosen_id','children2r_$rosen_id');\">$rosen_name</a>";
					}else{
						echo  '<a href="'.$site.'?bukken=rosen&amp;shu=2&amp;mid='.$rosen_id.'&amp;nor=&amp;paged=&amp;so=&amp;ord=">'.$rosen_name.'</a>';
					}
					if( $mid == $rosen_id && $bukken_shubetsu == 2 ) echo '</b>';
					echo '<ul class="children children2r children2r_'.$rosen_id.'" id="children2r_'.$rosen_id.'">';
				}


				//駅表示
					echo '<li class="cat-item current-cat">';
					if( $nor == $station_id && $bukken_shubetsu == 2 ) echo '<b>';
					echo  '<a href="'.$site.'?bukken=station&amp;shu=2&amp;mid='.$rosen_id.'&amp;nor='.$station_id.'&amp;paged=&amp;so=&amp;ord=">'.$station_name.'</a>';
					if( $nor == $station_id && $bukken_shubetsu == 2 ) echo '</b>';
					echo '</li>';

				$tmp_rosen_id   = $rosen_id;

			}
			echo '</ul>';
			echo '</li>';
			echo '</ul>';
			if ( 'html5' === $format ) {
				echo '</nav>';
			}

		}

		echo $args['after_widget'];

	}
} // Class fudo_widget_r_r







/*
 * 売買地域カテゴリ
 * Version: 5.8.0
 */
class fudo_widget_b_c extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_b_c', '売買地域カテゴリ', $widget_ops );
		*/

		parent::__construct(
			'fudo_b_c', 			// Base ID
			'売買地域カテゴリ' ,		// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title'])  ? esc_attr($instance['title']) : '';
		$tenkai = isset($instance['tenkai']) ? esc_attr($instance['tenkai']) : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('tenkai'); ?>">
		階層展開 <select class="widefat" id="<?php echo $this->get_field_id('tenkai'); ?>" name="<?php echo $this->get_field_name('tenkai'); ?>">
			<option value="0"<?php if($tenkai == 0){echo ' selected="selected"';} ?>>展開する</option>
			<option value="1"<?php if($tenkai == 1){echo ' selected="selected"';} ?>>クリックで展開</option>
		</select></label></p>
		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		global $wpdb;

		$site = home_url( '/' ); 

		//種別
		$bukken_shubetsu = isset($_GET['shu']) 	? myIsNum_f($_GET['shu']) : '';

		// outputs the content of the widget
		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$tenkai = isset($instance['tenkai']) 	? esc_attr( $instance['tenkai'] ) : '';

		if($tenkai == '1'){

			echo '<style type="text/css">';
			echo '.children1c { display:none; }';
			echo '</style>';

			echo '<script type="text/javascript"> ';
			echo '	function tree1c(menu_class,menu_id) {';
			echo '		var ul=document.getElementById(menu_id);';
			echo '		if (ul.style.display == "block") ul.style.display="none";';
			echo '		else {';
			echo '			var sib=ul.parentNode.childNodes;';
			echo '			for (var i=0; i < sib.length; i++)';
			echo '				if (sib[i].className == menu_class) sib[i].style.display="none";';
			echo '				ul.style.display="block";';
			echo '		}';
			echo '	}';
			echo '</script>';
		}

		echo $args['before_widget'];

		$shu = isset($_GET['shu']) ? myIsNum_f($_GET['shu']) : '';
		$mid = isset($_GET['mid']) ? myIsNum_f($_GET['mid']) : '';
		$nor = isset($_GET['nor']) ? myIsNum_f($_GET['nor']) : '';

		if ( $shu == "1" ){
			echo '<style type="text/css">';
			echo '.children1c_'.$mid.' { display:block; }';
			echo '</style>';
		}

		//県・市区
		$sql_sub  =  " SELECT DISTINCT CAST( LEFT(PM.meta_value,2) AS SIGNED ) AS ken_id, CAST( RIGHT(LEFT(PM.meta_value,5),3) AS SIGNED ) AS shiku_id";
		$sql_sub .=  " FROM (($wpdb->posts AS P ";
		$sql_sub .=  " INNER JOIN $wpdb->postmeta AS PM   ON P.ID = PM.post_id) ";
		$sql_sub .=  " INNER JOIN $wpdb->postmeta AS PM_1 ON P.ID = PM_1.post_id)";

		//検索 SQL 表示制限 INNER JOIN
		$sql_sub .=  apply_filters( 'inc_archive_kensaku_sql_inner_join', '' );
		//New 検索 SQL 表示制限 INNER JOIN v5.6.1
		$sql_sub   =  apply_filters( 'inc_archive_kensaku_sql_inner_join_return', $sql_sub , 'fudo_b_c' );

		$sql_sub .=  " WHERE P.post_status='publish' AND P.post_password = '' AND P.post_type ='fudo'";
		$sql_sub .=  " AND PM.meta_key='shozaichicode' AND PM_1.meta_key='bukkenshubetsu' AND PM_1.meta_value < 3000";

		//検索 SQL 表示制限 WHERE
		$sql_sub .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql_sub  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql_sub, 'fudo_b_c' );

	//	$sql_sub = $wpdb->prepare($sql_sub,'');
		$ken_shiku_array = $wpdb->get_results( $sql_sub, ARRAY_A );

		//ソート
		if(!empty($ken_shiku_array)) {
			foreach($ken_shiku_array as $key => $row){
				$foo[$key] = $row["ken_id"];
				$bar[$key] = $row["shiku_id"];
			}
			array_multisort($foo,SORT_ASC,$bar,SORT_ASC,$ken_shiku_array);
		}


		//県
		$ken_array = array();
		foreach ( $ken_shiku_array as $ken_shiku_arr ) {
			$k_id   =  $ken_shiku_arr['ken_id'];
			$ken_ok = true;
			$i=0;
			foreach ( $ken_array as $ken_arr ) {
				if( $ken_array[$i]['ken_id'] == $k_id )	$ken_ok = false;
				$i++;
			}
			if($ken_ok)
				array_push($ken_array, array('ken_id' => $k_id));
		}

		if(!empty($ken_array)) {

			//ソート
			sort($ken_array);

			if ( $title ){
				echo $args['before_title'] . $title . $args['after_title'];
			}else{
				echo $args['before_title'] . '売買地域カテゴリ' . $args['after_title'];
			}


			/*
			 * navigation_widgets_format
			 * ver5.5.0
			 */
			$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
			// This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php
			$format = apply_filters( 'navigation_widgets_format', $format );
			if ( 'html5' === $format ) {
				// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
				$aria_label = $title ? $title : '売買地域カテゴリ';
				echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
			}


			echo '<ul>';
			foreach ( $ken_array as $ken_arr ) {

				$middle_area_id   =  sprintf("%02d", $ken_arr['ken_id'] );
				$middle_area_name = fudo_ken_name($middle_area_id);

				//県表示
				if($middle_area_id != '00'){
					echo '<li class="cat-item current-cat">';
					if( $mid == $middle_area_id && $bukken_shubetsu == 1 ) echo '<b>';
					if($tenkai == '1'){
						echo "<a href=\"javascript:tree1c('children1c_$middle_area_id','children1c_$middle_area_id');\">$middle_area_name</a>";
					}else{
						echo '<a href="'.$site.'?bukken=ken&amp;shu=1&amp;mid='.$middle_area_id.'&amp;nor=&amp;paged=&amp;so=&amp;ord=">'.$middle_area_name.'</a>';
					}
					if( $mid == $middle_area_id && $bukken_shubetsu == 1 ) echo '</b>';


					//市区表示
					if(!empty($ken_shiku_array)) {
						$tmp_code = '0';
						foreach ( $ken_shiku_array as $ken_shiku_arr ) {
							if($middle_area_id == $ken_shiku_arr['ken_id']){
								$tmp_code .= ',' .  $ken_shiku_arr['shiku_id'];
							}
						}
					}

					$sql2  =   " SELECT DISTINCT NA.narrow_area_name, NA.narrow_area_id";
					$sql2 .=   " FROM " . $wpdb->prefix . DB_SHIKU_TABLE . " AS NA ";
					$sql2 .=   " WHERE NA.middle_area_id = $middle_area_id ";
					$sql2 .=   " AND NA.narrow_area_id IN ($tmp_code) ";
					$sql2 .=   " ORDER BY NA.narrow_area_id";
				//	$sql2 = $wpdb->prepare($sql2,'');
					$metas2 = $wpdb->get_results( $sql2, ARRAY_A );
					if(!empty($metas2)) {
						echo '<ul class="children children1c children1c_'.$middle_area_id.'" id="children1c_'.$middle_area_id.'">';
						foreach ( $metas2 as $meta2 ) {
							$narrow_area_name =  $meta2['narrow_area_name'];
							$narrow_area_id =    $meta2['narrow_area_id'];

							echo '<li class="cat-item">';
							if( $mid == $middle_area_id && $nor == $narrow_area_id && $bukken_shubetsu == 1 ) echo '<b>';
							echo '<a href="'.$site.'?bukken=shiku&amp;shu=1&amp;mid='.$middle_area_id.'&amp;nor='.$narrow_area_id.'&amp;paged=&amp;so=&amp;ord=">'.$narrow_area_name.'</a>';
							if( $mid == $middle_area_id && $nor == $narrow_area_id && $bukken_shubetsu == 1 ) echo '</b>';
							echo '</li>';
						}
						echo '</ul>';
					}
					echo '</li>';
				}
			}
			echo '</ul>';

			if ( 'html5' === $format ) {
				echo '</nav>';
			}

		}

		echo $args['after_widget'];
	}
} // Class fudo_widget_b_c







/*
 * 賃貸地域カテゴリ
 * Version: 5.8.0
 */
class fudo_widget_r_c extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_r_c', '賃貸地域カテゴリ', $widget_ops );
		*/

		parent::__construct(
			'fudo_r_c', 			// Base ID
			'賃貸地域カテゴリ' ,		// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title'])  ? esc_attr($instance['title']) : '';
		$tenkai = isset($instance['tenkai']) ? esc_attr($instance['tenkai']) : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id('tenkai'); ?>">
		階層展開 <select class="widefat" id="<?php echo $this->get_field_id('tenkai'); ?>" name="<?php echo $this->get_field_name('tenkai'); ?>">
			<option value="0"<?php if($tenkai == 0){echo ' selected="selected"';} ?>>展開する</option>
			<option value="1"<?php if($tenkai == 1){echo ' selected="selected"';} ?>>クリックで展開</option>
		</select></label></p>

		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		global $wpdb;

		$site = home_url( '/' ); 

		//種別
		$bukken_shubetsu = isset($_GET['shu']) 	? myIsNum_f($_GET['shu']) : '';

		// outputs the content of the widget
		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$tenkai = isset($instance['tenkai']) 	? esc_attr( $instance['tenkai'] ) : '';

		if($tenkai == '1'){

			echo '<style type="text/css">';
			echo '.children2c { display:none; }';
			echo '</style>';

			echo '<script type="text/javascript"> ';
			echo '	function tree2c(menu_class,menu_id) {';
			echo '		var ul=document.getElementById(menu_id);';
			echo '		if (ul.style.display == "block") ul.style.display="none";';
			echo '		else {';
			echo '			var sib=ul.parentNode.childNodes;';
			echo '			for (var i=0; i < sib.length; i++)';
			echo '				if (sib[i].className == menu_class) sib[i].style.display="none";';
			echo '				ul.style.display="block";';
			echo '		}';
			echo '	}';
			echo '</script>';
		}

		echo $args['before_widget'];

		$shu = isset($_GET['shu']) ? myIsNum_f($_GET['shu']) : '';
		$mid = isset($_GET['mid']) ? myIsNum_f($_GET['mid']) : '';
		$nor = isset($_GET['nor']) ? myIsNum_f($_GET['nor']) : '';

		if ( $shu == "2" ){
			echo '<style type="text/css">';
			echo '.children2c_'.$mid.' { display:block; }';
			echo '</style>';
		}

		//県・市区
		$sql_sub  =  " SELECT DISTINCT CAST( LEFT(PM.meta_value,2) AS SIGNED ) AS ken_id, CAST( RIGHT(LEFT(PM.meta_value,5),3) AS SIGNED ) AS shiku_id";
		$sql_sub .=  " FROM (($wpdb->posts AS P ";
		$sql_sub .=  " INNER JOIN $wpdb->postmeta AS PM   ON P.ID = PM.post_id) ";
		$sql_sub .=  " INNER JOIN $wpdb->postmeta AS PM_1 ON P.ID = PM_1.post_id)";

		//検索 SQL 表示制限 INNER JOIN
		$sql_sub .=  apply_filters( 'inc_archive_kensaku_sql_inner_join', '' );
		//New 検索 SQL 表示制限 INNER JOIN v5.6.1
		$sql_sub   =  apply_filters( 'inc_archive_kensaku_sql_inner_join_return', $sql_sub , 'fudo_r_c' );

		$sql_sub .=  " WHERE PM.meta_key='shozaichicode' AND P.post_status='publish' AND P.post_password = '' AND P.post_type ='fudo' AND PM_1.meta_key='bukkenshubetsu'";
		$sql_sub .=  " AND PM_1.meta_value > 3000";

		//検索 SQL 表示制限 WHERE
		$sql_sub .=  apply_filters( 'inc_archive_kensaku_sql_where', '' );
		//New 検索 SQL 表示制限 WHERE v5.6.1
		$sql_sub  =  apply_filters( 'inc_archive_kensaku_sql_where_return', $sql_sub, 'fudo_r_c' );

	//	$sql_sub = $wpdb->prepare($sql_sub,'');
		$ken_shiku_array = $wpdb->get_results( $sql_sub, ARRAY_A );

		//ソート
		if(!empty($ken_shiku_array)) {
			foreach($ken_shiku_array as $key => $row){
				$foo[$key] = $row["ken_id"];
				$bar[$key] = $row["shiku_id"];
			}
			array_multisort($foo,SORT_ASC,$bar,SORT_ASC,$ken_shiku_array);
		}

		//県
		$ken_array = array();
		foreach ( $ken_shiku_array as $ken_shiku_arr ) {
			$k_id   =  $ken_shiku_arr['ken_id'];
			$ken_ok = true;
			$i=0;
			foreach ( $ken_array as $ken_arr ) {
				if( $ken_array[$i]['ken_id'] == $k_id )	$ken_ok = false;
				$i++;
			}
			if($ken_ok)
				array_push($ken_array, array('ken_id' => $k_id));
		}

		if(!empty($ken_array)) {

			//ソート
			sort($ken_array);

			if ( $title ){
				echo $args['before_title'] . $title . $args['after_title'];
			}else{
				echo $args['before_title'] . '賃貸地域カテゴリ' . $args['after_title'];
			}


			/*
			 * navigation_widgets_format
			 * ver5.5.0
			 */
			$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
			// This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php
			$format = apply_filters( 'navigation_widgets_format', $format );
			if ( 'html5' === $format ) {
				// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
				$aria_label = $title ? $title : '賃貸地域カテゴリ';
				echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
			}


			echo '<ul>';
			foreach ( $ken_array as $ken_arr ) {

				$middle_area_id   =  sprintf("%02d", $ken_arr['ken_id'] );
				$middle_area_name = fudo_ken_name($middle_area_id);


				//県表示
				if($middle_area_id != '00'){
					echo '<li class="cat-item current-cat">';
					if( $mid == $middle_area_id && $bukken_shubetsu == 2 ) echo '<b>';
					if($tenkai == '1'){
						echo "<a href=\"javascript:tree2c('children2c_$middle_area_id','children2c_$middle_area_id');\">$middle_area_name</a>";
					}else{
						echo '<a href="'.$site.'?bukken=ken&amp;shu=2&amp;mid='.$middle_area_id.'&amp;nor=&amp;paged=&amp;so=&amp;ord=">'.$middle_area_name.'</a>';
					}
					if( $mid == $middle_area_id && $bukken_shubetsu == 2 ) echo '</b>';


					//市区表示
					if(!empty($ken_shiku_array)) {
						$tmp_code = '0';
						foreach ( $ken_shiku_array as $ken_shiku_arr ) {
							if($middle_area_id == $ken_shiku_arr['ken_id']){
								$tmp_code .= ',' .  $ken_shiku_arr['shiku_id'];
							}
						}
					}

					$sql2 =   "SELECT DISTINCT NA.narrow_area_name, NA.narrow_area_id";
					$sql2 .=   " FROM " . $wpdb->prefix . DB_SHIKU_TABLE . " AS NA ";
					$sql2 .=   " WHERE NA.middle_area_id = $middle_area_id ";
					$sql2 .=   " AND NA.narrow_area_id IN ($tmp_code) ";
					$sql2 .=   " ORDER BY NA.narrow_area_id";
				//	$sql2 = $wpdb->prepare($sql2,'');
					$metas2 = $wpdb->get_results( $sql2, ARRAY_A );
					if(!empty($metas2)) {
						echo '<ul class="children children2c children2c_'.$middle_area_id.'" id="children2c_'.$middle_area_id.'">';
						foreach ( $metas2 as $meta2 ) {
							$narrow_area_name =  $meta2['narrow_area_name'];
							$narrow_area_id =    $meta2['narrow_area_id'];

							echo '<li class="cat-item">';
							if( $mid == $middle_area_id && $nor == $narrow_area_id && $bukken_shubetsu == 2 ) echo '<b>';
							echo '<a href="'.$site.'?bukken=shiku&amp;shu=2&amp;mid='.$middle_area_id.'&amp;nor='.$narrow_area_id.'&amp;paged=&amp;so=&amp;ord=">'.$narrow_area_name.'</a>';
							if( $mid == $middle_area_id && $nor == $narrow_area_id && $bukken_shubetsu == 2 ) echo '</b>';
							echo '</li>';
						}
						echo '</ul>';
					}
					echo '</li>';
				}
			}
			echo '</ul>';

			if ( 'html5' === $format ) {
				echo '</nav>';
			}

		}

		echo $args['after_widget'];
	}
} // Class fudo_widget_r_c






/*
 * 物件カテゴリ
 * Version: 6.1.0
 */
class fudo_widget_cat extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_cat', '物件カテゴリ', $widget_ops );
		*/

		parent::__construct(
			'fudo_cat', 			// Base ID
			'物件カテゴリ' ,		// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title']) 	? esc_attr($instance['title']) : '';
		$exclude =isset($instance['exclude']) 	? esc_attr($instance['exclude']) : '';
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>


		<p><label for="exclude">除外カテゴリ(カテゴリID カンマ区切り)
		<input class="widefat" id="<?php echo $this->get_field_name('exclude'); ?>" name="<?php echo $this->get_field_name('exclude'); ?>" type="text" value="<?php echo $exclude; ?>" /></label></p>

		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {

		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$exclude =isset($instance['exclude']) 	? esc_attr( $instance['exclude'] ) : '';

		echo $args['before_widget'];

		if($title){
			echo $args['before_title'] . $title . $args['after_title'];
		}else{
			echo $args['before_title'] . '物件カテゴリ' . $args['after_title'];
		}

                
		/*
		 * navigation_widgets_format
		 * ver5.5.0
		 */
		$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
		// This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php
		$format = apply_filters( 'navigation_widgets_format', $format );
		if ( 'html5' === $format ) {
			// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
			$aria_label = $title ? $title : '物件カテゴリ';
			echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
		}


		echo '<ul>';

		$cat_args = array(
			'show_option_all'    => '',
			'orderby'            => 'slug',
			'order'              => 'ASC',
			'show_last_update'   => 0,		//（各カテゴリーに属する）投稿の最終更新日を表示するか。初期値は非表示(FALSE)。 
			'style'              => 'list',
			'show_count'         => 0,		//各カテゴリーに投稿数を表示するか。初期値は false（非表示）。有効値
			'hide_empty'         => 1,		//投稿のないカテゴリーを非表示にするか。有効値： 
			'use_desc_for_title' => 1,		//カテゴリーの概要をリンク（アンカータグ）の title 属性に挿入（<a title="<em>カテゴリー概要</em>"
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => $exclude,	//指定したカテゴリー（複数可）をリストから除外。除外するカテゴリーID をカンマ区切りで昇順に指定。用例を参照
			'exclude_tree'       => '',		//結果から除外するカテゴリーツリー。バージョン 2.7.1 以降のみ。 
			'include'            => '',		//指定したカテゴリーID のみリストに表示。カンマ区切りで昇順に指定。用例を参照。 
			'hierarchical'       => true,
			'title_li'           => __( '' ),
			'number'             => NULL,		//表示するカテゴリー数を設定。SQL の LIMIT 値となります。初期値は無制限
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,		//子カテゴリーの項目を含めてリンクまたは投稿数を計算する。show_counts または hierarchical が true の場合、自動的に true に設定される
			'taxonomy'           => 'bukken',
			'walker'             => 'Walker_Category'
		 );

		wp_list_categories( $cat_args );

		echo '	</ul>';

		if ( 'html5' === $format ) {
			echo '</nav>';
		}

		echo $args['after_widget'];
	}
} // Class fudo_widget







/*
 * 物件投稿タグ(タグクラウド)
 * Version: 5.8.0
 */
class fudo_widget_tag extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_tag', '物件投稿タグ(タグクラウド)', $widget_ops );
		*/

		parent::__construct(
			'fudo_tag', 			// Base ID
			'物件投稿タグ(タグクラウド)' ,	// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title']) 	? esc_attr($instance['title']) : '';
		$exclude =isset($instance['exclude']) 	? esc_attr($instance['exclude']) : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

		<p><label for="exclude">除外タグ(タグID カンマ区切り)
		<input class="widefat" id="<?php echo $this->get_field_name('exclude'); ?>" name="<?php echo $this->get_field_name('exclude'); ?>" type="text" value="<?php echo $exclude; ?>" /></label></p>
		<?php 

	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {

		$title  = isset($instance['title']) 	? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';
		$exclude =isset($instance['exclude']) 	? esc_attr( apply_filters('widget_title', $instance['exclude']) ) : '';

		echo $args['before_widget'];

		if ( $title ){
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$tax_args = array(
			'smallest' => 8, 		//一番小さいタグ
			'largest' => 22,		//一番大きいタグ
			'unit' => 'pt', 		//フォントサイズの単位
			'number' => 45,  		//最大タグ数
			'format' => 'flat',		//ホワイトスペース区切り
			'orderby' => 'name', 		//タグ名順に表示 
			'order' => 'ASC',		//ソート
			'exclude' => $exclude, 		//表示しないタグIDを指定
			'include' => '', 		//表示するタグIDを指定
			'link' => 'view', 	
			'taxonomy' => 'bukken_tag', 
			'echo' => true
		);

		echo '<div class="tagcloud">';
		wp_tag_cloud( $tax_args );
		echo '</div>';

		echo $args['after_widget'];
	}
} // Class fudo_widget_tad










/*
 * 物件検索(キーワード)
 * Version: 5.8.0
 */
class fudo_widget_search extends WP_Widget {

	/**
	 * Register widget with WordPress 4.3.
	 */
	function __construct() {

		/*
		$widget_ops = array(
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'fudo_search', '物件検索(キーワード)', $widget_ops );
		*/

		parent::__construct(
			'fudo_search', 			// Base ID
			'物件検索(キーワード)' ,	// Name
			array( 'description' => '', )	// Args
		);
	}

	/** @see WP_Widget::form */	
	function form($instance) {
		$title  = isset($instance['title']) ? esc_attr($instance['title']) : '';
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<?php 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {

		// outputs the content of the widget
		extract( $args );

		$title  = isset($instance['title']) ? esc_attr( apply_filters('widget_title', $instance['title']) ) : '';

		echo $before_widget;

		if ( $title ){
			echo $before_title . $title . $after_title;
		}

		//HTML5
		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<label>
				<span class="screen-reader-text">物件検索(キーワード)</span>
			</label>
			<input type="search" class="search-field" placeholder="物件キーワード" title="物件キーワード" value="' . get_search_query() . '" name="s" />
			<input type="hidden" value="search" name="bukken" />
			<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
		</form>';

		echo $form;
		echo $after_widget;

	}
} // Class fudo_widget_tad

