<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\DbQuery\FixedQuery;
use Walnut\Lib\DbQuery\QueryExecutor;
use Walnut\Lib\DbQuery\QueryResult;
use Walnut\Lib\DbQuery\QueryExecutionException;

require_once __DIR__ . '/mocks.inc.php';

final class QueryExecutionExceptionTest extends TestCase {
	public function testOk(): void {
		$exception = new QueryExecutionException("[SQL]");
		$this->assertStringContainsString("[SQL]", $exception->getMessage());
	}
	
}