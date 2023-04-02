<?php
/**
 * The Fse helper for Fudousan Plugin templates
 *
 * @package WordPress6.1
 * @subpackage Fudousan Plugin
 * Version: 6.1.1
 */


/**
 * Fix Returns the markup for the current template.
 * Base function : get_the_block_template_html()
 * block-template.php
 * ver6.0.0
 */
function fudou_gutenberg_get_the_template_html( $_wp_current_template_content ){

	global $wp_embed;

	$content = $wp_embed->run_shortcode( $_wp_current_template_content );
	$content = $wp_embed->autoembed( $content );
	$content = do_blocks( $content );
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = shortcode_unautop( $content );
	$content = wp_filter_content_tags( $content );
	//$content = do_shortcode( $content );
	$content = apply_shortcodes( $content );
	$content = str_replace( ']]>', ']]&gt;', $content );

	return $content;
}


/*
 * キャンセル -> 投稿や固定ページ内で使われているブロックのスタイルのみを読み込む
 * 代わりに /wp-includes/css/dist/block-library/style.min.css を読み込む
 * ver 6.1.0
 */
function fudou_should_load_separate_core_block_assets_fix() {

	if ( function_exists('wp_get_theme') ) {
		$theme_ob = wp_get_theme();
		$template_name = $theme_ob->template;
	}else{
		$template_name = get_option('template');
	}

	if( $template_name == 'twentytwentytwo' || $template_name == 'twentytwentythree' ){
		add_filter( 'should_load_separate_core_block_assets','__return_false' );
	}
}
add_action( 'wp_default_styles', 'fudou_should_load_separate_core_block_assets_fix', 9 );





/**
 * v6.1.1 廃止
 * 不動産マッププラグイン(～v6.1.0)で利用
 *
 * ブロック用レイアウトCSS Fix v6.0.0
 * Fix For unpc_bt Renders the layout config to the block wrapper.
 *
 * @since 5.8.0
 * wp-includes/block-supports/layout.php
 *
 * use
 * remove_filter( 'render_block', 'wp_render_layout_support_flag' );
 * add_filter( 'render_block', 'fudou_wp_render_layout_support_flag', 10, 2 );
 *
 * @param string $block_content Rendered block content.
 * @param array  $block         Block object.
 * @return string Filtered block content.
 */
function fudou_wp_render_layout_support_flag( $block_content, $block ) {

	// ver6.0.0 未満
	if ( !function_exists( 'wp_should_skip_block_supports_serialization' ) ) {
		return $block_content;
	}


	$block_type     = WP_Block_Type_Registry::get_instance()->get_registered( $block['blockName'] );
	$support_layout = block_has_support( $block_type, array( '__experimentalLayout' ), false );

	if ( ! $support_layout ) {
		return $block_content;
	}

	$block_gap             = wp_get_global_settings( array( 'spacing', 'blockGap' ) );
	$default_layout        = wp_get_global_settings( array( 'layout' ) );
	$has_block_gap_support = isset( $block_gap ) ? null !== $block_gap : false;
	$default_block_layout  = _wp_array_get( $block_type->supports, array( '__experimentalLayout', 'default' ), array() );
	$used_layout           = isset( $block['attrs']['layout'] ) ? $block['attrs']['layout'] : $default_block_layout;
	if ( isset( $used_layout['inherit'] ) && $used_layout['inherit'] ) {
		if ( ! $default_layout ) {
			return $block_content;
		}
		$used_layout = $default_layout;
	}

	$class_name = wp_unique_id( 'wp-container-' );
	$gap_value  = _wp_array_get( $block, array( 'attrs', 'style', 'spacing', 'blockGap' ) );
	// Skip if gap value contains unsupported characters.
	// Regex for CSS value borrowed from `safecss_filter_attr`, and used here
	// because we only want to match against the value, not the CSS attribute.
	if ( is_array( $gap_value ) ) {
		foreach ( $gap_value as $key => $value ) {
			$gap_value[ $key ] = $value && preg_match( '%[\\\(&=}]|/\*%', $value ) ? null : $value;
		}
	} else {
		$gap_value = $gap_value && preg_match( '%[\\\(&=}]|/\*%', $gap_value ) ? null : $gap_value;
	}

	// If a block's block.json skips serialization for spacing or spacing.blockGap,
	// don't apply the user-defined value to the styles.
	$should_skip_gap_serialization = wp_should_skip_block_supports_serialization( $block_type, 'spacing', 'blockGap' );
	$style                         = wp_get_layout_style( ".$class_name", $used_layout, $has_block_gap_support, $gap_value, $should_skip_gap_serialization );

	// This assumes the hook only applies to blocks with a single wrapper.
	// I think this is a reasonable limitation for that particular hook.
	$content = preg_replace(
		'/' . preg_quote( 'class="', '/' ) . '/',
		'class="' . esc_attr( $class_name ) . ' ',
		$block_content,
		1
	);

	//wp_enqueue_block_support_styles( $style );
	//body after
	if( $style ){
		echo "<style>$style</style>\n";
	}

	return $content;
}





