<?php

require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'thegem_register_required_plugins' );
function thegem_register_required_plugins() {
	$plugins = array(
		array(
			'name' => esc_html__('TheGem Theme Elements', 'thegem'),
			'slug' => 'thegem-elements',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/required/thegem-elements.zip'),
			'required' => true,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_html__('TheGem Blocks', 'thegem'),
			'slug' => 'thegem-blocks',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-blocks.zip'),
			'required' => false,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		/*array(
			'name' => esc_html__('TheGem Import', 'thegem'),
			'slug' => 'thegem-import',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-import.zip'),
			'required' => false,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),*/
		array(
			'name' => esc_html__('TheGem Demo Import', 'thegem'),
			'slug' => 'thegem-importer',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-importer.zip'),
			'required' => false,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_html__('LayerSlider WP', 'thegem'),
			'slug' => 'LayerSlider',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/layersliderwp.installable.zip'),
			'required' => false,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_html__('Revolution Slider', 'thegem'),
			'slug' => 'revslider',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/revslider.zip'),
			'required' => false,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_html__('Wordpress Page Widgets', 'thegem'),
			'slug' => 'wp-page-widget',
			'required' => false,
		),
		array(
			'name' => esc_html__('WPBakery Visual Composer', 'thegem'),
			'slug' => 'js_composer',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/required/js_composer.zip'),
			'required' => true,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
		array(
			'name' => esc_html__('Contact Form 7', 'thegem'),
			'slug' => 'contact-form-7',
			'required' => false,
		),
		array(
			'name' => esc_html__('MailChimp for WordPress', 'thegem'),
			'slug' => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name' => esc_html__('Easy Forms for MailChimp by YIKES', 'thegem'),
			'slug' => 'yikes-inc-easy-mailchimp-extender',
			'required' => false,
		),
		array(
			'name' => esc_html__('ZillaLikes', 'thegem'),
			'slug' => 'zilla-likes',
			'source' => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/zilla-likes.zip'),
			'required' => false,
			'version' => '1.1.1',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
	);

	if(thegem_is_plugin_active('woocommerce/woocommerce.php')) {
		$plugins[] = array(
			'name' => esc_html__('YITH WooCommerce Wishlist', 'thegem'),
			'slug' => 'yith-woocommerce-wishlist',
			'required' => false,
		);
	}

	$config = array(
		'domain' => 'thegem',
		'default_path' => '',
		'parent_slug' => 'admin.php',
		'menu' => 'install-required-plugins',
		'has_notices' => true,
		'is_automatic' => true,
		'message' => '',
		'strings' => array(
			'page_title' => esc_html__( 'Install Plugins', 'thegem' ),
			'menu_title' => esc_html__( 'Install Plugins', 'thegem' ),
			'installing' => esc_html__( 'Installing Plugin: %s', 'thegem' ),
			'oops' => esc_html__( 'Something went wrong with the plugin API.', 'thegem' ),
			'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'thegem' ),
			'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'thegem' ),
			'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'thegem' ),
			'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'thegem' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'thegem' ),
			'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'thegem' ),
			'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'thegem' ),
			'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'thegem' ),
			'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'thegem' ),
			'activate_link' => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'thegem' ),
			'return' => esc_html__( 'Return to Required Plugins Installer', 'thegem' ),
			'plugin_activated' => esc_html__( 'Plugin activated successfully.', 'thegem' ),
			'complete' => esc_html__( 'All plugins installed and activated successfully. %s', 'thegem' ),
			'nag_type' => 'updated'
		)
	);

	tgmpa( $plugins, $config );

}

add_action( 'admin_init', 'thegem_updater_plugin_load' );
function thegem_updater_plugin_load() {
	if ( ! class_exists( 'TGM_Updater' ) ) {
		require get_template_directory() . '/plugins/class-tgm-updater.php';
	}
	if(thegem_is_plugin_active('thegem-elements/thegem-elements.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'thegem-elements/thegem-elements.php');
		$args = array(
			'plugin_name' => esc_html__('TheGem Theme Elements', 'thegem'),
			'plugin_slug' => 'thegem-elements',
			'plugin_path' => 'thegem-elements/thegem-elements.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'thegem-elements',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/required/thegem-elements.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('thegem-blocks/thegem-blocks.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'thegem-blocks/thegem-blocks.php');
		$args = array(
			'plugin_name' => esc_html__('TheGem Blocks', 'thegem'),
			'plugin_slug' => 'thegem-blocks',
			'plugin_path' => 'thegem-blocks/thegem-blocks.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'thegem-blocks',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-blocks.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('thegem-import/thegem-import.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'thegem-import/thegem-import.php');
		$args = array(
			'plugin_name' => esc_html__('TheGem Import', 'thegem'),
			'plugin_slug' => 'thegem-import',
			'plugin_path' => 'thegem-import/thegem-import.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'thegem-import',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-import.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('thegem-importer/thegem-importer.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'thegem-importer/thegem-importer.php');
		$args = array(
			'plugin_name' => esc_html__('TheGem Demo Import', 'thegem'),
			'plugin_slug' => 'thegem-importer',
			'plugin_path' => 'thegem-importer/thegem-importer.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'thegem-importer',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/thegem-importer.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('LayerSlider/layerslider.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'LayerSlider/layerslider.php');
		$args = array(
			'plugin_name' => esc_html__('LayerSlider WP', 'thegem'),
			'plugin_slug' => 'LayerSlider',
			'plugin_path' => 'LayerSlider/layerslider.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'LayerSlider',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/layerslider.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('revslider/revslider.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'revslider/revslider.php');
		$args = array(
			'plugin_name' => esc_html__('Revolution Slider', 'thegem'),
			'plugin_slug' => 'revslider',
			'plugin_path' => 'revslider/revslider.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'revslider',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/recommended/revslider.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
	if(thegem_is_plugin_active('js_composer/js_composer.php')) {
		$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).'js_composer/js_composer.php');
		$args = array(
			'plugin_name' => esc_html__('WPBakery Visual Composer', 'thegem'),
			'plugin_slug' => 'js_composer',
			'plugin_path' => 'js_composer/js_composer.php',
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . 'js_composer',
			'remote_url'  => esc_url('http://democontent.codex-themes.com/plugins/thegem/required/js_composer.json'),
			'version'     => $plugin_data['Version'],
			'key'         => ''
		);
		$tgm_updater = new TGM_Updater( $args );
	}
}

function thegem_get_purchase() {
	if(!defined('ENVATO_HOSTED_SITE')) {
		$theme_options = get_option('thegem_theme_options');
		if($theme_options && isset($theme_options['purchase_code'])) {
			return $theme_options['purchase_code'];
		}
	} else {
		return 'envato_hosted:'.(defined('SUBSCRIPTION_CODE') ? SUBSCRIPTION_CODE : '');
	}
	return false;
}

add_action( 'vc_before_init', 'thegem_vcSetAsTheme' );
function thegem_vcSetAsTheme() {
	//vc_set_as_theme();
}

if(function_exists('layerslider_set_as_theme')) layerslider_set_as_theme();

function thegem_upgrader_pre_download($reply, $package, $upgrader) {
	if(strpos($package, 'democontent.codex-themes.com') !== false && strpos($package, 'envato-wordpress-toolkit') === false) {
		if(!thegem_get_purchase()) {
			if(!defined('ENVATO_HOSTED_SITE')) {
				return new WP_Error('thegem_purchase_empty', sprintf(wp_kses(__('Purchase code verification failed. <a href="%s" target="_blank">Activate TheGem</a>', 'thegem'), array('a' => array('href' => array(), 'target' => array()))),esc_url(admin_url('admin.php?page=thegem-theme-options#activation'))));
			}
		}
		$response_p = wp_remote_get(add_query_arg(array('code' => thegem_get_purchase(), 'site_url' => get_site_url()), 'http://democontent.codex-themes.com/av_validate_code'.(defined('ENVATO_HOSTED_SITE') ? '_envato' : '').'.php'), array('timeout' => 20));
		if(is_wp_error($response_p)) {
			return new WP_Error('thegem_connection_failed', esc_html__('Some troubles with connecting to TheGem server.', 'thegem'));
		}
		$rp_data = json_decode($response_p['body'], true);
		if(!(is_array($rp_data) && isset($rp_data['result']) && $rp_data['result'] && isset($rp_data['item_id']) && $rp_data['item_id'] === '16061685')) {
			if(!defined('ENVATO_HOSTED_SITE')) {
				return new WP_Error('thegem_purchase_error', sprintf(wp_kses(__('Purchase code verification failed. <a href="%s" target="_blank">Activate TheGem</a>', 'thegem'), array('a' => array('href' => array(), 'target' => array()))), esc_url(admin_url('admin.php?page=thegem-theme-options#activation'))));
			}
		}
	}
	return $reply;
}
add_filter('upgrader_pre_download', 'thegem_upgrader_pre_download', 10, 3);

function thegem_pre_set_site_transient_update_themes( $transient ) {

	$response = wp_remote_get('http://democontent.codex-themes.com/plugins/thegem/theme/theme.json', array('timeout' => 5));
	if ( is_wp_error( $response ) ) {
		return $transient;
	}

	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body, 1);
	if ( ! isset( $data['new_version'] ) ) {
		return $transient;
	}

	$new_version = $data['new_version'];

	// Save update info if there are newer version.
	$theme = wp_get_theme('thegem');
	if ( version_compare( $theme->get( 'Version' ), $new_version, '<' ) ) {
		$transient->response[ 'thegem' ] = array(
			'theme' => 'thegem',
			'new_version' => $new_version,
			'url' => $data['changelog'],
			'package' => $data['package'],
		);
	}

	return $transient;
}
add_filter('pre_set_site_transient_update_themes', 'thegem_pre_set_site_transient_update_themes', 10, 3);

add_action('wp_ajax_thegem_theme_update_confirm', 'thegem_theme_update_confirm_content');
function thegem_theme_update_confirm_content() {
?>
<div class="fancybox-content thegem-theme-update-fancybox-content">
	<div class="thegem-theme-update-confirm-content">
		<div class="ttucc-title"><img src="<?php echo get_template_directory_uri(); ?>/images/admin-images/ttucc-title.png" alt="#" /></div>
		<div class="ttucc-description"><?php esc_html_e('Before updating, it would be better if you make a backup of your current theme files (via FTP). Also please note: if you have done any code modifications directly in parent’s theme source files, this changes may be overwritten. We recommend to use TheGem child theme for any code modifications and customizations in order to ensure all further updates without any issues.', 'thegem'); ?></div>
		<div class="ttucc-confirm">
			<div class="ttucc-confirm-checkbox">
				<label for="thegem-update-confirm-checkbox"><input type="checkbox" name="confirm" id="thegem-update-confirm-checkbox" value="1" /><?php esc_html_e('I have read this notice and agree to proceed', 'thegem'); ?></label>
			</div>
			<div class="ttucc-confirm-button">
				<button id="thegem-update-confirm-button" disabled="disabled"><?php esc_html_e('Proceed with update', 'thegem'); ?></button>
			</div>
		</div>
	</div>
</div>
<?php
	die(-1);
}

function thegem_update_notice() {
	if ( !current_user_can('update_themes' ) )
		return false;
	if ( !isset($themes_update) )
		$themes_update = get_site_transient('update_themes');
	if ( isset($themes_update->response['thegem']) ) {
		$update = $themes_update->response['thegem'];
		$theme = wp_prepare_themes_for_js( array( wp_get_theme('thegem') ) );
		$details_url = add_query_arg(array(), $update['url']);
		$update_url = wp_nonce_url( admin_url( 'update.php?action=upgrade-theme&amp;theme=' . urlencode( 'thegem' ) ), 'upgrade-theme_thegem' );
		if(isset($theme[0]) && isset($theme[0]['hasUpdate']) && $theme[0]['hasUpdate']) {
			wp_enqueue_script('jquery-fancybox');
			wp_enqueue_style('jquery-fancybox');
			echo '<div class="thegem-update-notice notice notice-warning is-dismissible">';
			echo '<p>'.sprintf(wp_kses(__('There is a new version of TheGem theme available. Your current version is <strong>%s</strong>. Update to <strong>%s</strong>.', 'thegem'), array('strong' => array())), $theme[0]['version'], $update['new_version']).'</p>';
			echo '<p>'.sprintf(wp_kses(__('<strong><a href="%s" class="thegem-view-details-link">View update details</a></strong> or <strong><a href="%s" class="thegem-update-link">Update now</a></strong>.', 'thegem'), array('strong' => array(), 'a' => array('href' => array(), 'class' => array()))), $details_url, $update_url).'</p>';
			echo '</div>';
		}
	}
}
add_action('admin_notices', 'thegem_update_notice');

function thegem_plugins_update_notice() {
	if ( !current_user_can('update_plugins' ) )
		return false;
	$plugins = get_site_transient('update_plugins');
	$thegem_plugins = array(
		'thegem-elements/thegem-elements.php',
		'thegem-import/thegem-import.php',
		'thegem-importer/thegem-importer.php',
		'LayerSlider/layerslider.php',
		'revslider/revslider.php',
		'js_composer/js_composer.php',
	);
	if ( isset($plugins->response) && is_array($plugins->response) ) {
		wp_enqueue_script('jquery-fancybox');
		wp_enqueue_style('jquery-fancybox');
		$plugins_ids = array_keys( $plugins->response );
		foreach ( $plugins_ids as $plugin_file ) {
			if(in_array($plugin_file, $thegem_plugins)) {
				$plugin_data = get_plugin_data(trailingslashit(WP_PLUGIN_DIR).$plugin_file);
				$plugin_update = $plugins->response[$plugin_file];
				echo '<div class="thegem-update-notice notice notice-warning is-dismissible">';
				echo '<p>'.sprintf(wp_kses(__('There is a new version of <strong>%s</strong> plugin available. Your current version is <strong>%s</strong>. Update to <strong>%s</strong>.', 'thegem'), array('strong' => array())), $plugin_data['Name'], $plugin_data['Version'], $plugin_update->new_version).'</p>';
				echo '<p>'.sprintf(wp_kses(__('<strong><a href="%s">Update now</a></strong>.', 'thegem'), array('strong' => array(), 'a' => array('href' => array()))), esc_url(admin_url('update-core.php'))).'</p>';
				echo '</div>';
			}
		}
	}
}
add_action('admin_notices', 'thegem_plugins_update_notice');

function thegem_tgmpa_admin_menu_args($args) {
	$args['parent_slug'] = 'thegem-theme-options';
	return $args;
}
add_filter('tgmpa_admin_menu_args', 'thegem_tgmpa_admin_menu_args');