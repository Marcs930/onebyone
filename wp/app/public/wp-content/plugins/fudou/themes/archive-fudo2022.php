<?php
/**
 * The Template for displaying fudou archive posts.
 *
 * Template: archive-fudo2022.php
 * 
 * @package WordPress6.1
 * @subpackage Fudousan Plugin
 * @subpackage Twenty Twenty-Two
 * Version: 6.1.1
 */


	/**** 検索 SQL ****/
	require_once WP_PLUGIN_DIR . '/fudou/inc/inc-archive-fudo.php';

	/**** ヘッダー(前処理) ****/
	require_once WP_PLUGIN_DIR . '/fudou/inc/inc-archive-fudo-header.php';

	//物件無し v6.1.0
	$class_name_dat = '';
	if( empty( $metas_co ) ){
		$class_name_dat = ' no-bukken-item';
	}

	/**
	 * Template header data feom canvas file.
	 */

	//FSEヘッダー Twenty Twenty-Two ver1.0.0 header.html
	$header_content = '<!-- wp:template-part {"slug":"header","tagName":"header"} /-->';
	/**
	 * header_content Filter
	 * ver5.9.0
	 */
	$header_content = apply_filters( 'fudou_fse_header_content', $header_content, 'archive' );
	$header_content = str_replace( '} /-->', ',"theme":"' . get_template() . '"} /-->', $header_content);


	//FSEフッター Twenty Twenty-Two ver1.0.0 footer.html
	$footer_content = '<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->';
	/**
	 * footer_content Filter
	 * ver5.9.0
	 */
	$footer_content = apply_filters( 'fudou_fse_footer_content', $footer_content, 'archive' );
	$footer_content = str_replace( '} /-->', ',"theme":"' . get_template() . '"} /-->', $footer_content);


	$archive_fudo_loop_template = WP_PLUGIN_DIR . '/fudou/themes/archive-fudo-loop.php';




/*
 * archive_fudo_page_content Pre
 * v6.1.1
 */

ob_start();

echo $header_content;
?>
<!-- wp:html -->

<main class="wp-container wp-block-group alignwide<?php echo esc_html( $class_name_dat ); ?>">

	<div class="wp-container wp-block-group">

		<?php if( $joken_url !='' ) { ?>
			<h2 class="wp-block-post-title"><a href="<?php echo $joken_url;?>"><?php echo esc_html( esc_html( $org_title ) ); ?></a></h2>
		<?php  }else{  ?>
			<h2 class="wp-block-post-title"><?php echo esc_html( esc_html( $org_title ) ); ?></h2>
		<?php  } ?>

		<hr class="wp-block-separator is-style-wide"/>
	</div>

	<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>



			<?php do_action( 'archive-fudo1' ); ?>

			<?php echo $page_navigation; ?>

			<div id="list_simplepage">
			<?php
				//loop SQL
				if($sql !=''){
					//$sql2 = $wpdb->prepare($sql2,'');
					$metas = $wpdb->get_results( $sql2, ARRAY_A );
					if(!empty($metas)) {

						foreach ( $metas as $meta ) {
							$meta_id = $meta['object_id'];	//post_id
							$meta_data = get_post( $meta_id ); 
							$meta_title =  $meta_data->post_title;

							/*
							 * 物件一覧・物件表示テンプレート
							 *
							 * @param str      template name and uri.
							 * @param int      $post_id.
							 * @since Fudousan Plugin 5.1.0
							*/
							$archive_fudo_loop_template = apply_filters( 'archive_fudo_loop_template', $archive_fudo_loop_template, $meta_id );

							echo '<article class="hentry">';
							require $archive_fudo_loop_template;
							echo '</article>';

						}
					}else{

						echo '<article class="hentry">';
						echo '<div class="list_simple_boxtitle">';
						echo "物件がありませんでした。<br />";
						echo '</div>';
						echo '</article>';

					}
				}else{
						echo '<article class="hentry">';
						echo '<div class="list_simple_boxtitle">';
						echo "条件があいませんでした。<br />";
						echo '</div>';
						echo '</article>';
				}
				//loop SQL END
			?>
			</div><!-- .list_simplepage -->


			<?php echo $page_navigation; ?>

			<?php do_action( 'archive-fudo2' ); ?>

			<br /><p align="right" class="pageback"><a href="#" onClick="history.back(); return false;">前のページにもどる</a></p>

</main>

<!-- /wp:html -->

<?php 
	echo $footer_content;

	$buffer = ob_get_contents();
	ob_end_clean();

	$archive_fudo_page_content = fudou_gutenberg_get_the_template_html( $buffer );


//end  archive_fudo_page_content Pre





?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wp-site-blocks">

<?php
	/*
	 * archive_fudo_page_content
	 * v6.1.1
	 */
	echo $archive_fudo_page_content;
?>
<?php wp_footer(); ?>
</div><!-- .wp-site-blocks -->
<!-- Template v6.1.1 -->
</body>
</html>
