<?php

namespace Walnut\Lib\DbQuery\ResultBag;

/**
 * @package Walnut\Lib\DbQuery
 */
final class TreeDataResultBag extends ResultBag {

	protected function extractValues(string $key): array {
		$result = [];
		/**
		 * @var array<string, array<array|object|scalar>> $this->data
		 */
		foreach($this->data as $rows) {
			foreach($rows as $row) {
				/**
				 * @var array-key|null $value
				 */
				$value = $row[$key] ?? null;
				if (isset($value)) {
					$result[$value] = true;
				}
			}
		}
		return array_keys($result);
	}

	public function withKey(string $key): array {
		/**
		 * @var array<array|object|scalar>
		 */
		return $this->data[$key] ?? [];
	}

	public function modify(\Generator $generator): TreeDataResultBag {
		$clone = new self([]);
		/**
		 * @var array<string, array<array|object|scalar>> $this->data
		 */
		foreach($this->data as $key => $rows) {
			$rr = [];
			foreach($rows as $r => $row) {
				/**
				 * @var array|object|scalar $value
				 */
				$value = $generator->send($row);
				/**
				 * @var array-key $gKey
				 */
				$gKey = $generator->key() ?? $r;
				$rr[$gKey] = $value;
			}
			$clone->data[$key] = $rr;
		}
		return $clone;
	}

}



