<?php

namespace Walnut\Lib\DbQuery;

use \Throwable;

final class QueryExecutionException extends \RuntimeException {
	public function __construct(public readonly string $query, ?Throwable $previous = null) {
		$message = sprintf(
			"Failed to execute query. \n%s\nQuery: %s",
			$previous?->getMessage(),
			$this->query
		);
		parent::__construct(message: $message, previous: $previous);
	}
}