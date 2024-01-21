<?php

namespace Walnut\Lib\DbQuery;

interface PreparedQueryExecutor {
	/**
	 * @param array<scalar|null>|null $boundParams
	 * @return QueryResult
	 * @throws QueryExecutionException
	 */
	public function execute(array $boundParams = null): QueryResult;

	/** @param iterable<array<scalar|null>> $boundParamsArray */
	public function executeMany(iterable $boundParamsArray): void;
}