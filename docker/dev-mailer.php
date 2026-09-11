<?php

/*
 * Plugin Name: Development mailer
 */

if ( ! class_exists( 'DevMailer' ) ) {
	class DevMailer {
		public static function init() {
			add_filter( 'wp_mail_from', array( 'DevMailer', 'get_from_email' ) );
			add_filter( 'wp_mail_from_name', array( 'DevMailer', 'get_from_name' ) );
			add_action( 'phpmailer_init', array( 'DevMailer', 'configure_mailer' ) );
		}

		public static function get_from_email(): string {
			return 'admin@usbfitness.local';
		}

		public static function get_from_name(): string {
			return 'USB Fitness';
		}

		public static function configure_mailer( $phpmailer ): void {
			$phpmailer->isSMTP();
			$phpmailer->Host     = 'mail';
			$phpmailer->Port     = 1025;
			$phpmailer->SMTPAuth = false;

			$phpmailer::$validator = static function ( $email ) {
				return (bool) is_email( $email );
			};
		}
	}

	add_action( 'plugins_loaded', array( 'DevMailer', 'init' ) );
}