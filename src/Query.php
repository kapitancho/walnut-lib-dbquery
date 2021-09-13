<?php

namespace Walnut\Lib\DbQuery;

/**
 * Interface Query
 * @package Walnut\Lib\DbQuery
 */
interface Query {

	/**
	 * @param QueryExecutor $queryExecutor
	 * @param array<scalar|null>|null $boundValues
	 * @param string[]|null $placeholders
	 * @return QueryResult
	 */
	public function execute(
		QueryExecutor $queryExecutor,
		array $boundValues = null,
		array $placeholders = null
	): QueryResult;

}