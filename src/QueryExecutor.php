<?php

namespace Walnut\Lib\DbQuery;

/**
 * Interface QueryExecutor
 * @package Walnut\Lib\DbQuery
 */
interface QueryExecutor {

	/**
	 * @param string $query
	 * @param array<scalar|null>|null $boundParams
	 * @return QueryResult
	 */
	public function execute(string $query, array $boundParams = null): QueryResult;

	public function lastIdentity(): mixed;

	public function foundRows(): ?int;
}