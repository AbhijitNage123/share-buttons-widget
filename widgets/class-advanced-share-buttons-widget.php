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
		return [ 'elementor-hello-world' ];
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
				'label' => __( 'Icon', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'label_block' => true,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
				'recommended' => [
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
					'fa-solid' => [
						'envelope',
						'link',
						'rss',
					],
				],
			]
		);

		$repeater->add_control(
			'Custom_text',
			[
				'label' => __( 'Custom Label', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'text',
			[
				'label' => __( 'Networks', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'options' => [
					'facebook' => 'Facebook',
					'twitter' => 'Twitter',
					'google' => 'Google+',
					'linkedin' => 'LinkedIn',
					'pinterest' => 'Pinterest',
					'reddit' => 'Reddit',
					'vk' => 'VK',
					'odnoklassniki' => 'OK',
					'tumblr' => 'Tumblr',
					'delicious' => 'Delicious',
					'digg' => 'Digg',
					'skype' => 'Skype',
					'stumbleupon' => 'StumbleUpon',
					'telegram' => 'Telegram',
					'pocket' => 'Pocket',
					'xing' => 'XING',
					'email' => 'Email',
					'print' => 'Print',
					'whatsapp' => 'WhatsApp',
				],
				'default' => 'facebook',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'social_icon_list',
			[
				'label' => __( 'Social Icons', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
							'text' => 'facebook',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
							'text' => 'twitter',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-linkedin',
							'library' => 'fa-brands',
							'text' => 'linkedin',
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
				'prefix_class' => 'uael-share-buttons--view-',
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'show_label',
			[
				'label' => __( 'Label', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'advanced-share-buttons-widget' ),
				'label_off' => __( 'Hide', 'advanced-share-buttons-widget' ),
				'default' => 'yes',
				'condition' => [
					'view' => 'icon-text',
				],
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
				'prefix_class' => 'uael-style-',
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
					'columns' => '1',
				],
			]
		);	

		// If display_position is Floating.
		// $this->add_control(
		// 	'display_floating_align',
		// 	[
		// 		'label'       => __( 'Align', 'advanced-share-buttons-widget' ),
		// 		'type'        => Controls_Manager::CHOOSE,
		// 		'toggle'      => false,
		// 		'label_block' => false,
		// 		'condition'   => [
		// 			'display_position' => 'floating',
		// 		],
		// 		'default'   => 'center',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-grid .uael-style-floating' => 'text-align: {{VALUE}};',
		// 		],
		// 	]
		// );
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
					'{{WRAPPER}} .elementor-grid.uael-style-floating' => 'text-align: {{VALUE}};',
				],
			]
		);
		// position: fixed;right: 5px;top: 317px;transition: all 0.2s ease-in 0s;z-index: 9999;cursor: pointer;
		// $this->add_responsive_control(
		// 	'display_floating_on_window_position',
		// 	[
		// 		'label'          => __( 'Floating Position', 'advanced-share-buttons-widget' ),
		// 		'type'           => Controls_Manager::SLIDER,
		// 		'range'     => [
		// 			'px' => [
		// 				'min'  => 0.5,
		// 				'max'  => 2,
		// 				'step' => 0.05,
		// 			],
		// 		],
		// 		'selectors'      => [
		// 			'{{WRAPPER}} .elementor-grid .uael-style-floating' => 'top: {{VALUE}};',
		// 		],
		// 		'condition'      => [
		// 			'display_position' => 'floating',
		// 		],
		// 	]
		// );

		$this->add_control(
			'show_share',
			[
				'label' => __( 'Total Share Count', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SWITCHER,
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
				'condition'      => [
					'show_share' => 'yes',
				],
				'label_block' => false,
			]
		);

		$this->add_control(
			'error_msg',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'label'           => sprintf( __( '%1$s Please Enter Access Token » %2$s', 'uael' ), '<a href="https://developers.facebook.com/docs/graph-api/using-graph-api" target="_blank" rel="noopener">', '</a>' ),
				'condition'       => [
					'caption'     => '',
					'show_share' => 'yes',
				],
			]
		);
			$this->add_control(
			'share_url_type',
			[
				'label' => __( 'Target URL', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'current_page' => __( 'Current Page', 'advanced-share-buttons-widget' ),
					'custom' => __( 'Custom', 'advanced-share-buttons-widget' ),
				],
				'default' => 'current_page',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'share_url',
			[
				'label' => __( 'Link', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::URL,
				'show_external' => false,
				'placeholder' => __( 'https://your-link.com', 'advanced-share-buttons-widget' ),
				'condition' => [
					'share_url_type' => 'custom',
				],
				'show_label' => false,
				'frontend_available' => true,
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
			'column_gap',
			[
				'label' => __( 'Columns Gap', 'elementor-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-grid-0) .elementor-grid' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.elementor-grid-0 .uael-share-btn' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2)',
					'(tablet) {{WRAPPER}}.elementor-grid-tablet-0 .uael-share-btn' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2)',
					'(mobile) {{WRAPPER}}.elementor-grid-mobile-0 .uael-share-btn' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2)',
					'{{WRAPPER}}.elementor-grid-0 .elementor-grid' => 'margin-right: calc(-{{SIZE}}{{UNIT}} / 2); margin-left: calc(-{{SIZE}}{{UNIT}} / 2)',
					'(tablet) {{WRAPPER}}.elementor-grid-tablet-0 .elementor-grid' => 'margin-right: calc(-{{SIZE}}{{UNIT}} / 2); margin-left: calc(-{{SIZE}}{{UNIT}} / 2)',
					'(mobile) {{WRAPPER}}.elementor-grid-mobile-0 .elementor-grid' => 'margin-right: calc(-{{SIZE}}{{UNIT}} / 2); margin-left: calc(-{{SIZE}}{{UNIT}} / 2)',
				],
			]
		);

		$this->add_responsive_control(
			'row_gap',
			[
				'label' => __( 'Rows Gap', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-grid-0) .elementor-grid' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.elementor-grid-0 .uael-share-btn' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'(tablet) {{WRAPPER}}.elementor-grid-tablet-0 .uael-share-btn' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'(mobile) {{WRAPPER}}.elementor-grid-mobile-0 .uael-share-btn' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
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
					'{{WRAPPER}} .elementor-grid-item .uael-share-btn, .uael-share-btn .elementor-animation- .uaelbtn-shape-circle .uaelbtn--skin-minimal .uael-share-btn__icon,' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'skin' => [ 'framed', 'boxed' ],
				],
			]
		);
		// $this->add_control(
		// 	'color_source',
		// 	[
		// 		'label' => __( 'Color', 'advanced-share-buttons-widget' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'label_block' => false,
		// 		'options' => [
		// 			'official' => 'Official Color',
		// 			'custom' => 'Custom Color',
		// 		],
		// 		'default' => 'official',
		// 		'prefix_class' => 'elementor-share-buttons--color-',
		// 		'separator' => 'before',
		// 	]
		// );
		// $this->start_controls_tabs( 'tabs_button_style' );

		$this->add_control(
			'color',
			[
				'label' => __( 'Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Official Color', 'advanced-share-buttons-widget' ),
					'custom' => __( 'Custom', 'advanced-share-buttons-widget' ),
				],
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn__icon,.uael-share-btn__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label' => __( 'Secondary Color', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn__icon,{{WRAPPER}} .uael-share-btn__text' => 'background-color: {{VALUE}};',

				],
			]
		);

		// $this->start_controls_tab(
		// 	'tab_button_normal',
		// 	[
		// 		'label' => __( 'Normal', 'advanced-share-buttons-widget' ),
		// 		'condition' => [
		// 			'color_source' => 'custom',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'primary_color',
		// 	[
		// 		'label' => __( 'Primary Color', 'advanced-share-buttons-widget' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'default' => '',
		// 		'selectors' => [
		// 			' {{WRAPPER}} .uaelbtn--skin-minimal,
		// 			 {{WRAPPER}} .uael-share-btn .uaelbtn--skin-gradient,
		// 			 .uaelbtn--skin-gradient .uael-share-btn__text,
		// 			 .uaelbtn--skin-gradient .uael-share-btn__icon,
		// 			 .uaelbtn--skin-minimal .uael-share-btn__icon' => 'background-color: {{VALUE}}',
		// 			'{{WRAPPER}} .uael-share-btn.uaelbtn--skin-framed, .uaelbtn--skin-framed .uael-share-btn__icon .fa-facebook:before,.uaelbtn--skin-framed .uael-share-btn__text' => 'color: {{VALUE}}; border-color:{{VALUE}}',
		// 		],
		// 		'condition' => [
		// 			'color_source' => 'custom',
		// 		],
		// 	]
		// );
		// 	//.elementor-grid-item .uael-share-btn .uael-share-btn .uael-share-btn__icon
		// $this->add_control(
		// 	'secondary_color',
		// 	[
		// 		'label' => __( 'Secondary Color', 'advanced-share-buttons-widget' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .uaelbtn--skin-minimal .uael-share-btn__icon .fa-facebook:before,
		// 			 {{WRAPPER}} .uael-share-btn .uaelbtn--skin-gradient .uael-share-btn__icon
		// 			 ' => 'color: {{VALUE}}',
		// 		],
		// 		'condition' => [
		// 			'color_source' => 'custom',
		// 		],
		// 		'separator' => 'after',
		// 	]
		// );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .uael-share-btn__text',
				'exclude' => [ 'line_height' ],
				'condition' => [
					'view' => ['icon-text', 'text'],
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'advanced-share-buttons-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .uael-share-btn__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'condition' => [
					'view' => 'text',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_section();

		$this->start_controls_section(
			'general_spacing',
			[
				'label' => __( 'Animation', 'advanced-share-buttons-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
		// echo "<pre>";
		// print_r( $settings['social_icon_list'][0]['text']);
		// echo "</pre>";

		// print_r($networks);
		// print_r($settings['social_icon_list']);

		
		

	 	global $wp;



	 	if ( 'custom' === $settings['share_url_type'] ){

	 		if ( '' === $settings['share_url']['url'] ){

	 		 $page_url = add_query_arg( $wp->query_vars, home_url( $wp->request ) );

	 		}else{

	 			$page_url = esc_url( $settings['share_url']['url'] );

	 		}

	 	}else{

	 		$page_url = add_query_arg( $wp->query_vars, home_url( $wp->request ) );
	 	}

		wp_localize_script(
			'elementor-hello-world',
			'uael_page_url_vars',
			array(
				'uael_page_url' => $page_url,
				'settings' => $settings,
			),
			true
		);
	 	
	 	if ( !empty($settings['show_share']) ){
		 		if ( 'yes' === $settings['show_share'] ){
				$access_token =  $settings['caption'];
				}else if( 'yes' === $settings['show_share'] ){
				if ( empty( $settings['caption'] ) ){
					
					echo '';

				}else{
					$access_token =  $settings['caption'];
				}
			}
			else{
		
			}	
	 	}

// 	 	if ( 'floating' === $settings['display_position'] ){
// 			$this->add_render_attribute('position','uael-style-' . $settings["display_position"]);
// 		}
// 		echo $this->get_render_attribute_string('position','uael-style-' . $settings["display_position"]);
// print_r($settings['display_position']);
	 	//----------------------------------------------------------
	 	echo '<div class="elementor-grid uael-style-' . $settings["display_position"] . '">';

	 	foreach ( $settings['social_icon_list'] as $button ) {

		
			$show_text = 'text' === $settings['view'] || 'yes' === $settings['show_label'];

			if ( $button['social_icon']['value'] === 'fab fa-facebook' ){
				$url = 'https://www.facebook.com/sharer.php?u='.$page_url;
			}else if ( $button['social_icon']['value'] === 'fab fa-twitter' ){
				$url = 'https://twitter.com/intent/tweet?url='.$page_url;
			}else{
				$url = 'https://www.linkedin.com/sharing/share-offsite/?url='.$page_url;
			}
	
			?>
			<div class="elementor-grid-item">
				

				 <?php
					// if ( 'fab fa-facebook' === $button['social_icon']['value'] )
					// {
					// 	$custom_text = 'Facebook';
					// } else if ( 'fab fa-twitter' === $button['social_icon']['value'] ){
					// 	$custom_text = 'Twitter';
					// } else if ( 'fab fa-linkedin' === $button['social_icon']['value'] ){
					// 	$custom_text = 'LinkedIn';
					// }

				 $networks = [
		'facebook' => [
			'title' => 'Facebook',
		],
		'twitter' => [
			'title' => 'Twitter',
		],
		'google' => [
			'title' => 'Google+',
		],
		'linkedin' => [
			'title' => 'LinkedIn',
		],
		'pinterest' => [
			'title' => 'Pinterest',
		],
		'reddit' => [
			'title' => 'Reddit',
		],
		'vk' => [
			'title' => 'VK',
		],
		'odnoklassniki' => [
			'title' => 'OK',
		],
		'tumblr' => [
			'title' => 'Tumblr',
		],
		'delicious' => [
			'title' => 'Delicious',
		],
		'digg' => [
			'title' => 'Digg',
		],
		'skype' => [
			'title' => 'Skype',
		],
		'stumbleupon' => [
			'title' => 'StumbleUpon',
		],
		'telegram' => [
			'title' => 'Telegram',
		],
		'pocket' => [
			'title' => 'Pocket',
		],
		'xing' => [
			'title' => 'XING',
		],
		'whatsapp' => [
			'title' => 'WhatsApp',
		],
		'email' => [
			'title' => 'Email',
		],
		'print' => [
			'title' => 'Print',
		],
	];
  //    print_r($networks['facebook']['title']);
		$custom_text = $button['text'] ? $button['text'] : $networks['facebook']['title'];
		print_r( $custom_text );
				 if ( '' === $button['Custom_text'] ){

				 	$custom_text = $button['text'];
				 	  
				 }
				 else{

				 		$custom_text = $button['Custom_text'];

				 }
				// echo $button['social_icon']['text'];
				// echo $button['Custom_text'] ;
				 // echo "<pre>";
				 // print_r($button['social_icon']['value']);
				 // echo "</pre>";
				// echo $custom_text ;
				 // echo $button['social_icon']['text'];
				 if ( 'floating' == $settings['display_position'] ){ ?>		
					<ul class="uael-floating-btns-wrapper">
						<li class="uael-share-btn uael-share-btn-<?php echo $button['social_icon']['value']; ?>">
						<span class="uael-share-btn__icon">
							<i class="<?php echo $button['social_icon']['value']; ?>" aria-hidden="true"></i>
						</span>
						<span class="uael-floating-btns-label-wrapper"></span>
						</li>
					</ul>
		         <?php } else {
		       		?>
					<!-- <a href="<?php //echo $url; ?>" target="_blank"></a> -->
						<div class="uael-share-btn uael-share-btn-<?php echo $button['social_icon']['value']; ?> elementor-animation-<?php echo $settings['hover_animation']; ?> uaelbtn-shape-<?php echo $settings['shape']; ?> uaelbtn--skin-<?php echo $settings['skin']; ?>">
								<?php if( 'icon-text' === $settings['view'] ){ ?>
								<span class="uael-share-btn__icon uael-share-btn__icon--<?php echo $button['social_icon']['value']; ?>">
									<i class="<?php echo $button['social_icon']['value']; ?>" aria-hidden="true"></i>
									<span class="elementor-screen-only">Share on <?php echo $custom_text; ?></span>
					 			</span>
					 			<?php if ( 'yes' === $settings['show_label'] || 'text' === $settings['view'] ) : ?>
								  <div class="uael-share-btn__text uael-share-btn__text--<?php echo $button['social_icon']['value']; ?>">
								  	 
										<span class="uael-share-btn__title"><?php echo $custom_text; ?></span>
									 
								  </div>
								<?php endif; ?>
								<?php } else if ( 'text' === $settings['view'] ){ ?>
											<div class="uael-share-btn__text uael-share-btn__text--<?php echo $button['social_icon']['value']; ?>">
												<span class="uael-share-btn__title"><?php echo $custom_text ?></span>
										    </div>
								<?php } else { ?>
									<span class="uael-share-btn__icon uael-share-btn__icon--<?php echo $button['social_icon']['value']; ?>">
										<i class="<?php echo $button['social_icon']['value']; ?>" aria-hidden="true"></i>
										<span class="elementor-screen-only">Share on <?php echo $custom_text; ?></span>
									</span>
						<?php } ?>
						</div>
					</div>	
		<?php }}
		echo '</div>';
		
	 	//---------------------------------------------------------- -->
	 	//----------------------------------------------------------
		//$access_token = '519754661907260|k4ABYf2VeRhu5rqePuou7KcNhmw';
		
		$args = array( 'timeout' => 30 );	
		if ( empty($access_token) ) {

			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url;

		} else {

		
			$urlfb = 'https://graph.facebook.com/v2.12/?id=' . $page_url . '&access_token=' . $access_token . '&fields=engagement';
		}

		$response = wp_remote_get( $urlfb, $args );

		if( wp_remote_retrieve_response_code( $response ) == 200 ) {

		$body = json_decode( wp_remote_retrieve_body( $response ), true );

		$asbw_fb_API = 'asbw_fb_API';
		
		set_site_transient( $asbw_fb_API , $body , 86400 );

		$asbw_fb_API = get_site_transient( $asbw_fb_API );		

	 
	}//if loop of wp retrive.



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
		echo $transient;
		?>
		<#
			var showText = 'icon-text' === settings.view ? 'yes' === settings.show_label : 'text' === settings.view;
			console.log(settings.shape);
		#>
		<div class="elementor-grid uael-style-{{{ settings.display_position }}}">


					<#
			
				_.each( settings.social_icon_list, function( button ) { #>
				<div class="elementor-grid-item">
				
				<# var custom_text;

				if ( '' === button.Custom_text ){

				 	custom_text = button.text;
				 	  
				 }
				 else{

				 		custom_text = button.Custom_text;

				 }
				 	console.log(settings.display_position);
					if ( 'floating' == settings.display_position ){	#>	
					<ul class="uael-floating-btns-wrapper">
						<li class="x">
						<span class="uael-share-btn__icon">
							<i class="{{{button.social_icon.value}}}" aria-hidden="true"></i>
						</span>
						<span class="uael-floating-btns-label-wrapper"></span>
						</li>
					</ul>
		         <# } 
		         else {
					#>
						<div class="uael-share-btn uael-share-btn-{{{ button.social_icon.value }}} elementor-animation-{{{settings.hover_animation}}} uaelbtn-shape-{{settings.shape}} uaelbtn--skin-{{settings.skin}}">
							<# if ( 'icon' === settings.view || 'icon-text' === settings.view ) { #>
							<span class="uael-share-btn__icon uael-share-btn__icon--{{{ button.social_icon.value }}}">
								<i class="{{{button.social_icon.value}}}" aria-hidden="true"></i>
								<span class="elementor-screen-only">Share on {{{ custom_text }}}</span>
							</span>
							<# } #>
							<# if ( showText ) { #>
							<# if ( 'yes' === settings.show_label || 'text' === settings.view ) { #>
								<div class="uael-share-btn__text uael-share-btn__text--{{{ button.social_icon.value }}}">
									
										<span class="uael-share-btn__title">{{{ custom_text }}}</span>
									
								</div>
								<# } #>
							<# } #>
						</div>
					</div>
			<# } } ); #>

		</div>
		<?php
		?>

		<?php
	}
}
