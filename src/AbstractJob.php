<?php
declare( strict_types=1 );

namespace Automattic\ActionSchedulerJobFramework;

use Automattic\ActionSchedulerJobFramework\Proxies\ActionSchedulerInterface;

defined( 'ABSPATH' ) || exit;

/**
 * AbstractJob class.
 *
 * Abstract class for jobs that use ActionScheduler.
 *
 * @since 1.0.0
 */
abstract class AbstractJob implements JobInterface {

	/**
	 * @var ActionSchedulerInterface
	 */
	protected $action_scheduler;

	/**
	 * @var JobMonitor
	 */
	protected $monitor;

	/**
	 * AbstractActionSchedulerJob constructor.
	 *
	 * @param ActionSchedulerInterface $action_scheduler
	 * @param JobMonitor               $monitor
	 */
	public function __construct( ActionSchedulerInterface $action_scheduler, JobMonitor $monitor ) {
		$this->action_scheduler = $action_scheduler;
		$this->monitor          = $monitor;
	}

	/**
	 * Get the base name for the job's scheduled actions.
	 *
	 * @return string
	 */
	protected function get_hook_base_name() {
		return "{$this->get_plugin_name()}}/jobs/{$this->get_name()}/";
	}

	/**
	 * Get the hook name for the "process item" action.
	 *
	 * This method is required by the job monitor.
	 *
	 * @return string
	 */
	public function get_process_item_hook(): string {
		return $this->get_hook_base_name() . 'process_item';
	}
}
