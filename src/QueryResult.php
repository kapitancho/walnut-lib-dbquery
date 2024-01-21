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

	public function first(): string|int|float|bool|null|array|object;
	public function singleValue(): string|int|float|bool|null;

	public function collectAsList(): ListResultBag;
	public function collectAsTreeData(): TreeDataResultBag;
	public function collectAsHash(): ListResultBag;
	public function rowCount(): int;
}