/**
 * v6.1.1 廃止
 * 不動産マッププラグイン(～v6.1.0)で利用
 *
 * ブロック用カラーCSS Fix v6.0.0
 * Render the elements stylesheet.
 *
 * Fix In the case of nested blocks we want the parent element styles to be rendered before their descendants.
 * This solves the issue of an element (e.g.: link color) being styled in both the parent and a descendant:
 * we want the descendant style to take priority, and this is done by loading it after, in DOM order.
 *
 * @since 6.0.0
 * @access private
 * wp-includes/block-supports/elements.php
 *
 * @param string|null $pre_render   The pre-rendered content. Default null.
 * @param array       $block        The block being rendered.
 * @return null

 * use
 * remove_filter( 'pre_render_block', 'fudou_wp_render_elements_support_styles' );
 * add_filter( 'pre_render_block', 'fudou_wp_render_elements_support_styles', 10, 2 );
 *
 */
function fudou_wp_render_elements_support_styles( $pre_render, $block ) {

	$block_type                    = WP_Block_Type_Registry::get_instance()->get_registered( $block['blockName'] );
	$skip_link_color_serialization = wp_should_skip_block_supports_serialization( $block_type, 'color', 'link' );
	if ( $skip_link_color_serialization ) {
		return null;
	}

	$link_color = null;
	if ( ! empty( $block['attrs'] ) ) {
		$link_color = _wp_array_get( $block['attrs'], array( 'style', 'elements', 'link', 'color', 'text' ), null );
	}

	/*
	* For now we only care about link color.
	* This code in the future when we have a public API
	* should take advantage of WP_Theme_JSON::compute_style_properties
	* and work for any element and style.
	*/
	if ( null === $link_color ) {
		return null;
	}

	$class_name = wp_get_elements_class_name( $block );

	if ( strpos( $link_color, 'var:preset|color|' ) !== false ) {
		// Get the name from the string and add proper styles.
		$index_to_splice = strrpos( $link_color, '|' ) + 1;
		$link_color_name = substr( $link_color, $index_to_splice );
		$link_color      = "var(--wp--preset--color--$link_color_name)";
	}
	$link_color_declaration = esc_html( safecss_filter_attr( "color: $link_color" ) );

	$style = ".$class_name a{" . $link_color_declaration . ';}';

	//wp_enqueue_block_support_styles( $style );
	//body after
	if( $style ){
		echo "<style>$style</style>\n";
	}

	return null;
}










/**
 * v6.1.1 廃止
 * 不動産マッププラグイン(～v6.1.0)で利用
 *
 * ブロック用レイアウトCSS Fix v6.1.0
 * Renders the layout config to the block wrapper.
 *
 * @since 6.1.0
 * wp-includes/block-supports/layout.php
 *
 * use
 * remove_filter( 'render_block', 'wp_render_layout_support_flag' );
 * add_filter( 'render_block', 'fudou_wp_render_layout_support_flag', 10, 2 );
 *
 * @param string $block_content Rendered block content.
 * @param array  $block         Block object.
 * @return string Filtered block content.
 */
