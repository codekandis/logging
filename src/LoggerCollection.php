<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use function count;
use function current;
use function in_array;
use function key;
use function next;
use function reset;

/**
 * Represents a logger collection.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
class LoggerCollection extends AbstractLogger implements LoggerCollectionInterface
{
	/**
	 * Represents the error message if a logger already exists in the collection.
	 * @var string
	 */
	protected const ERROR_LOGGER_EXISTS = 'The logger already exists in the collection.';

	/**
	 * Stores the internal list of loggers of the collection.
	 * @var LoggerInterface[]
	 */
	private array $loggers = [];

	/**
	 * Constructor method.
	 * @param LoggerInterface[] $loggers The initial loggers of the collection.
	 * @throws LoggerExistsException A logger already exists in the collection.
	 */
	public function __construct( LoggerInterface ...$loggers )
	{
		$this->add( ...$loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function count(): int
	{
		return count( $this->loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function current()
	{
		return current( $this->loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function next(): void
	{
		next( $this->loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function key()
	{
		return key( $this->loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function valid(): bool
	{
		return null !== key( $this->loggers );
	}

	/**
	 * {@inheritDoc}
	 */
	public function rewind(): void
	{
		reset( $this->loggers );
	}

	/**
	 * Adds loggers to the collection.
	 * @param LoggerInterface[] $loggers The loggers to add.
	 * @throws LoggerExistsException A logger already exists in the collection.
	 */
	private function add( LoggerInterface ...$loggers ): void
	{
		foreach ( $loggers as $logger )
		{
			if ( true === in_array( $logger, $this->loggers ) )
			{
				throw new LoggerExistsException( static::ERROR_LOGGER_EXISTS );
			}

			$this->loggers[] = $logger;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function log( $level, $message, array $context = [] ): void
	{
		foreach ( $this->loggers as $logger )
		{
			$logger->log( $level, $message, $context );
		}
	}
}
