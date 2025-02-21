<?php
/**
 * It is Main File for the notices
 *
 * */

/**
 * Exit if accessed directly.
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ob_Notices_Main' ) ) {

	/**
	 * This class used for only load All Notice Files
	 *
	 * @since 5.3.3
	 * @version 5.6.3
	 */
	class Ob_Notices_Main {

		/**
		 * Instance
		 *
		 * @since 5.3.3
		 * @access private
		 * @static
		 * @var instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 5.3.3
		 * @access public
		 * @static
		 * @return instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * Perform some compatibility checks to make sure basic requirements are meet.
		 *
		 * @since 5.3.3
		 * @access public
		 */
		public function __construct() {
			$this->tp_notices_manage();
		}

		/**
		 * Initiate our hooks
		 *
		 * @since 5.3.3
		 * @version 5.6.5
		 */
		public function tp_notices_manage() {

            if ( current_user_can( 'install_plugins' ) ) {
				include OoohBoi_PATH . 'includes/notices/class-ob-wdkit-install-notice.php';
			}

			// if ( is_admin() ){
			// 	$this->tp_remove_notice();
			// }
		}

		/**
		 * Remove OlD Plugin Notice
		 *
		 * @since 6.1.1
		 */
		public function tp_remove_notice() {

			if ( get_option('tpae_halloween_notice_dismissed') !== false ) {
				delete_option('tpae_halloween_notice_dismissed');
			}
		}
	}

	Ob_Notices_Main::instance();
}