function fudou_wp_render_layout_support_flag_61( $block_content, $block ) {
	$block_type     = WP_Block_Type_Registry::get_instance()->get_registered( $block['blockName'] );
	$support_layout = block_has_support( $block_type, array( '__experimentalLayout' ), false );

	if ( ! $support_layout ) {
		return $block_content;
	}

	$block_gap              = wp_get_global_settings( array( 'spacing', 'blockGap' ) );
	$global_layout_settings = wp_get_global_settings( array( 'layout' ) );
	$has_block_gap_support  = isset( $block_gap ) ? null !== $block_gap : false;
	$default_block_layout   = _wp_array_get( $block_type->supports, array( '__experimentalLayout', 'default' ), array() );
	$used_layout            = isset( $block['attrs']['layout'] ) ? $block['attrs']['layout'] : $default_block_layout;

	if ( isset( $used_layout['inherit'] ) && $used_layout['inherit'] ) {
		if ( ! $global_layout_settings ) {
			return $block_content;
		}
	}

	$class_names        = array();
	$layout_definitions = _wp_array_get( $global_layout_settings, array( 'definitions' ), array() );
	$block_classname    = wp_get_block_default_classname( $block['blockName'] );
	$container_class    = wp_unique_id( 'wp-container-' );
	$layout_classname   = '';

	// Set the correct layout type for blocks using legacy content width.
	if ( isset( $used_layout['inherit'] ) && $used_layout['inherit'] || isset( $used_layout['contentSize'] ) && $used_layout['contentSize'] ) {
		$used_layout['type'] = 'constrained';
	}

	if (
		wp_get_global_settings( array( 'useRootPaddingAwareAlignments' ) ) &&
		isset( $used_layout['type'] ) &&
		'constrained' === $used_layout['type']
	) {
		$class_names[] = 'has-global-padding';
	}

	/*
	 * The following section was added to reintroduce a small set of layout classnames that were
	 * removed in the 5.9 release (https://github.com/WordPress/gutenberg/issues/38719). It is
	 * not intended to provide an extended set of classes to match all block layout attributes
	 * here.
	 */
	if ( ! empty( $block['attrs']['layout']['orientation'] ) ) {
		$class_names[] = 'is-' . sanitize_title( $block['attrs']['layout']['orientation'] );
	}

	if ( ! empty( $block['attrs']['layout']['justifyContent'] ) ) {
		$class_names[] = 'is-content-justification-' . sanitize_title( $block['attrs']['layout']['justifyContent'] );
	}

	if ( ! empty( $block['attrs']['layout']['flexWrap'] ) && 'nowrap' === $block['attrs']['layout']['flexWrap'] ) {
		$class_names[] = 'is-nowrap';
	}

	// Get classname for layout type.
	if ( isset( $used_layout['type'] ) ) {
		$layout_classname = _wp_array_get( $layout_definitions, array( $used_layout['type'], 'className' ), '' );
	} else {
		$layout_classname = _wp_array_get( $layout_definitions, array( 'default', 'className' ), '' );
	}

	if ( $layout_classname && is_string( $layout_classname ) ) {
		$class_names[] = sanitize_title( $layout_classname );
	}

	/*
	 * Only generate Layout styles if the theme has not opted-out.
	 * Attribute-based Layout classnames are output in all cases.
	 */
	if ( ! current_theme_supports( 'disable-layout-styles' ) ) {

		$gap_value = _wp_array_get( $block, array( 'attrs', 'style', 'spacing', 'blockGap' ) );
		/*
		 * Skip if gap value contains unsupported characters.
		 * Regex for CSS value borrowed from `safecss_filter_attr`, and used here
		 * to only match against the value, not the CSS attribute.
		 */
		if ( is_array( $gap_value ) ) {
			foreach ( $gap_value as $key => $value ) {
				$gap_value[ $key ] = $value && preg_match( '%[\\\(&=}]|/\*%', $value ) ? null : $value;
			}
		} else {
			$gap_value = $gap_value && preg_match( '%[\\\(&=}]|/\*%', $gap_value ) ? null : $gap_value;
		}

		$fallback_gap_value = _wp_array_get( $block_type->supports, array( 'spacing', 'blockGap', '__experimentalDefault' ), '0.5em' );
		$block_spacing      = _wp_array_get( $block, array( 'attrs', 'style', 'spacing' ), null );

		/*
		 * If a block's block.json skips serialization for spacing or spacing.blockGap,
		 * don't apply the user-defined value to the styles.
		 */
		$should_skip_gap_serialization = wp_should_skip_block_supports_serialization( $block_type, 'spacing', 'blockGap' );

		$style = wp_get_layout_style(
			".$block_classname.$container_class",
			$used_layout,
			$has_block_gap_support,
			$gap_value,
			$should_skip_gap_serialization,
			$fallback_gap_value,
			$block_spacing
		);

		// Only add container class and enqueue block support styles if unique styles were generated.
		if ( ! empty( $style ) ) {
			$class_names[] = $container_class;
		}
	}

	/*
	 * This assumes the hook only applies to blocks with a single wrapper.
	 * A limitation of this hook is that nested inner blocks wrappers are not yet supported.
	 */
	$content = preg_replace(
		'/' . preg_quote( 'class="', '/' ) . '/',
		'class="' . esc_attr( implode( ' ', $class_names ) ) . ' ',
		$block_content,
		1
	);

	//body after
	if( $style ){
		echo "<style>$style</style>\n";
	}

	return $content;
}

