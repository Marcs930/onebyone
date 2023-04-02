<?php
/**
 * The Template for displaying fudou home.
 *
 * Template: home2022.php
 * 
 * @package WordPress
 * @subpackage Twenty Twenty Two
 *
 * Fudou TopPage ver6.1.1
 */



	/**
	 * Template header data feom canvas file.
	 * front-page.html
	 */

	//FSEヘッダー Twenty Twenty-Two ver1.0.0 header-small-dark.html
	$header_content = '<!-- wp:template-part {"slug":"header-small-dark","tagName":"header"} /-->';
	/**
	 * header_content Filter
	 * ver5.9.0
	 */
	$header_content = apply_filters( 'fudou_fse_header_content', $header_content, 'home' );
	$header_content = str_replace( '} /-->', ',"theme":"' . get_template() . '"} /-->', $header_content);


	//FSEフッター Twenty Twenty-Two ver1.0.0 footer.html
	$footer_content = '<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->';
	/**
	 * footer_content Filter
	 * ver5.9.0
	 */
	$footer_content = apply_filters( 'fudou_fse_footer_content', $footer_content, 'home' );
	$footer_content = str_replace( '} /-->', ',"theme":"' . get_template() . '"} /-->', $footer_content);




/*
 * home_fudo_page_content Pre
 * v6.1.1
 */

ob_start();

echo $header_content;
?>
<!-- wp:html -->

<main class="wp-container wp-block-group alignwide">

	<div id="top_fbox">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('top_widgets') ) : ?>
		<?php endif; ?>
	</div><!-- #top_fbox -->

</main>

<!-- /wp:html -->

<?php 
	echo $footer_content;

	$buffer = ob_get_contents();
	ob_end_clean();

	$home_fudo_page_content = fudou_gutenberg_get_the_template_html( $buffer );

//end  home_fudo_page_content Pre





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
	 * home_fudo_page_content Pre
	 * v6.1.1
	 */
	echo $home_fudo_page_content;
?>
<?php wp_footer(); ?>

</div><!-- .wp-site-blocks -->
<!-- Template v6.1.1 -->
</body>
</html>
