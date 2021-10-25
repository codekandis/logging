<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Represents a log file logger.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
class LogFileLogger extends Logger implements LogFileLoggerInterface
{
	/**
	 * Stores the path of the log file.
	 * @var string
	 */
	private string $path;

	/**
	 * Constructor method.
	 * @param string $path The path of the log file.
	 */
	public function __construct( string $path )
	{
		parent::__construct(
			'LogFileLogger',
			[
				new StreamHandler( $path )
			],
		);

		$this->path = $path;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPath(): string
	{
		return $this->path;
	}
}
