<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\DbQuery\PreparedQuery;
use Walnut\Lib\DbQuery\QueryExecutor;
use Walnut\Lib\DbQuery\QueryResult;

require_once __DIR__ . '/mocks.inc.php';

final class PreparedQueryTest extends TestCase {
	public const SQL_QUERY = "SELECT id FROM users WHERE role = ? AND first_name = :name";
	public function testOk(): void {
		$query = new PreparedQuery(self::SQL_QUERY, [0, 'name']);
		
		$query->execute(new class($this) implements QueryExecutor {
			public function __construct(private TestCase $testCase) {}
			public function execute(string $query, array $boundParams = null): QueryResult {
				$this->testCase->assertEquals(PreparedQueryTest::SQL_QUERY, $query);
				$this->testCase->assertEquals(5, $boundParams[0]);
				$this->testCase->assertEquals('john', $boundParams['name']);
				return new MockQueryResult;
			}
			public function lastIdentity(): mixed {}
			public function foundRows(): ?int {}
		}, [
			5,
			'name' => 'john'
		]);
	}
	
}