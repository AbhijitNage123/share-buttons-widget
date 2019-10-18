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
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'advanced-share-buttons-widget' ),
			'sm' => __( 'Small', 'advanced-share-buttons-widget' ),
			'md' => __( 'Medium', 'advanced-share-buttons-widget' ),
			'lg' => __( 'Large', 'advanced-share-buttons-widget' ),
			'xl' => __( 'Extra Large', 'advanced-share-buttons-widget' ),
		];
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

		$repeater->add_control(
			'text',
			[
				'label' => __( 'Custom Label', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::TEXT,
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
			'view',
			[
				'label' => __( 'View', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'options' => [
					'icon-text' => 'Icon & Text',
					'icon' => 'Icon',
					'text' => 'Text',
				],
				'default' => 'icon-text',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'skin',
			[
				'label' => __( 'Skin', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'gradient' => __( 'Gradient', 'advanced-share-buttons-widget' ),
					'minimal' => __( 'Minimal', 'advanced-share-buttons-widget' ),
					'framed' => __( 'Framed', 'advanced-share-buttons-widget' ),
				],
				'default' => 'gradient',
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'square' => __( 'Square', 'advanced-share-buttons-widget' ),
					'rounded' => __( 'Rounded', 'advanced-share-buttons-widget' ),
					'circle' => __( 'Circle', 'advanced-share-buttons-widget' ),
				],
				'default' => 'square',
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0' => 'Auto',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'elementor-grid%s-',
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
			'alignment',
			[
				'label' => __( 'Alignment', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'advanced-share-buttons-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'advanced-share-buttons-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'advanced-share-buttons-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor-share-buttons%s--align-',
				'condition' => [
					'columns' => '0',
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};position: fixed;right: 5px;top: 317px;transition: all 0.2s ease-in 0s;z-index: 9999;cursor: pointer;',
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
				'default' => 'no',
			]
		);

		$this->add_control(
			'access_token',
			[
				'label'   => __( 'Enable Access Token', 'advanced-share-buttons-widget' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'no'   => __( 'No', 'advanced-share-buttons-widget' ),
					'yes' => __( 'Yes', 'advanced-share-buttons-widget' ),
				],
				'default' => 'no',
				'condition'      => [
					'show_share' => 'yes',
				],
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
				'label_block' => false,
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
				'label' => __( 'Button Size', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0.5,
						'max' => 2,
						'step' => 0.05,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn' => 'font-size: calc({{SIZE}}{{UNIT}} * 10);',
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
					'{{WRAPPER}} .uael-share-btn__icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'text',
				],
			]
		);

		$this->add_responsive_control(
			'button_height',
			[
				'label' => __( 'Button Height', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'em' => [
						'min' => 1,
						'max' => 7,
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
					'{{WRAPPER}} .uael-share-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'border_size',
			[
				'label' => __( 'Border Size', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 20,
					],
					'em' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-grid-item .uael-share-btn, .uael-share-btn .elementor-animation- .uaelbtn-shape-circle .uaelbtn--skin-minimal .uael-share-btn__icon' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'skin' => [ 'framed', 'boxed' ],
				],
			]
		);
		$this->add_control(
			'color_source',
			[
				'label' => __( 'Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'options' => [
					'official' => 'Official Color',
					'custom' => 'Custom Color',
				],
				'default' => 'official',
				'prefix_class' => 'elementor-share-buttons--color-',
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'advanced-share-buttons-widget' ),
				'condition' => [
					'color_source' => 'custom',
				],
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn .uael-share-btn__icon, .uael-share-btn .uael-share-btn__text, .uaelbtn--skin-minimal .uael-share-btn__icon' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'color_source' => 'custom',
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label' => __( 'Secondary Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn .uael-share-btn__icon, .uael-share-btn .uael-share-btn__text,
					' => 'color: {{VALUE}}',
				],
				'condition' => [
					'color_source' => 'custom',
				],
				'separator' => 'after',
			]
		);

		$this->end_controls_tab();
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
						'{{WRAPPER}} .uael-share-btn' => 'margin-right: calc( {{SIZE}}{{UNIT}} / 2) ; margin-left: calc( {{SIZE}}{{UNIT}} / 2);',
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

	 	// $post_id = get_post();

	 	// // $page_url = 'https://www.wpastra.com';
	 	// $page_url = get_permalink( $post_id );

	 	global $wp;

		//echo add_query_arg( $wp->query_vars, home_url( $wp->request ) );

		$page_url = add_query_arg( $wp->query_vars, home_url( $wp->request ) );
	 	// echo $url;	

	 	// $page_url = urlencode($url);

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

		//$access_token = '519754661907260|k4ABYf2VeRhu5rqePuou7KcNhmw';
		
		$args = array( 'timeout' => 30 );	
		if ( empty($access_token) ) {

			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url;

		} else {

		
			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url . '&access_token=' . $access_token . '&fields=engagement';
		}

		$response1 = wp_remote_get( $urlfb, $args );

		if( wp_remote_retrieve_response_code( $response1 ) == 200 ) {

		$body = json_decode( wp_remote_retrieve_body( $response1 ), true );

		$asbw_fb_API = 'asbw_fb_API';
		
		set_site_transient( $asbw_fb_API , $body , 86400 );

		$asbw_fb_API = get_site_transient( $asbw_fb_API );		

		$count = 0;
	
		// if ( 'floating' === $settings['display_position'] ){
		// 	echo '<div class="title_floating">';
		// 	echo '<button class = asbw_floating_btn style="position: fixed;right: -7px;top: 317px;transition: all 0.2s ease-in 0s;z-index: 9999;cursor: pointer;"';
		// 	echo '>';
		// 	echo '<span class="';
		// 	echo $settings['social_icon_list'][ 0 ]['social_icon']['value'];
		// 	echo '" >';
		// 	echo '</span>&nbsp;';
		// 	echo '&nbsp;';
		// 	echo '</button>';
		// 	echo '</a>';
		// 	echo '</div>';
		// 	 } else{

			 	 // s=100&p[title]
		if ( 'floating' === $settings['display_position'] ){

			$position = $settings['display_floating_align'];
		} else{
			$position = 'inline';
		}

			 echo '<div class="elementor-grid ">
			
					<div class="elementor-grid-item">';

				$show_text = $settings['view'];		
				echo '<script>
					function basicPopup(url) {

						var top = window.screen.height - 400;
						    top = top > 0 ? top/2 : 0;
						            
						var left = window.screen.width - 600;
						    left = left > 0 ? left/2 : 0;

												
						popupWindow = window.open(url,"popUpWindow","height=400,width=600,left="+left+",top="+top+",resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes")
					}
				</script>
				<a href=https://www.facebook.com/sharer.php?u='.$page_url.' target="_blank" onclick="basicPopup(this.href);return false">';
				
			echo '<div class="uael-share-btn elementor-animation-';
			echo $settings['hover_animation'];
			echo ' uaelbtn-shape-';
			echo $settings['shape'];
			echo ' uaelbtn--skin-';
			echo $settings['skin'];
			echo '">';
			if( 'icon-text' === $settings['view'] ){
				echo '<span class="uael-share-btn__icon">
								<i class="fab fa-facebook" aria-hidden="true"></i>
								<span class="elementor-screen-only">Share on facebook</span>
							</span>
							
							
						<div class="uael-share-btn__text">
									
										<span class="uael-share-btn__title">Facebook</span>
									
						</div>
							
						';	
			} else if ( 'text' === $settings['view'] ){
			
				echo '			
							
						<div class="uael-share-btn__text">
									
										<span class="uael-share-btn__title">Facebook</span>
									
						</div>
							
						';

			} else {

				echo '<span class="uael-share-btn__icon">
								<i class="fab fa-facebook" aria-hidden="true"></i>
								<span class="elementor-screen-only">Share on facebook</span>
							</span>
							
						';

			}
			echo '</div>
					</div>';
			
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
			
		echo '</div>';

	// 		 } //else loop for floating.
			
	 } //if loop of wp retrive.

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
		$transient = get_transient( '_site_transient_asbw_fb_API' );
		
		?>
		
		<div class="elementor-grid">
			
					<div class="elementor-grid-item">
						<div class="uael-share-btn elementor-animation-{{{settings.hover_animation}}} uaelbtn-shape-{{settings.shape}} uaelbtn--skin-{{settings.skin}}">
							<#
			console.log( settings.social_icon_list );
			var show_text = settings.view;
			if ( settings.social_icon_list[0].social_icon.value === 'fab fa-facebook' )
			{
				var share_btn_fb_custom_text;
				if ( '' === settings.social_icon_list[0].text ) {
				share_btn_fb_custom_text = 'FACEBOOK';	
				} else {
				share_btn_fb_custom_text = settings.social_icon_list[0].text;		
				}
							 if( 'icon-text' === settings.view ){ #>
							<span class="uael-share-btn__icon">
								<i class="{{{settings.social_icon_list[0].social_icon.value}}}" aria-hidden="true"></i>
								<span class="elementor-screen-only">Share on facebook</span>
							</span>
							
							
								<div class="uael-share-btn__text">
									
										<span class="uael-share-btn__title">{{{share_btn_fb_custom_text}}}</span>
									
								</div>
							<# }else if ( 'text' === settings.view ){ #>
								<div class="uael-share-btn__text">
									
										<span class="uael-share-btn__title">{{{share_btn_fb_custom_text}}}</span>
									
								</div>
								<# } else { #>
				 					<span class="uael-share-btn__icon">
								<i class="{{{settings.social_icon_list[0].social_icon.value}}}" aria-hidden="true"></i>
								<span class="elementor-screen-only">Share on facebook</span>
							</span>
								<# console.log(settings.view);} #>
							<# } #>
						</div>
						 <# switch ( settings.show_share ) {
			case 'yes':
				if ( settings.social_icon_list[ 0 ].social_icon.value === 'fab fa-facebook' ){
					if ( '' === settings.caption ){
						console.log( 'Please Enter Access Token For Total Share Count' );
					}
					else{ #>
						<span>
						<b> 
							<?php echo $transient; ?>
						<# var total_share_count = <?php echo $transient; ?> console.log( total_share_count )#>						
						<b>&nbsp;</b>
						<i class=eicon-share>
						</i>
						</span>
					<# }
						
				} 
				break;
			
			default: 
				{{{}}}
				break;
		} #>
					</div>
		</div>			
		
		<?php
	}
}
