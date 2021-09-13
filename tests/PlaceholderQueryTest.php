<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\DbQuery\PlaceholderQuery;
use Walnut\Lib\DbQuery\QueryExecutor;
use Walnut\Lib\DbQuery\QueryResult;

require_once __DIR__ . '/mocks.inc.php';

final class PlaceholderQueryTest extends TestCase {
	public const SQL_QUERY = "SELECT id FROM users WHERE role IN (**__ph1__**) AND (first_name LIKE **__ph2__** OR last_name LIKE **__ph2__**)**__extra__**";
	public const SQL_QUERY_FINAL = "SELECT id FROM users WHERE role IN (1, 3) AND (first_name LIKE '%john%' OR last_name LIKE '%john%')";
	public function testOk(): void {
		$query = new PlaceholderQuery(self::SQL_QUERY, ['ph1', 'ph2', 'extra']);
		
		$query->execute(new class($this) implements QueryExecutor {
			public function __construct(private TestCase $testCase) {}
			public function execute(string $query, array $boundParams = null): QueryResult {
				$this->testCase->assertEquals(PlaceholderQueryTest::SQL_QUERY_FINAL, $query);
				return new MockQueryResult;
			}
			public function lastIdentity(): mixed {}
			public function foundRows(): ?int {}
		}, [], [
			'ph1' => '1, 3',
			'ph2' => "'%john%'"
		]);
	}
	
}