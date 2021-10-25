<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use Symfony\Component\Console\Logger\ConsoleLogger as OriginConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use function getenv;

/**
 * Represents a console logger determining the current set verbosity.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
class ConsoleLogger extends OriginConsoleLogger implements ConsoleLoggerInterface
{
	/**
	 * Stores the output of the console logger.
	 * @var OutputInterface
	 */
	private OutputInterface $output;

	/**
	 * Constructor method.
	 * @param OutputInterface $output The output of the console logger.
	 * @param array $verbosityLevelMap The verbosity level map of the logger.
	 * @param array $formatLevelMap The format level map of the logger.
	 */
	public function __construct( OutputInterface $output, array $verbosityLevelMap = [], array $formatLevelMap = [] )
	{
		parent::__construct( $output, $verbosityLevelMap, $formatLevelMap );

		$this->output = $output;
	}

	/**
	 * {@inheritDoc}
	 */
	public function log( $level, $message, array $context = [] ): void
	{
		switch ( (int) getenv( 'SHELL_VERBOSITY' ) )
		{
			case -1:
			{
				$this->output->setVerbosity( OutputInterface::VERBOSITY_QUIET );
				break;
			}
			case 1:
			{
				$this->output->setVerbosity( OutputInterface::VERBOSITY_VERBOSE );
				break;
			}
			case 2:
			{
				$this->output->setVerbosity( OutputInterface::VERBOSITY_VERY_VERBOSE );
				break;
			}
			case 3:
			{
				$this->output->setVerbosity( OutputInterface::VERBOSITY_DEBUG );
				break;
			}
		}

		parent::log( $level, $message, $context );
	}
}
