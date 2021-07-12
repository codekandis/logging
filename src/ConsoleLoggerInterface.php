<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use Psr\Log\LoggerInterface;

/**
 * Represents the interface of any logger collection.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConsoleLoggerInterface extends LoggerInterface
{
	/**
	 * {@inheritDoc}
	 * Logs a message.
	 * @param mixed $level The log level of the message.
	 * @param string $message The message to log.
	 * @param array $context The context of the message.
	 */
	public function log( $level, $message, array $context = [] ): void;
}
