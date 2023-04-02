<?php
/*
 * 物件詳細画像
 *
 * do_action( 'single_fudou_img', $post_id, $title, $fudou_lazy_loading, $fudou_img_start, $fudou_img_end, $type );
 * @param int $post_id
 * @param string $title
 * @param string $fudou_lazy_loading
 * @param string $fudou_img_start
 * @param string $fudou_img_end
 * @param int $type
 * Version: 6.1.0
 */
function single_fudou_img( $post_id, $title, $fudou_lazy_loading, $fudou_img_start, $fudou_img_end, $type ){

	global $wpdb;

	//画像
	if (!defined('FUDOU_IMG_MAX')){
		$fudou_img_max = 10;
	}else{
		$fudou_img_max = FUDOU_IMG_MAX;
	}
	//IMG_MAXより大きい場合
	if( $fudou_img_start > $fudou_img_max ){
		return;
	}
	//逆転してる場合
	if( $fudou_img_start > $fudou_img_end ){
		return;
	}

	//image size thumbnail or medium
	$image_size = apply_filters( 'single_fudou_img_image_size', 'thumbnail' );

	//width height ver5.5.0 single
	$default_single_width  = apply_filters( 'fudo_single_thumbnail_width', 150 );
	$default_single_height = apply_filters( 'fudo_single_thumbnail_height', 150 );
	$defaultimg_single_width_height = apply_filters( 'defaultimg_single_width_height', ' width="' . $default_single_width . '" height="' . $default_single_height . '"' );

	$all_img_conent = '';

	for( $imgid=$fudou_img_start; $imgid<=$fudou_img_end; $imgid++ ){

		$img_content = '';

		$fudoimg_data = get_post_meta($post_id, "fudoimg$imgid", true);
		$fudoimgcomment_data = get_post_meta($post_id, "fudoimgcomment$imgid", true);

		//物件画像コメント + 画像タイプ v5.8.0
		$fudoimg_alt = $fudoimgcomment_data . my_custom_fudoimgtype_print(get_post_meta($post_id, "fudoimgtype$imgid", true));
		//タイトル + 画像No
		if( $fudoimg_alt == '' ){
			$fudoimg_alt = $title . ' 画像' . $imgid;
		}

		if( $fudoimg_data ){

			/*
			 * Add url fudoimg_data Pre
			 * Version: 1.7.12
			 **/
			$fudoimg_data = apply_filters( 'pre_fudoimg_data_add_url', $fudoimg_data, $post_id );

			//Check URL
			if ( checkurl_fudou( $fudoimg_data )) {
				$img_content  = '<a href="' . $fudoimg_data . '" rel="lightbox lytebox['.$post_id.']" title="'.$fudoimg_alt.'">';
				$img_content .= '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . $fudoimg_data . '" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '" />';
				$img_content .= '</a>';
			}else{
				//Check attachment
				$sql  = "SELECT P.ID,P.guid";
				$sql .= " FROM $wpdb->posts AS P";
				$sql .= " WHERE P.post_type ='attachment' AND P.guid LIKE '%/$fudoimg_data' ";
				//$sql = $wpdb->prepare($sql,'');
				$metas = $wpdb->get_row( $sql );
				$attachmentid = '';
				if( !empty($metas) ){
					$attachmentid  =  $metas->ID;
				}

				/*
				 * fudoimg_data to attachmentid
				 * Version: 1.9.2
				 **/
				$attachmentid = apply_filters( 'fudoimg_data_to_attachmentid', $attachmentid, $fudoimg_data, $post_id );

				if($attachmentid !=''){
					//thumbnail、medium、large、full 
					$fudoimg_data1 = wp_get_attachment_image_src( $attachmentid, $image_size );
					$fudoimg_url = $fudoimg_data1[0];

					//width height ver5.5.0 single
					$fudoimg_single_width  = isset( $fudoimg_data1[1] ) ? $fudoimg_data1[1] : $default_single_width;
					$fudoimg_single_height = isset( $fudoimg_data1[2] ) ? $fudoimg_data1[2] : $default_single_height;
					$fudoimg_single_width_height = apply_filters( 'fudoimg_single_width_height', ' width="' . $fudoimg_single_width . '" height="' . $fudoimg_single_height . '"' );

					//light-box v1.7.9 SSL
					$large_guid_url = wp_get_attachment_image_src( $attachmentid, 'large' );
					if( $large_guid_url[0] ){
						$guid_url = $large_guid_url[0];

						//width height ver5.5.0 single
						$guid_single_width  = isset( $large_guid_url[1] ) ? $large_guid_url[1] : $default_single_width;
						$guid_single_height = isset( $large_guid_url[2] ) ? $large_guid_url[2] : $default_single_height;
						$guidimg_single_width_height = apply_filters( 'guidimg_single_width_height', ' width="' . $guid_single_width . '" height="' . $guid_single_height . '"' );

					}else{
						$guid_url = get_the_guid( $attachmentid );
						if( is_ssl() ){
							$guid_url= str_replace( 'http://', 'https://', $guid_url );
						}
					}

					$img_content = '<a href="' . $guid_url . '" rel="lightbox lytebox['.$post_id.']" title="'.$fudoimg_alt.'">';
					if($fudoimg_url !=''){
						$img_content .= '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . $fudoimg_url.'" alt="'.$fudoimg_alt.'" title="'.$fudoimg_alt.'" ' . $fudoimg_single_width_height . '>';
					}else{
						$img_content .= '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . $guid_url . '"  alt="'.$fudoimg_alt.'" title="'.$fudoimg_alt.'" ' . $guidimg_single_width_height . '>';
					}
					$img_content .= '</a>';

				}else{

					/*
					 * Add url fudoimg_data
					 * Version: 1.7.12
					 **/
					$fudoimg_data = apply_filters( 'fudoimg_data_add_url', $fudoimg_data, $post_id );

					if ( checkurl_fudou( $fudoimg_data )) {
						$img_content  = '<a href="' . $fudoimg_data . '" rel="lightbox lytebox['.$post_id.']" title="'.$fudoimg_alt.'">';
						$img_content .= '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . $fudoimg_data . '" alt="' . $fudoimg_alt . '" title="' . $fudoimg_alt . '" ' . $defaultimg_single_width_height . '>';
						$img_content .= '</a>';
					}else{
						$img_content  = '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . apply_filters( 'fudou_nowprinting_img', plugins_url() . '/fudou/img/nowprinting.png', $post_id ) . '" alt="' . $fudoimg_data . '" ' . $defaultimg_single_width_height . '>';
					}
				}
			}
		}else{
			//if( $imgid==1 ){
			//	$img_content = '<img ' . $fudou_lazy_loading . ' class="box3image" src="' . apply_filters( 'fudou_nowprinting_img', plugins_url() . '/fudou/img/nowprinting.png', $post_id ) . '" alt="' . $fudoimg_alt . '" ' . $defaultimg_single_width_height . '>';
			//}
		}

		if( $img_content ){
			$all_img_conent .= $img_content;
		}
	}

	$all_img_conent = apply_filters( 'fudo_single_img_conent', $all_img_conent );;

	//携帯QR v6.1.0 API非推奨の為 廃止
	/*
	if ( apply_filters( 'fudou_ktai_qr', false ) && $type == 1 ){
		$yoursubject = '%e7%89%a9%e4%bb%b6%e3%82%b5%e3%82%a4%e3%83%88%e3%81%aeURL'; //「物件サイトのURL」

		$img_content_qr = '<a href="mailto:?subject='.$yoursubject.'&body='. urlencode( get_permalink($post_id) ) .'">';
		$img_content_qr .= '<img src="//chart.googleapis.com/chart?chs=200x200&amp;cht=qr&amp;chl=' . urlencode( get_permalink($post_id) ) . '" alt="クリックでURLをメール送信" title="クリックでURLをメール送信" />';
		$img_content_qr .= '</a>';

		//$img_content_qr = '<figure class="wp-block-image size-' . $image_size . ' is-style-default">' . $img_content_qr . '</figure>';

		$all_img_conent .= $img_content_qr;
	}
	*/

	if( $all_img_conent ){
		if( $type == 2 ){
			$all_img_conent = '<div id="second_img">' . $all_img_conent . '</div>';
		}else{

			$all_img_conent = '<div id="single_fudou_img">' . $all_img_conent . '</div>';
		}
		echo $all_img_conent;
	}
}
add_action( 'single_fudou_img', 'single_fudou_img', 10, 6 );
add_action( 'single_fudou_img2', 'single_fudou_img', 10, 6 );

