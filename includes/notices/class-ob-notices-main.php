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
	 * @since 2.1.15
	 */
	class Ob_Notices_Main {

		/**
		 * Instance
		 *
		 * @since 2.1.15
		 * @var instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 2.1.15
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
		 * @since 2.1.15
		 */
		public function __construct() {
			$this->tp_notices_manage();
		}

		/**
		 * Initiate our hooks
		 *
		 * @since 2.1.15
		 */
		public function tp_notices_manage() {

            if ( current_user_can( 'install_plugins' ) ) {
				include OoohBoi_PATH . 'includes/notices/class-ob-wdkit-install-notice.php';
			}

		}
	}

	Ob_Notices_Main::instance();
}