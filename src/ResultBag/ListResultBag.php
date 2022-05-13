<?php

namespace Walnut\Lib\DbQuery\ResultBag;

/**
 * @package Walnut\Lib\DbQuery
 */
final class ListResultBag extends ResultBag {

	protected function extractValues(string $key): array {
		$result = [];
		/**
		 * @var array<array|object|scalar> $this->data
		 */
		foreach($this->data as $row) {
			/**
			 * @var array-key|null $value
			 */
			$value = $row[$key] ?? null;
			if (isset($value)) {
				$result[$value] = true;
			}
		}
		/**
		 * @var array<string|int>
		 */
		return array_keys($result);
	}

	public function modify(\Generator $generator): ListResultBag {
		$cloneData = [];
		/**
		 * @var array<array|object|scalar> $this->data
		 */
		foreach($this->data as $key => $row) {
			$cloneData[$key] = $generator->send($row);
		}
		return new self($cloneData);
	}

}