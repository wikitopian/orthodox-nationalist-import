<?php
/*
 * Plugin Name: Batch Job Skeleton Plugin
 * Plugin URI: https://github.com/wikitopian/batch-job-skeleton-plugin
 * Description: Batch Job Skeleton Plugin
 * Version: 0.1.0
 * Author: @wikitopian
 * Author URI: http://www.github.com/wikitopian
 * License: GPLv3
 */

require_once( 'batch-job-skeleton-plugin-operation.php' );

class Batch_Job_Skeleton_Plugin {
	private $batch;

	public function __construct() {

		add_action( 'admin_init', array( $this, 'do_init' ) );
		add_action( 'admin_menu', array( $this, 'do_menu' ) );

	}

	public function do_init() {

		register_setting(
			'batch_job_skeleton_plugin',
			'batch_job_skeleton_plugin'
		);

		global $_REQUEST;

		if (
			in_array( 'batch_job_skeleton_plugin', $_REQUEST )
			&&
			wp_verify_nonce( $_REQUEST['batch_job_skeleton_plugin'], 'batch_job_skeleton_plugin' )
		) {
			$this->batch = new Batch_Job_Skeleton_Plugin_Operation();
		}
	}

	public function do_menu() {
		add_options_page(
			'Batch Job',
			'Batch Job',
			'manage_options',
			'batch_job_skeleton_plugin',
			array( $this, 'do_page' )
		);
	}

	public function do_page() {

		?>

		<div class="wrap">
		<h2>Batch Job</h2>
		<form method="post">
	<?php
		wp_nonce_field( 'batch_job_skeleton_plugin', 'batch_job_skeleton_plugin' );
		submit_button( 'Run Batch Job' );
		?>
		</form>
		</div>
	<?php

	}
}

$batch_job_skeleton_plugin = new Batch_Job_Skeleton_Plugin();

?>
