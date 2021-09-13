<?php

namespace Walnut\Lib\DbQuery;

use Walnut\Lib\DbQuery\ResultBag\ListResultBag;
use Walnut\Lib\DbQuery\ResultBag\TreeDataResultBag;

/**
 * Interface QueryResult
 * @package Walnut\Lib\DbQuery
 */
interface QueryResult {
	/**
	 * @return array
	 */
	public function all(): array;

	/**
	 * @return mixed
	 */
	public function first(): mixed;

	/**
	 * @return mixed
	 */
	public function singleValue(): mixed;

	public function collectAsList(): ListResultBag;
	public function collectAsTreeData(): TreeDataResultBag;
	public function collectAsHash(): ListResultBag;

}