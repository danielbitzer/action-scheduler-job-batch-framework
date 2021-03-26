<?php
declare( strict_types=1 );

namespace Automattic\ActionSchedulerJobFramework;

defined( 'ABSPATH' ) || exit;

/**
 * Interface OneTimeActionSchedulerJobInterface.
 *
 * A "one time job" is a job that receives all the items it needs to process immediately instead of in batches.
 *
 * @since 1.0.0
 */
interface OneTimeJobInterface extends JobInterface {

	/**
	 * Starts the job.
	 *
	 * @param array[] $items The items to process in the job.
	 *                       Items are stored in the database so don't include full objects.
	 */
	public function start( array $items = [] );

	/**
	 * Handles the process item job action.
	 *
	 * @param array $item
	 */
	public function handle_process_item_action( array $item );

}
