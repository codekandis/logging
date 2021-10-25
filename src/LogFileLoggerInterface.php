<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

/**
 * Represents the interface of any log file logger.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
interface LogFileLoggerInterface
{
	/**
	 * Gets the path of the log file.
	 * @return string The path of the log file.
	 */
	public function getPath(): string;
}
