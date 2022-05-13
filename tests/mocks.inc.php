<?php

use Walnut\Lib\DbQuery\QueryResult;
use Walnut\Lib\DbQuery\ResultBag\ListResultBag;
use Walnut\Lib\DbQuery\ResultBag\TreeDataResultBag;

final class MockQueryResult implements QueryResult {
	public function all(): array {}
	public function first(): mixed {}
	public function singleValue(): mixed {}
	public function collectAsList(): ListResultBag {}
	public function collectAsTreeData(): TreeDataResultBag {}
	public function collectAsHash(): ListResultBag {}
	public function rowCount(): int {}
}