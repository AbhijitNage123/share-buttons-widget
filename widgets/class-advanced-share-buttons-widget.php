<?php
namespace ShareButtonsWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Base;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Settings;
wp_enqueue_script('elementor-hello-world');
// use ShareButtonsWidgets\Share_Buttons_Module;
// use ShareButtonsWidgets\widget\Module;

/**
 * Elementor Advanced Share Buttons
 *
 * Elementor widget for advanced share buttons.
 *
 * @since 1.0.0
 */
class Advanced_Share_Buttons_Widget extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Advanced_Share_Buttons_Widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Advanced Share Buttons', 'advanced-share-buttons-widget' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'advanced-share-buttons-widget' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_buttons_content',
			[
				'label' => __( 'Share Buttons', 'advanced-share-buttons-widget' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label'            => __( 'Icon', 'advanced-share-buttons-widget' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'label_block'      => true,
				'default'          => [
					'value'   => 'fab fa-wordpress',
					'library' => 'fa-brands',
				],
				'recommended'      => [
					'fa-brands' => [
						'android',
						'apple',
						'behance',
						'bitbucket',
						'codepen',
						'delicious',
						'deviantart',
						'digg',
						'dribbble',
						'elementor',
						'facebook',
						'flickr',
						'foursquare',
						'free-code-camp',
						'github',
						'gitlab',
						'globe',
						'google-plus',
						'houzz',
						'instagram',
						'jsfiddle',
						'linkedin',
						'medium',
						'meetup',
						'mixcloud',
						'odnoklassniki',
						'pinterest',
						'product-hunt',
						'reddit',
						'shopping-cart',
						'skype',
						'slideshare',
						'snapchat',
						'soundcloud',
						'spotify',
						'stack-overflow',
						'steam',
						'stumbleupon',
						'telegram',
						'thumb-tack',
						'tripadvisor',
						'tumblr',
						'twitch',
						'twitter',
						'viber',
						'vimeo',
						'vk',
						'weibo',
						'weixin',
						'whatsapp',
						'wordpress',
						'xing',
						'yelp',
						'youtube',
						'500px',
					],
					'fa-solid'  => [
						'envelope',
						'link',
						'rss',
					],
				],
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label'   => __( 'Color', 'advanced-share-buttons-widget' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Official Color', 'advanced-share-buttons-widget' ),
					'custom'  => __( 'Custom', 'advanced-share-buttons-widget' ),
				],
			]
		);

		$repeater->add_control(
			'item_icon_primary_color',
			[
				'label'     => __( 'Primary Color', 'advanced-share-buttons-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'item_icon_color' => 'custom',
				],
				'selectors' => [
					// '{{WRAPPER}}.title .asbw-icon' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .title .asbw_btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'item_icon_secondary_color',
			[
				'label'     => __( 'Secondary Color', 'advanced-share-buttons-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'item_icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .title .asbw_btn span' => 'color: {{VALUE}};',
				],
			]
		);

		

		$this->add_control(
			'social_icon_list',
			[
				'label'       => __( 'Social Icons', 'advanced-share-buttons-widget' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'social_icon' => [
							'value'   => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value'   => 'fab fa-pinterest',
							'library' => 'fa-brands',
						],
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
			]
		);

		$this->add_control(
			'show_share',
			[
				'label' => __( 'Total Share Count', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'access_token',
			[
				'label'   => __( 'Enable Access Token', 'advanced-share-buttons-widget' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'no'   => __( 'NO', 'advanced-share-buttons-widget' ),
					'yes' => __( 'YES', 'advanced-share-buttons-widget' ),
				],
				'default' => 'no',
			]
		);

		$this->add_control(
			'caption',
			[
				'label'       => __( 'Access Token', 'advanced-share-buttons-widget' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => __( 'Enter your access token', 'advanced-share-buttons-widget' ),
				'condition'   => [
					'access_token' => 'yes',
				],
				'dynamic'     => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => __( 'Alignment', 'advanced-share-buttons-widget' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'advanced-share-buttons-widget' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'advanced-share-buttons-widget' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'advanced-share-buttons-widget' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_buttons_style',
			[
				'label' => __( 'Share Buttons', 'advanced-share-buttons-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_size',
			[
				'label'     => __( 'Button Size', 'advanced-share-buttons-widget' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0.5,
						'max'  => 2,
						'step' => 0.05,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .title .asbw_btn' => 'font-size: calc({{SIZE}}{{UNIT}} * 10);',
				],
			]
		);

		$this->add_responsive_control(
			'button_height',
			[
				'label'          => __( 'Button Height', 'advanced-share-buttons-widget' ),
				'type'           => Controls_Manager::SLIDER,
				'range'          => [
					'em' => [
						'min'  => 1,
						'max'  => 7,
						'step' => 0.1,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'        => [
					'unit' => 'em',
				],
				'tablet_default' => [
					'unit' => 'em',
				],
				'mobile_default' => [
					'unit' => 'em',
				],
				'size_units'     => [ 'em', 'px' ],
				'selectors'      => [
					'{{WRAPPER}} .title .asbw_btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'general_spacing',
			[
				'label' => __( 'Spacing', 'advanced-share-buttons-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'gap',
				[
					'label'      => __( 'Space between buttons', 'advanced-share-buttons-widget' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range'      => [
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
					],
					'default'    => [
						'size' => 10,
						'unit' => 'px',
					],
					'selectors'  => [
						'{{WRAPPER}} .title .asbw_btn' => 'margin-right: calc( {{SIZE}}{{UNIT}} / 2) ; margin-left: calc( {{SIZE}}{{UNIT}} / 2);',
					],
				]
			);
			$this->add_control(
				'hover_animation',
				[
					'label' => __( 'Hover Animation', 'advanced-share-buttons-widget' ),
					'type'  => Controls_Manager::HOVER_ANIMATION,
				]
			);

		$this->end_controls_tab();
	}
	

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		
		
		// var_dump($settings);
		// wp_die();
		
		// $url='https://www.facebook.com';
 		
	 //    $api = file_get_contents( 'http://count-server.sharethis.com/v2.0/get_counts?url=' . $url );
	 
	 //    $counts = json_decode( $api );

 
	 	$post_id = get_post();

	 	// print_r($post_id);
	 	$page_url = 'https://www.wpastra.com';
	 	// $page_url1 = 'https://www.facebook.com/groups/wpastra/permalink/683474735455127/';

	    // $page_url = get_permalink( $post_id );
		// $page_url = urlencode( $page_url );
	    //https://www.facebook.com/sharer/sharer.php?href=https%3A%2F%2Fwpastra.com%2Fastra-2-1%2F&u=https%3A%2F%2Fwpastra.com%2Fastra-2-1%2F
		// print_r($page_url);
		// wp_die();

		$access_token = '519754661907260|k4ABYf2VeRhu5rqePuou7KcNhmw';
		
		$args = array( 'timeout' => 30 );	
		if ( empty($access_token) ) {

			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url;

		} else {

			//in case $access_token :
			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url . '&access_token=' . $access_token . '&fields=engagement';
			// var_dump($page_url);
			// var_dump($urlfb);
			// wp_die();
		}

		$urlpin = 'https://widgets.pinterest.com/v1/urls/count.json?source=6&url=https://wpastra.com/';

		// $data = array('0' => $urlfb ,'1' => $urlpin );

		// foreach ($data as $key ) {
		// 	// var_dump($value);
		// 	$response[] = wp_remote_get( $key, $args );
		//  var_dump($response);
		//  wp_die();
		// if( wp_remote_retrieve_response_code( $response ) == 200 ) {

		// $body = json_decode( wp_remote_retrieve_body( $response[$key] ), true );
		// }
		// preg_match_all('!\d+!', $response[$key]['body'], $matches);
		// }

		// 	echo '<pre>';
		// var_dump($response);
		// wp_die();	

		$response1 = wp_remote_get( $urlfb, $args );

		$response2 = wp_remote_get( $urlpin, $args );

		if( wp_remote_retrieve_response_code( $response1 ) == 200 ) {

		$body = json_decode( wp_remote_retrieve_body( $response1 ), true );

		$asbw_fb_API = 'asbw_fb_API';//empty($asbw_fb_API) ? $asbw_fb_API : '';
		
		set_site_transient( $asbw_fb_API , $body , 86400 );

		$asbw_fb_API = get_site_transient( $asbw_fb_API );			

		// echo "<pre>";				
		//  print_r(get_site_transient( $asbw_fb_API ));
		//  wp_die();


		// echo "<pre>";
		// var_dump( $asbw_fb_API );
		// wp_die();	

		$count = 0;

		preg_match_all('!\d+!', $response2['body'], $matches);

		$asbw_pin_API = 'asbw_pin_API';// empty( $asbw_pin_API ) ?  $asbw_pin_API  : '';

		set_site_transient( $asbw_pin_API, $response2['body'] , 86400 );

		$asbw_pin_API = get_site_transient( $asbw_pin_API );
		

		// echo "<pre>";
		//  var_dump( $asbw_pin_API );
		//  wp_die();

		// echo $matches[0][0];
		// echo "&nbsp;";
		// echo $body['engagement']['share_count'];
		// wp_die();

		echo '<div class="title">';
		foreach ( $settings['social_icon_list'] as $index ) {
			// echo '<button ';
			// echo $this->get_render_attribute_string( 'button_' . $count );
			// echo '<a href=https://www.facebook.com/sharer.php?s=100&p[title]='.$page_url1.' target="_blank">';
			// // https://www.facebook.com/sharer/sharer.php?u=example.org
			// echo "Share";
			// echo '</a>';

			// echo $body['engagement']['share_count'];
			if ( $settings['social_icon_list'][ $count ]['social_icon']['value'] === 'fab fa-facebook' )
			{
			// 			echo '<a target="_blank" OnClick="window.open(this.href,"targetWindow","toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250"); return false;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fyoursite.com%2Fem%2F4881-01%2F&picture=http%3A%2F%2Fyoursite.com%2Fem%2F4881-01%2Fimg%2Fmercedes-maybach.png&title=title+here&description=Your+description">
			//   <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAUCAMAAAAA9GVfAAACnVBMVEU0TI01TIw1TY01TY41TY81To82TY42TY85UZU6U5k7VJs7VZ07VaE8VZs8Vp08VqE8VqI8V6I9Vp49V6A9V6M+WJ8+WKA+WKQ+WaQ+WaU/WaM/WaQ/WaY/WqY/WqdAW6ZAW6dAW6hBW6dBXKhBXKlCXapCXatCXqpCXqxDXqtDXqxDX6xEX65EYK5EYK9FX65FYK9FYa9FYbBGYbBGYrFGYrJHYrFHY7JHY7NIZLNIZLRIZbRJZbVJZrZKZrZKZ7dLZ7hLaLhLaLlMablSaKpSaaxTaq1ZcbVbc7hfdLJfdbNfdbRfdrZgdrdhd7dhe8Fiebtie8Fofr9qgcFsgb5shMVthcZugrhugrtvgrxwhL1whL5xhb9xhcBzh8JziL9ziMJziMN1isV1isZ2iL12ir52isF5jMWAjreAk8eEk7+ElMOFlseFmMiIl7yKmsqOnL+RnsGSnsGVpdCXp9SeqsmfrNKfrNOfrdSgrdOgrdSgrtOgrtWhrtShrtWhr9Sir9WisNaisNejsNimstWoss+qtM+suNesudyuudmwvNyyvNazvNizvdqzvtqzvtu0vtu0vty0v9y0v961v921v962v9i3v9a3wd24wt65wtu5w+G8xeG8xuG9xNq+xtzAyeHAyePByuHCyd7Dy+DEzOPFzOHGz+fGz+nJ0OLL0uXN1OjP1urQ1+vS1+bS2OfT2evU2uzV2+vW2+jY3evZ3uzZ3u3b4O7c4vHd4ezd4/Le4/Df4+3f4+/g5PHg5fHh5vHk5/Dk6PLn6vXo6/Xo7Pbp7PTq7fbr7vTr7vbt8Pbx8vfx8vjx8/j09fr09vn19vr19/v29/r3+Pv5+vz6+/z6+/37+/37/P78/P38/P78/f79/f7+/v////+ZYdejAAACCUlEQVR4AWNYEebkTAYMXMHg7+BIFgxlsLMnEzLY2tja7LqHBHYARYiBDFbWVtb3UABQhBjIYGlhaQHTszw5uOTePZCIpakoEwOvmQarMpCNHTKYmJuYQzUeBbKT7t0DiZj4rbtzd09K49UpQDZ2yGBibGIM1dlsEnQESIFETFquL+i4sbzhajcbs5SxkRATA6e+PCMHs5IYMxOfAVgFg56hniFUZ5NeIogCiehNvjuPS12v/uqxazcXa3uvv3P3YOqke6duzVx5687mcLAKBl0dXR2wviNNcboeTbPv3QOJ6KYfv7szT6L26u6EQ6czu85ktd6cOOnepoBZF4oKLy0Dq2DQ0tbSButcC2JpFd+7B6a1QxZevD2t+uoMrVXnc13a9l65N2HCvQnaW0Aq94FVMGiqaaqBdR6uidV0r1lz7x5IRJObRTr+xLEZV/s1V53PWXJ9afvVfqBOta3ns6XZhcEqGFRUVVSh/qxTiQFRIBGV1ddKM84e6LzapwLUue1ywfy7Pb33elXn3J5eemUuWAWDiqKKIlRnlUo0WKciEKbtv3P3ZH7ttSkqqy/mVJy7e/zyhqn3pir6brh1Z6MPWAWDnIKcAlRnpVwUiAKKEAMZZGVkZaA6y2UjQRRQhBjIIC4pLrkdorNMPAJIbgeKEAMZxEXIhAxuggJkQS+GRZ78PGRA10UAUdSA0BPiLlkAAAAASUVORK5CYII=" width="57" />
			// </a>';
// 				echo '<button></<script>
// let newWin = window.open("about:blank", "hello", "width=200,height=200");

// newWin.document.write(
//   "<script>window.opener.document.body.innerHTML = "Test"<\/script>"
// );
// </script></button>';

			echo '<script>
				function basicPopup(url) {
			popupWindow = window.open(url,"popUpWindow","height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes")
				}
			</script>
			<a href=https://www.facebook.com/sharer.php?s=100&p[title]='.$page_url.' target="_blank" onclick="basicPopup(this.href);return false">';
				
			// echo '<div id="fb-root"></div>
			// <script>(function(d, s, id) {
			//   var js, fjs = d.getElementsByTagName(s)[0];
			//   if (d.getElementById(id)) return;
			//   js = d.createElement(s); js.id = id;
			//   js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			//   fjs.parentNode.insertBefore(js, fjs);
			// }(document, "script", "facebook-jssdk"));</script>
			// <div class="fb-share-button" data-href="https://www.wpastra.com" data-width="200" data-type="button_count"></div>';
			echo $page_url;
			// echo '<a href=https://www.facebook.com/sharer.php?s=100&p[title]='.$page_url1.' target="_blank">';
			echo '<button class = asbw_btn';
			echo '>';
			echo '<span class="';
			echo $settings['social_icon_list'][ $count ]['social_icon']['value'];
			echo '" >';
			$count++;
			echo '</span>&nbsp;';
			echo '&nbsp;';
			echo '</button>';
			echo '</a>';
			}
			else if ( $settings['social_icon_list'][ $count ]['social_icon']['value'] === 'fab fa-pinterest' ){
			echo '<script>
				function basicPopup(url) {
			popupWindow = window.open(url,"popUpWindow","height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes")
				}
			</script>
			<a href=http://pinterest.com/pin/create/link/?url='.$page_url.' target="_blank" onclick="basicPopup(this.href);return false">';
			echo '<button class = asbw_btn';
			echo '>';
			echo '<span class="';
			echo $settings['social_icon_list'][ $count ]['social_icon']['value'];
			echo '" >';
			$count++;
			echo '</span>&nbsp;';
			echo '&nbsp;';
			echo '</button>';
			echo '</a>';
			}
			else{
			echo "Not Supported for Social Icon!";
			}
			// echo $settings['social_icon_list'][ $count ]['social_icon']['value'];
			// echo '<a href=http://pinterest.com/pin/create/link/?url='.$page_url1.' target="_blank">';
			// echo '</a>';
		}
		switch ($settings['show_share']) {
			case 'yes':
				echo '<span>';
				echo '<b>';
				$total_share_count = $body['engagement']['share_count'] + $matches[0][0]; 
				echo $total_share_count;
				echo '<b>&nbsp;Total Shares</b>';
				echo '</span>';
				break;
			
			default:
				echo '';
				break;
		}
		}	
		echo '</div>';
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

		?>
		<# 
		var count = 0; 
		var iconsHTML = {};
		#>
		<?php 
		// $asbw_fb_API = get_site_transient( '_site_transient_asbw_fb_API' );
		// echo $asbw_fb_API;
		// preg_match_all('!\d+!', $asbw_fb_API, $matches);
		// echo $matches[0][0];
		
		// $asbw_pin_API = get_site_transient( $asbw_pin_API );
		// echo $asbw_pin_API;

		?>
		<div class="title">
			
			<# _.each( settings.social_icon_list, function( item, index ) { 
			var button_wrap = 'elementor-repeater-item-' + item._id + ' .asbw_btn-' + count;
			button_wrap += ' elementor-animation-' + settings.hover_animation;
			#>
			<button class='asbw_btn {{button_wrap}}'>

				<!-- {{{ settings.section_buttons_content }}} -->
				<#
						iconsHTML[ count ] = elementor.helpers.renderIcon( view, item.social_icon, {}, 'span', 'object' );
						if ( ( ! item.social ) && iconsHTML[ count ] && iconsHTML[ count ].rendered ) { #>
							{{{ iconsHTML[ count ].value }}}
						<# } else { #>
				<span class= "$settings['social_icon_list'][{{count}}]['social_icon']['value']"></span>
				 count = count + 1; 
				<# }
					#>
			</button>

			<# } ); #>
		<!-- 	<# switch( settings.show_share) {
			case 'yes':
				<span>$counts->shares->all;</span>
				break;

			default:
				break;

		} -->
		</div>
		<?php
	}
}
