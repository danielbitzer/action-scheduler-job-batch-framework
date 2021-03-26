<?php
declare( strict_types=1 );

namespace Automattic\ActionSchedulerJobFramework;

use RuntimeException;

defined( 'ABSPATH' ) || exit;

/**
 * JobException class.
 *
 * @since 1.0.0
 */
class JobException extends RuntimeException {

	/**
	 * Create a new exception when a job does not exist.
	 *
	 * @param string $job_name
	 *
	 * @return static
	 */
	public static function job_does_not_exist( string $job_name ): JobException {
		return new static( sprintf( 'The job named "%s" does not exist.', $job_name ) );
	}

	/**
	 * Create a new exception instance for when a job item is not found.
	 *
	 * @return static
	 */
	public static function item_not_found(): JobException {
		return new static( __( 'Job item not found.', 'automatewoo' ) );
	}

	/**
	 * Create a new exception instance for when a job is stopped due to a high failure rate.
	 *
	 * @param string $job_name
	 *
	 * @return static
	 */
	public static function stopped_due_to_high_failure_rate( string $job_name ): JobException {
		return new static(
			sprintf(
				__( 'The "%s" job was stopped because it\'s failure rate is above the allowed threshold.', 'automatewoo' ),
				$job_name
			)
		);
	}

}
