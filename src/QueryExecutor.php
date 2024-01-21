<?php

namespace Walnut\Lib\DbQuery;

/**
 * Interface QueryExecutor
 * @package Walnut\Lib\DbQuery
 */
interface QueryExecutor {
	/**
	 * @param string $query
	 * @return PreparedQueryExecutor
	 */
	public function prepare(string $query): PreparedQueryExecutor;

	/**
	 * @param string $query
	 * @param array<scalar|null>|null $boundParams
	 * @return QueryResult
	 * @throws QueryExecutionException
	 */
	public function execute(string $query, array $boundParams = null): QueryResult;

	public function lastIdentity(): mixed;

	public function foundRows(): ?int;
}