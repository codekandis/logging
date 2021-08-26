<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use Countable;
use Iterator;
use Psr\Log\LoggerInterface;

/**
 * Represents the interface of any logger collection.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
interface LoggerCollectionInterface extends Countable, Iterator, LoggerInterface
{
	/**
	 * Gets the count of loggers of the collection.
	 * @return int The count of loggers of the collection.
	 */
	public function count(): int;

	/**
	 * Gets the current logger.
	 * @return LoggerInterface The current logger.
	 */
	public function current();

	/**
	 * Moves the internal pointer to the next logger.
	 */
	public function next(): void;

	/**
	 * Gets the key of the current logger.
	 * @return null|bool|float|int|string The key of the current logger, null if the internal pointer does not point to any logger.
	 */
	public function key();

	/**
	 * Determines if the current internal pointer position is valid.
	 * @return bool True if the current internal pointer position is valid, otherwise false.
	 */
	public function valid(): bool;

	/**
	 * Rewinds the internal pointer.
	 */
	public function rewind(): void;

	/**
	 * {@inheritDoc}
	 * Logs a message.
	 * @param mixed $level The log level of the message.
	 * @param string $message The message to log.
	 * @param array $context The context of the message.
	 */
	public function log( $level, $message, array $context = [] ): void;
}
