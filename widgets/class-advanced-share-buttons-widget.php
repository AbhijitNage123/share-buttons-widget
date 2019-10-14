<?php
namespace ShareButtonsWidgets\Widgets;
// namespace ShareButtonsWidgets\Modules;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Base;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Settings;

wp_enqueue_script('elementor-hello-world');

// use ShareButtonsWidgets\Module;

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

		// $networks = Module::get_networks();
		// echo "<prev>";
		// print_r($networks);wp_die();

		$repeater->add_control(
			'social_icon',
			[
				'label'            => __( 'Icon', 'advanced-share-buttons-widget' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'label_block'      => true,
				'default'          => [
					'value'   => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => [
					'icon-text' => 'Icon & Text',
					'icon' => 'Icon',
					'text' => 'Text',
				],
				'default' => 'icon-text',
				'separator' => 'before',
				'prefix_class' => 'elementor-share-buttons--view-',
				'render_type' => 'template',
			]
		);

		$repeater->add_control(
			'text',
			[
				'label' => __( 'Custom Label', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
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
					'{{WRAPPER}}.title .asbw_fb' => 'background-color: {{VALUE}}',
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
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
			]
		);

		$this->add_control(
			'display_position',
			[
				'label'   => __( 'Position', 'advanced-share-buttons-widget' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'inline'   => __( 'Inline', 'advanced-share-buttons-widget' ),
					'floating' => __( 'Floating', 'advanced-share-buttons-widget' ),
				],
				'default' => 'inline',
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

		// If display_position is Floating.
		$this->add_control(
			'display_floating_align',
			[
				'label'       => __( 'Alignment', 'advanced-share-buttons-widget' ),
				'type'        => Controls_Manager::CHOOSE,
				'default'     => 'left',
				'options'     => [
					'left'  => [
						'title' => __( 'Left', 'advanced-share-buttons-widget' ),
						'icon'  => 'eicon-text-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'advanced-share-buttons-widget' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'toggle'      => false,
				'label_block' => false,
				'condition'   => [
					'display_position' => 'floating',
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'display_floating_on_window_position',
			[
				'label'          => __( 'Floating Position', 'advanced-share-buttons-widget' ),
				'type'           => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0.5,
						'max'  => 2,
						'step' => 0.05,
					],
				],
				'selectors'      => [
					'{{WRAPPER}} .title_floating .asbw_floating_btn' => 'top: {{VALUE}};',
				],
				'condition'      => [
					'display_position' => 'floating',
				],
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

		$this->add_responsive_control(
			'padding',
			[
				'label' => __( 'Padding', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .asbw_btn' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'unit' => 'em',
				],
				'tablet_default' => [
					'unit' => 'em',
				],
				'mobile_default' => [
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
			]
		);

				$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'em' => [
						'min' => 0.5,
						'max' => 4,
						'step' => 0.1,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'em',
				],
				'tablet_default' => [
					'unit' => 'em',
				],
				'mobile_default' => [
					'unit' => 'em',
				],
				'size_units' => [ 'em', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .asbw_btn .asbw_fb .fab.fa-facebook' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'text',
				],
			]
		);

		$icon_spacing = is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};';

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} i.fab.fa-facebook' => $icon_spacing,
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
				],
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

	 	$post_id = get_post();

	 	$page_url = 'https://www.wpastra.com';

		if ( 'yes' === $settings['access_token'] ){
			$access_token =  $settings['caption'];	
		}
		else if( 'yes' === $settings['access_token'] ){
			if ( empty( $settings['caption'] ) )
				echo 'Please Enter Access Token';
			else
				$access_token =  $settings['caption'];
		}
		else{
			echo '';
		}
		//echo $access_token;

		//$access_token = '519754661907260|k4ABYf2VeRhu5rqePuou7KcNhmw';
		
		$args = array( 'timeout' => 30 );	
		if ( empty($access_token) ) {

			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url;

		} else {

			//in case $access_token.
			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url . '&access_token=' . $access_token . '&fields=engagement';
		}

		$response1 = wp_remote_get( $urlfb, $args );

		if( wp_remote_retrieve_response_code( $response1 ) == 200 ) {

		$body = json_decode( wp_remote_retrieve_body( $response1 ), true );

		$asbw_fb_API = 'asbw_fb_API';
		
		set_site_transient( $asbw_fb_API , $body , 86400 );

		$asbw_fb_API = get_site_transient( $asbw_fb_API );		

		$count = 0;
	
		if ( 'floating' === $settings['display_position'] ){
			echo '<div class="title_floating">';
			echo '<button class = asbw_floating_btn style="position: fixed;right: -7px;top: 317px;transition: all 0.2s ease-in 0s;z-index: 9999;cursor: pointer;"';
			echo '>';
			echo '<span class="';
			echo $settings['social_icon_list'][ 0 ]['social_icon']['value'];
			echo '" >';
			echo '</span>&nbsp;';
			echo '&nbsp;';
			echo '</button>';
			echo '</a>';
			echo '</div>';
			 }

		echo '<div class="title">';
		foreach ( $settings['social_icon_list'] as $index ) {

			$show_text = $settings['view'];

			if ( $settings['social_icon_list'][ 0 ]['social_icon']['value'] === 'fab fa-facebook' )
			{
			$share_btn_fb_custom_text =! empty( $settings['social_icon_list'][0]['text'] ) ? $settings['social_icon_list'][0]['text'] : 'FACEBOOK';
			
			echo '<script>
				function basicPopup(url) {
			popupWindow = window.open(url,"popUpWindow","height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes")
				}
			</script>
			<a href=https://www.facebook.com/sharer.php?s=100&p[title]='.$page_url.' target="_blank" onclick="basicPopup(this.href);return false">';

			echo '<button class = "asbw_btn elementor-animation-';
			echo $settings['hover_animation'];
			echo '">';
			echo '<span class= asbw_fb>';
			if ( $show_text ){
				if ( 'icon-text' === $settings['view'] ){
					echo '<i class="';
					echo $settings['social_icon_list'][ 0 ]['social_icon']['value'];
					echo '" ></i>';
					echo '&nbsp;';
					echo $share_btn_fb_custom_text;
				}else if ( 'icon' === $settings['view'] ){
					echo '<i class="';
					echo $settings['social_icon_list'][ 0 ]['social_icon']['value'];
					echo '" ></i>';
				}
			}
			if ( $show_text ){
				if ( 'text' === $settings['view'] ){
					echo $share_btn_fb_custom_text;
				}
			}
			$count++;
			echo '</span>';
			echo '</button>';
			echo '</a>';
			} else{
			echo "Not Supported for Social Icon!";
			}
			switch ($settings['show_share']) {
			case 'yes':
				if ( $settings['social_icon_list'][ 0 ]['social_icon']['value'] === 'fab fa-facebook' ){
					if ( empty( $settings['caption'] ) ){
						echo 'Please Enter Access Token For Total Share Count';
					}
					else{
						echo '<span>';
						echo '<b>';
						$total_share_count = $body['engagement']['share_count']; 
						echo $total_share_count;
						echo '<b>&nbsp;</b>';
						echo '<i class=eicon-share >';
						echo '</i>';
						echo '</span>';
					}
						
				}
				break;
			
			default:
				echo '';
				break;
		}

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
		?>
		<div class="title">
			
			<#
			

			console.log(settings.social_icon_list);
			 _.each( settings.social_icon_list, function( item, index ) { 
			
			 console.log(settings.social_icon_list[count].text);

			var button_wrap = 'elementor-repeater-item-' + item._id + ' .asbw_btn-' + count;
			button_wrap += ' elementor-animation-' + settings.hover_animation;
			
			#>
			<button class='asbw_btn {{button_wrap}} settings.social_icon_list elementor-animation-'{{{settings.hover_animation}}}>
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
		</div>
		<?php
	}
}
