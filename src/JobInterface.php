<?php
declare( strict_types=1 );

namespace Automattic\ActionSchedulerJobFramework;

defined( 'ABSPATH' ) || exit;

/**
 * Interface JobInterface.
 *
 * @since 1.0.0
 */
interface JobInterface {

	/**
	 * Get the name of the job.
	 *
	 * @return string
	 */
	public function get_name(): string;

	/**
	 * Get the name of the plugin that the job belongs to.
	 *
	 * @return string
	 */
	public function get_plugin_name(): string;

	/**
	 * Init the job, register necessary actions.
	 */
	public function init();

	/**
	 * Can the job start.
	 *
	 * @param array $args
	 *
	 * @return bool Returns true if the job can start.
	 */
	public function can_start( array $args = [] ): bool;

	/**
	 * Get the hook name for the "process item" action.
	 *
	 * This method is required by the job monitor.
	 *
	 * @return string
	 */
	public function get_process_item_hook(): string;
}
