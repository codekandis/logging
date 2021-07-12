<?php declare( strict_types = 1 );
namespace CodeKandis\Logging;

use LogicException;

/**
 * Represents an exception if a logger already exists.
 * @package codekandis/logging
 * @author Christian Ramelow <info@codekandis.net>
 */
class LoggerExistsException extends LogicException
{
}
